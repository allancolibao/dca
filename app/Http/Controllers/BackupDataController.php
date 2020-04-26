<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class BackupDataController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the transmission page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function backup()
    {   

        $connected = @fsockopen("www.google.com", 80); 
                                       
        if ($connected){

            $is_conn = true;

            Artisan::call('backup:run',['--only-db'=>true]);

            $notification = array(
                'message' => 'Data backup successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

            fclose($connected);

        } else {

            $is_conn = false; 

            $notification = array(
                'message' => 'Please check your internet connection!',
                'alert-type' => 'error'
            );
            
            return redirect('/transmit')->with($notification);

        }
       
    }
}
