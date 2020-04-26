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
use DB;

class DataTransmissionController extends Controller
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
        $forTransmission = $this->participant->getAllParticipant();

        return view('app.trans',compact('forTransmission'));
    }

    /**
     * Send Data to the server
     * 
     * 
     */
    public function transmission(Request $request, $id)
    {

        $connected = @fsockopen("www.google.com", 80); 
                                       
        if ($connected){

            $is_conn = true; 

            // Adverse Event
            $adverse = Adverse::where('participant_id', $id)->exclude('id')->get()->toArray();
            $insertAdverse = DB::connection('mysqlsec')->table('adverse_event')->insertIgnore($adverse);

            // Case Report
            $case = CaseReport::where('participant_id', $id)->exclude('id')->get()->toArray();
            $insertCase = DB::connection('mysqlsec')->table('case_reports')->insertIgnore($case);

            // Monitoring Data
            $monitoringData = Monitoring::where('participant_id', $id)->exclude('id')->get()->toArray();
            $insertMonitoringData = DB::connection('mysqlsec')->table('monitoring_data')->insertIgnore($monitoringData);

            // Monitoring Header
            $monitoringHeader = MonitoringHeader::where('participant_id', $id)->exclude('id')->get()->toArray();
            $insertMonitoringHeader = DB::connection('mysqlsec')->table('monitoring_header')->insertIgnore($monitoringHeader);

            // Participant
            $participant = Participant::where('participant_id', $id)->exclude('id')->get()->toArray();
            $insertParticipant = DB::connection('mysqlsec')->table('participants')->insertIgnore($participant);

            // Record Data
            $recordData = Record::where('participant_id', $id)->exclude('id')->get()->toArray();
            $insertRecordData = DB::connection('mysqlsec')->table('record_data')->insertIgnore($recordData);

            // Record Header
            $recordHeader = Header::where('participant_id', $id)->exclude('id')->get()->toArray();
            $insertRecordHeader = DB::connection('mysqlsec')->table('record_headers')->insertIgnore($recordHeader);

            // Screening
            $screening = Screening::where('participant_id', $id)->exclude('id')->get()->toArray();
            $insertScreening = DB::connection('mysqlsec')->table('screenings')->insertIgnore($screening);

            // Update Count
            $getTransCount = $this->participant->getParticipant($id)->increment('is_transmitted');
 
            $notification = array(
                'message' => 'Data trasmitted successfully!',
                'alert-type' => 'success'
            );

            return redirect('/transmit')->with($notification);


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

    /**
     * Send Data to the server
     * 
     * 
     */
    public function sendAll(Request $request)
    {

        $connected = @fsockopen("www.google.com", 80); 
                                       
        if ($connected){

            $is_conn = true; 

            // Adverse Event
            $adverse = Adverse::exclude('id')->get()->toArray();
            $insertAdverse = DB::connection('mysqlsec')->table('adverse_event')->insertIgnore($adverse);

            // Case Report
            $case = CaseReport::exclude('id')->get()->toArray();
            $insertCase = DB::connection('mysqlsec')->table('case_reports')->insertIgnore($case);

            // Monitoring Data
            $monitoringData = Monitoring::exclude('id')->get()->toArray();
            $insertMonitoringData = DB::connection('mysqlsec')->table('monitoring_data')->insertIgnore($monitoringData);

            // Monitoring Header
            $monitoringHeader = MonitoringHeader::exclude('id')->get()->toArray();
            $insertMonitoringHeader = DB::connection('mysqlsec')->table('monitoring_header')->insertIgnore($monitoringHeader);

            // Participant
            $participant = Participant::exclude('id')->get()->toArray();
            $insertParticipant = DB::connection('mysqlsec')->table('participants')->insertIgnore($participant);

            // Record Data
            $recordData = Record::exclude('id')->get()->toArray();
            $insertRecordData = DB::connection('mysqlsec')->table('record_data')->insertIgnore($recordData);

            // Record Header
            $recordHeader = Header::exclude('id')->get()->toArray();
            $insertRecordHeader = DB::connection('mysqlsec')->table('record_headers')->insertIgnore($recordHeader);

            // Screening
            $screening = Screening::exclude('id')->get()->toArray();
            $insertScreening = DB::connection('mysqlsec')->table('screenings')->insertIgnore($screening);
 
            $notification = array(
                'message' => 'Data trasmitted successfully!',
                'alert-type' => 'success'
            );

            return redirect('/transmit')->with($notification);


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
