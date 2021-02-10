<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Exception;
use Artisan;
use Response;
use Auth;

use App\Backup;

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
     * Get the date today
     *
     * 
     */
    public function dateToday() {

        $today = Carbon::now();
        $dateToday = $today->format('Y-m-d-H-i-s');

        return $dateToday;
    }

    /**
     * Show the transmission page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function backup()
    {   

        try {

            // get the date today
            $dateToday = $this->dateToday();

            // create the backup
            $backup = Artisan::call('backup:run',['--only-db'=> true , '--disable-notifications'=> true]);

            // create record
            if($backup == 0){
                Backup::create([ "filename" =>  $dateToday]);
            }

            // get the latest record
            $record = Backup::latest('created_at')->first();

            // get the filepath
            $fileurl = storage_path() . '\app\VCO\\' .$record->filename. '.zip';

            // check the file if exist then download
            if (file_exists($fileurl)) {

                return response()->download($fileurl,  $record->filename. '.zip', array('Content-Type: application/octet-stream','Content-Length: '. filesize($fileurl)))->deleteFileAfterSend(true);

            } else {

                $notification = array(
                    'message' => 'Backup created but failed to download, Try again :(',
                    'alert-type' => 'error'
                );
    
                return redirect()->back()->with($notification);
            }

        } catch (Exception $error) {

            $notification = array(
                'message' => 'Failed to create back up, Try again :(',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);

        }
       
    }
}
