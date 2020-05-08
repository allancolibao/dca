<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adverse;
use App\CaseReport;
use App\Header;
use App\Monitoring;
use App\MonitoringHeader;
use App\Participant;
use App\Record;
use App\Screening;
use Auth;


class GetDataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Participant $participants)
    {   
        $this->middleware('auth');
        $this->participant = $participants;
    }

    /**
     * Show the transmission page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $connected = @fsockopen("www.google.com", 80); 
                                       
        if ($connected){

        $is_conn = true;     

        $participants = Participant::on('mysqlsec')->get();
        $existings = $this->participant->getAllParticipant();

        return view('app.get-data',compact('participants', 'existings'));

        } else {

        $is_conn = false; 
        
        return view('error.not-connected');

        }
    }


    /**
     * Get Data to the server
     * 
     * 
     */
    public function saveData(Request $request, $id)
    {

        $connected = @fsockopen("www.google.com", 80); 
                                       
        if ($connected){

            $is_conn = true; 

            // Adverse Event
            $getAdverse = Adverse::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataAdverse = json_decode( json_encode($getAdverse), true);
            $adverse = Adverse::upsert($dataAdverse, $dataAdverse);

            // Case Report
            $getCase = CaseReport::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataCase = json_decode( json_encode($getCase), true);
            $case = CaseReport::upsert($dataCase, $dataCase);

            // Monitoring Data
            $getMonitoring = Monitoring::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataMonitoring = json_decode( json_encode($getMonitoring), true);
            $monitoring = Monitoring::upsert($dataMonitoring, $dataMonitoring);

            // Monitoring Header
            $getMonitoringHeader = MonitoringHeader::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataMonitoringHeader = json_decode( json_encode($getMonitoringHeader), true);
            $monitoringHeader = MonitoringHeader::upsert($dataMonitoringHeader, $dataMonitoringHeader);

            // Participant
            $getParticipant = Participant::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataParticipant = json_decode( json_encode($getParticipant), true);
            $participant = Participant::upsert($dataParticipant, $dataParticipant);

            // Record Data
            $getRecord = Record::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataRecord = json_decode( json_encode($getRecord), true);
            $record = Record::insertIgnore($dataRecord);

            // Record Header
            $getRecordHeader = Header::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataRecordHeader = json_decode( json_encode($getRecordHeader), true);
            $recordHeader = Header::upsert($dataRecordHeader, $dataRecordHeader);

            // Screening
            $getScreening = Screening::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataScreening = json_decode( json_encode($getScreening), true);
            $screening = Screening::upsert($dataScreening, $dataScreening);

            $notification = array(
                'message' => 'Data saved successfully!',
                'alert-type' => 'success'
            );

            return redirect('/get-data')->with($notification);


            fclose($connected);

        } else {

            $is_conn = false; 

            $notification = array(
                'message' => 'Please check your internet connection!',
                'alert-type' => 'error'
            );
            
            return redirect('/get-data')->with($notification);

        }

    }
}
