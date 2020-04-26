<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdverseEventRequest;
use App\Adverse;
use Auth;

class AdverseEventController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Adverse $adverse)
    {
        $this->middleware('auth');
        $this->adverse = $adverse;
    }

    /**
     * Show the adverse event page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id, $fullname, $sex, $age)
    {
        $data = $this->adverse->getAdverseEventData($id);

        return view('app.adverse', compact('id','fullname','sex','age','data'));
    }

    /**
    * Insert adverse event data
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function insert(AdverseEventRequest $request, $id)
    {  
        $data = Adverse::create([
            'participant_id' => $id,
            'ae_serious' => $request['ae_serious'],
            'ae_unexpected' => $request['ae_unexpected'],
            'ae_related' => $request['ae_related'],
            'ae_occurring' => $request['ae_occurring'],
            'ae_01_physician' => $request['ae_01_physician'],
            'ae_01_nurse' => $request['ae_01_nurse'],
            'ae_01_rnd' => $request['ae_01_rnd'],
            'ae_02' => $request['ae_02'],
            'ae_03' => $request['ae_03'],
            'ae_04' => $request['ae_04'],
            'ae_05' => $request['ae_05'],
            'ae_05_action' => $request['ae_05_action'],
            'ae_05_urgency' => $request['ae_05_urgency'],
            'ae_06' => $request['ae_06'],
            'ae_07' => $request['ae_07'],
            'ae_08' => $request['ae_08'],
            'ae_09' => $request['ae_09'],
            'ae_rel_physician' => $request['ae_rel_physician'],
            'ae_rel_nurse' => $request['ae_rel_nurse'],
            'ae_rel_rnd' => $request['ae_rel_rnd'],
            'ae_10' => $request['ae_10'],
            'ae_11' => $request['ae_11'],
            'ae_12' => $request['ae_12'],
            'ae_13' => $request['ae_13'],
            'ae_13_01' => $request['ae_13_01'],
            'ae_14' => $request['ae_14'],
            'ae_date' => $request['ae_date'],
            'ae_name' => $request['ae_name'],
            'ae_contact_person' => $request['ae_contact_person'],
            'ae_email' => $request['ae_email'],
            'ae_title' => $request['ae_title'],
            'ae_15_01' => $request['ae_15_01'],
            'ae_15_02' => $request['ae_15_02'],
            'ae_15_principal' => $request['ae_15_principal'],
            'ae_15_date' => $request['ae_15_date'],
            'ae_16_name' => $request['ae_16_name'],
            'ae_16_date' => $request['ae_16_date'],
            'ae_16' => $request['ae_16'],
            'ae_16_comment' => $request['ae_16_comment'],
            'encoded_by' => Auth::user()->name
        ]);

        $notification = [
            'message' => 'Data  successfully inserted!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    /**
    *  Update the specific monitoring data
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function update(Request $request, $id)
    {
        $data = [
            'ae_serious' => $request['ae_serious'],
            'ae_unexpected' => $request['ae_unexpected'],
            'ae_related' => $request['ae_related'],
            'ae_occurring' => $request['ae_occurring'],
            'ae_01_physician' => $request['ae_01_physician'],
            'ae_01_nurse' => $request['ae_01_nurse'],
            'ae_01_rnd' => $request['ae_01_rnd'],
            'ae_02' => $request['ae_02'],
            'ae_03' => $request['ae_03'],
            'ae_04' => $request['ae_04'],
            'ae_05' => $request['ae_05'],
            'ae_05_action' => $request['ae_05_action'],
            'ae_05_urgency' => $request['ae_05_urgency'],
            'ae_06' => $request['ae_06'],
            'ae_07' => $request['ae_07'],
            'ae_08' => $request['ae_08'],
            'ae_09' => $request['ae_09'],
            'ae_rel_physician' => $request['ae_rel_physician'],
            'ae_rel_nurse' => $request['ae_rel_nurse'],
            'ae_rel_rnd' => $request['ae_rel_rnd'],
            'ae_10' => $request['ae_10'],
            'ae_11' => $request['ae_11'],
            'ae_12' => $request['ae_12'],
            'ae_13' => $request['ae_13'],
            'ae_13_01' => $request['ae_13_01'],
            'ae_14' => $request['ae_14'],
            'ae_date' => $request['ae_date'],
            'ae_name' => $request['ae_name'],
            'ae_contact_person' => $request['ae_contact_person'],
            'ae_email' => $request['ae_email'],
            'ae_title' => $request['ae_title'],
            'ae_15_01' => $request['ae_15_01'],
            'ae_15_02' => $request['ae_15_02'],
            'ae_15_principal' => $request['ae_15_principal'],
            'ae_15_date' => $request['ae_15_date'],
            'ae_16_name' => $request['ae_16_name'],
            'ae_16_date' => $request['ae_16_date'],
            'ae_16' => $request['ae_16'],
            'ae_16_comment' => $request['ae_16_comment'],
            'updated_by' => Auth::user()->name
        ];

        $updated = $this->adverse->updateAdverse($id, $data);

        if($updated){
            
            $notification = [
                'message' => 'Data  successfully updated!',
                'alert-type' => 'info'
            ];

            return redirect()->back()->with($notification);
        }
    }
}
