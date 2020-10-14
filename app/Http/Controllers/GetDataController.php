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
            $getCase = CaseReport::on('mysqlsec')
                ->exclude(['id', 
                'sec_02_anthrop_rem_01',
                'sec_02_anthrop_rem_02',
                'sec_02_anthrop_rem_03',
                'sec_02_dia_01',
                'sec_02_dia_02',
                'sec_02_dia_03',
                'sec_02_04_01',
                'sec_02_04_02',
                'sec_02_04_03',
                'sec_02_dia_rem_01',
                'sec_02_dia_rem_02',
                'sec_02_dia_rem_03',
                'sec_02_lipid_01',
                'sec_02_lipid_02',
                'sec_02_lipid_03',
                'sec_02_05_01',
                'sec_02_05_02',
                'sec_02_05_03',
                'sec_02_05_01_rem',
                'sec_02_05_02_rem',
                'sec_02_05_03_rem',
                'sec_02_06_01',
                'sec_02_06_02',
                'sec_02_06_03',
                'sec_02_06_01_rem',
                'sec_02_06_02_rem',
                'sec_02_06_03_rem',
                'sec_02_07_01',
                'sec_02_07_02',
                'sec_02_07_03',
                'sec_02_lipid_rem_01',
                'sec_02_lipid_rem_02',
                'sec_02_lipid_rem_03',
                'sec_02_liver_01',
                'sec_02_liver_02',
                'sec_02_liver_03',
                'sec_02_08_01',
                'sec_02_08_02',
                'sec_02_08_03',
                'sec_02_08_01_rem',
                'sec_02_08_02_rem',
                'sec_02_08_03_rem',
                'sec_02_09_01',
                'sec_02_09_02',
                'sec_02_09_03',
                'sec_02_liver_rem_01',
                'sec_02_liver_rem_02',
                'sec_02_liver_rem_03',
                'sec_02_cli_01',
                'sec_02_cli_02',
                'sec_02_cli_03',
                'sec_02_10_01',
                'sec_02_10_02',
                'sec_02_10_03',
                'sec_02_10_01_rem',
                'sec_02_10_02_rem',
                'sec_02_10_03_rem',
                'sec_02_11_01',
                'sec_02_11_02',
                'sec_02_11_03',
                'sec_02_11_01_rem',
                'sec_02_11_02_rem',
                'sec_02_11_03_rem',
                'sec_02_12_01',
                'sec_02_12_02',
                'sec_02_12_03',
                'sec_02_12_01_rem',
                'sec_02_12_02_rem',
                'sec_02_12_03_rem',
                'sec_02_13_01',
                'sec_02_13_02',
                'sec_02_13_03',
                'sec_02_13_01_rem',
                'sec_02_13_02_rem',
                'sec_02_13_03_rem',
                'sec_02_14_01',
                'sec_02_14_02',
                'sec_02_14_03',
                'sec_02_15_01',
                'sec_02_15_02',
                'sec_02_15_03',
                'sec_02_16_01',
                'sec_02_16_02',
                'sec_02_16_03',
                'sec_02_17_01',
                'sec_02_17_02',
                'sec_02_17_03',
                'sec_02_cli_rem_01',
                'sec_02_cli_rem_02',
                'sec_02_cli_rem_03',
                'sec_02_sign_01',
                'sec_02_sign_02',
                'sec_02_sign_03',
                'sec_02_cough_01',
                'sec_02_cough_02',
                'sec_02_cough_03',
                'sec_02_breath_01',
                'sec_02_breath_02',
                'sec_02_breath_03',
                'sec_02_fever_01',
                'sec_02_fever_02',
                'sec_02_fever_03',
                'sec_02_tiredness_01',
                'sec_02_tiredness_02',
                'sec_02_tiredness_03',
                'sec_02_diarrhea_01',
                'sec_02_diarrhea_02',
                'sec_02_diarrhea_03',
                'sec_02_oth_01',
                'sec_02_oth_01_01',
                'sec_02_oth_01_02',
                'sec_02_oth_01_03',
                'sec_02_oth_02',
                'sec_02_oth_02_01',
                'sec_02_oth_02_02',
                'sec_02_oth_02_03',
                'sec_02_oth_03',
                'sec_02_oth_03_01',
                'sec_02_oth_03_02',
                'sec_02_oth_03_03',
                'sec_02_oth_04',
                'sec_02_oth_04_01',
                'sec_02_oth_04_02',
                'sec_02_oth_04_03',
                'sec_02_oth_05',
                'sec_02_oth_05_01',
                'sec_02_oth_05_02',
                'sec_02_oth_05_03',
                'sec_add_rt_01',
                'sec_add_rt_02',
                'sec_add_rt_03',
                'sec_add_rt_res_01',
                'sec_add_rt_res_02',
                'sec_add_rt_res_03',
                'sec_add_igg_01',
                'sec_add_igg_02',
                'sec_add_igg_03',
                'sec_add_igg_res_01',
                'sec_add_igg_res_02',
                'sec_add_igg_res_03',  
                'sec_add_igm_01',
                'sec_add_igm_02',
                'sec_add_igm_03',
                'sec_add_igm_res_01',
                'sec_add_igm_res_02',
                'sec_add_igm_res_03',])
                ->where('participant_id', $id)->get()->toArray();
                
            $dataCase = json_decode( json_encode($getCase), true);
            $case = CaseReport::upsert($dataCase, $dataCase);

            // Monitoring Data
            $getMonitoring = Monitoring::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataMonitoring = json_decode( json_encode($getMonitoring), true);
            $monitoring = Monitoring::insertIgnore($dataMonitoring);

            // Monitoring Header
            $getMonitoringHeader = MonitoringHeader::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataMonitoringHeader = json_decode( json_encode($getMonitoringHeader), true);
            $monitoringHeader = MonitoringHeader::upsert($dataMonitoringHeader, $dataMonitoringHeader);

            // Participant
            $getParticipant = Participant::on('mysqlsec')->exclude(['id', 'participant_status', 'participant_group'])->where('participant_id', $id)->get()->toArray();
            $dataParticipant = json_decode( json_encode($getParticipant), true);
            $participant = Participant::upsert($dataParticipant, $dataParticipant);

            // Record Data
            $getRecord = Record::on('mysqlsec')->exclude(['id','menu_title'])->where('participant_id', $id)->get()->toArray();
            $dataRecord = json_decode( json_encode($getRecord), true);
            $record = Record::insertIgnore($dataRecord);

            // Record Header
            $getRecordHeader = Header::on('mysqlsec')->exclude('id')->where('participant_id', $id)->get()->toArray();
            $dataRecordHeader = json_decode( json_encode($getRecordHeader), true);
            $recordHeader = Header::insertIgnore($dataRecordHeader);

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
