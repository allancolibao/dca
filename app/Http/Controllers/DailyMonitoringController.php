<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MonitoringRequest;
use App\Http\Requests\MonitoringHeaderRequest;
use App\Monitoring;
use App\MonitoringHeader;
use Auth;
use Exception;

class DailyMonitoringController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Monitoring $monitoring, MonitoringHeader $header)
    {
        $this->middleware('auth');
        $this->monitoring = $monitoring;
        $this->header = $header;
    }

    /**
     * Show the monitoring encode page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id, $fullname, $sex, $age)
    {
        $count = $this->monitoring->getMonitoringData($id)->count();
        $day = $count+1;
        return view('app.monitoring', compact('id','fullname','sex','age','day'));
    }

    /**
     * Show the monitoring edit page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view($id, $fullname, $sex, $age)
    {
        $monitoring = $this->monitoring->getMonitoringData($id);
        $header = $this->header->getMonitoringHeader($id);

        return view('app.view-monitoring', compact('id','fullname','sex','age','monitoring','header'));
    }

    /**
     * Show the monitoring edit page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id, $fullname, $sex, $age, $day)
    {
        $monitoring = $this->monitoring->getSpecificMonitoringData($id, $day);

        return view('app.update-monitoring', compact('id','fullname','sex','age','day','monitoring'));
    }


    /**
    * Insert new monitoring data
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function insert(MonitoringRequest $request, $id)
    {  
        $data = Monitoring::create([
            'participant_id' => $id,
            'mon_day'=>$request['mon_day'],
            'mon_date' => $request['mon_date'],
            'mon_temp' => $request['mon_temp'],
            'mon_chills' => $request['mon_chills'],
            'mon_conjunct' => $request['mon_conjunct'],
            'mon_cough' => $request['mon_cough'],
            'mon_cough_dry' => $request['mon_cough_dry'],
            'mon_diarrhea' => $request['mon_diarrhea'],
            'mon_runny' => $request['mon_runny'],
            'mon_breath' => $request['mon_breath'],
            'mon_throat' => $request['mon_throat'],
            'mon_appetite' => $request['mon_appetite'],
            'mon_smell' => $request['mon_smell'],
            'mon_confusion' => $request['mon_confusion'],
            'mon_seizures' => $request['mon_seizures'],
            'mon_vomiting' => $request['mon_vomiting'],
            'mon_muscle_pain' => $request['mon_muscle_pain'],
            'mon_chest_pain' => $request['mon_chest_pain'],
            'mon_other' => $request['mon_other'],
            'mon_other_note' => $request['mon_other_note'],
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
            'mon_day' => $request['mon_day'],
            'mon_date' => $request['mon_date'],
            'mon_temp' => $request['mon_temp'],
            'mon_chills' => $request['mon_chills'],
            'mon_conjunct' => $request['mon_conjunct'],
            'mon_cough' => $request['mon_cough'],
            'mon_cough_dry' => $request['mon_cough_dry'],
            'mon_diarrhea' => $request['mon_diarrhea'],
            'mon_runny' => $request['mon_runny'],
            'mon_breath' => $request['mon_breath'],
            'mon_throat' => $request['mon_throat'],
            'mon_appetite' => $request['mon_appetite'],
            'mon_smell' => $request['mon_smell'],
            'mon_confusion' => $request['mon_confusion'],
            'mon_seizures' => $request['mon_seizures'],
            'mon_vomiting' => $request['mon_vomiting'],
            'mon_muscle_pain' => $request['mon_muscle_pain'],
            'mon_chest_pain' => $request['mon_chest_pain'],
            'mon_other' => $request['mon_other'],
            'mon_other_note' => $request['mon_other_note'],
            'updated_by' => Auth::user()->name
        ];

        
        try {

            $updated = $this->monitoring->updateMonitoring($id, $data);

        } catch (Exception $error) {

            $notification = [

                'message' => 'Oooops! Duplicate monitoring day',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);

        }
            
        $notification = [
            'message' => 'Data  successfully updated!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    /**
    * Insert the participant screening data to the database
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function insertHeader(MonitoringHeaderRequest $request, $id)
    {  

        $data = MonitoringHeader::create([
            'participant_id' => $id,
            'center_name' => $request['center_name'],
            'center_address' => $request['center_address'],
            'date_fill' => $request['date_fill'],
            'date_enroll' => $request['date_enroll'],
            'date_withdraw' => $request['date_withdraw'],
            'completed_by' => $request['completed_by'],
            'date_completed' => $request['date_completed'],
            'position' => $request['position'],
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
    public function updateHeader(MonitoringHeaderRequest $request, $id)
    {
        $data = [
            'center_name' => $request['center_name'],
            'center_address' => $request['center_address'],
            'date_fill' => $request['date_fill'],
            'date_enroll' => $request['date_enroll'],
            'date_withdraw' => $request['date_withdraw'],
            'completed_by' => $request['completed_by'],
            'date_completed' => $request['date_completed'],
            'position' => $request['position'],
            'updated_by' => Auth::user()->name
        ];

        $updated = $this->header->updateMonitoringHeader($id, $data);

        if($updated){
            
            $notification = [
                'message' => 'Data  successfully updated!',
                'alert-type' => 'info'
            ];

            return redirect()->back()->with($notification);
        }
    }
}
