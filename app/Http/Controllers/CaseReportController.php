<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CaseReportRequest;
use App\CaseReport;
use Auth;

class CaseReportController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CaseReport $caseReport)
    {
        $this->middleware('auth');
        $this->caseReport = $caseReport;
    }
    
    /**
    * View participant case-report form.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index($id, $fullname, $sex, $age)
    {   

        $data = $this->caseReport->getCaseReport($id);

        if($data){

            return view('app.update-case-report', compact('id','fullname','sex','age','data'));

        } else {

            return view('app.case-report', compact('id','fullname','sex','age'));
        }

    }

    /**
    * Insert the participant case-report data to the database
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function insert(CaseReportRequest $request, $participantId)
    {  
        $data = CaseReport::create([
            'participant_id' => $participantId,
            'date_admitted' => $request['date_admitted'],
            'date_accomplished' => $request['date_accomplished'],
            'officer_name' => $request['officer_name'],
            'position' => $request['position'],
            'phone_number' => $request['phone_number'],
            'sec_01_19_01' => $request['sec_01_19_01'],
            'sec_01_19_02' => $request['sec_01_19_02'],
            'sec_01_19_03' => $request['sec_01_19_03'],
            'sec_01_19_03_temp' => $request['sec_01_19_03_temp'],
            'sec_01_19_04' => $request['sec_01_19_04'],
            'sec_01_19_05' => $request['sec_01_19_05'],
            'sec_01_19_06' => $request['sec_01_19_06'],
            'sec_02_anthrop_01' => $request['sec_02_anthrop_01'],
            'sec_02_anthrop_02' => $request['sec_02_anthrop_02'],
            'sec_02_anthrop_03' => $request['sec_02_anthrop_03'],
            'sec_02_01_01' => $request['sec_02_01_01'],
            'sec_02_01_02' => $request['sec_02_01_02'],
            'sec_02_01_03' => $request['sec_02_01_03'],
            'sec_02_02_01' => $request['sec_02_02_01'],
            'sec_02_02_02' => $request['sec_02_02_02'],
            'sec_02_02_03' => $request['sec_02_02_03'],
            'sec_02_03_01' => $request['sec_02_03_01'],
            'sec_02_03_02' => $request['sec_02_03_02'],
            'sec_02_03_03' => $request['sec_02_03_03'],
            'sec_02_anthrop_rem_01' => $request['sec_02_anthrop_rem_01'],
            'sec_02_anthrop_rem_02' => $request['sec_02_anthrop_rem_02'],
            'sec_02_anthrop_rem_03' => $request['sec_02_anthrop_rem_03'],
            'sec_02_dia_01' => $request['sec_02_dia_01'],
            'sec_02_dia_02' => $request['sec_02_dia_02'],
            'sec_02_dia_03' => $request['sec_02_dia_03'],
            'sec_02_04_01' => $request['sec_02_04_01'],
            'sec_02_04_02' => $request['sec_02_04_02'],
            'sec_02_04_03' => $request['sec_02_04_03'],
            'sec_02_dia_rem_01' => $request['sec_02_dia_rem_01'],
            'sec_02_dia_rem_02' => $request['sec_02_dia_rem_02'],
            'sec_02_dia_rem_03' => $request['sec_02_dia_rem_03'],
            'sec_02_lipid_01' => $request['sec_02_lipid_01'],
            'sec_02_lipid_02' => $request['sec_02_lipid_02'],
            'sec_02_lipid_03' => $request['sec_02_lipid_03'],
            'sec_02_05_01' => $request['sec_02_05_01'],
            'sec_02_05_02' => $request['sec_02_05_02'],
            'sec_02_05_03' => $request['sec_02_05_03'],
            'sec_02_06_01' => $request['sec_02_06_01'],
            'sec_02_06_02' => $request['sec_02_06_02'],
            'sec_02_06_03' => $request['sec_02_06_03'],
            'sec_02_07_01' => $request['sec_02_07_01'],
            'sec_02_07_02' => $request['sec_02_07_02'],
            'sec_02_07_03' => $request['sec_02_07_03'],
            'sec_02_lipid_rem_01' => $request['sec_02_lipid_rem_01'],
            'sec_02_lipid_rem_02' => $request['sec_02_lipid_rem_02'],
            'sec_02_lipid_rem_03' => $request['sec_02_lipid_rem_03'],
            'sec_02_liver_01' => $request['sec_02_liver_01'],
            'sec_02_liver_02' => $request['sec_02_liver_02'],
            'sec_02_liver_03' => $request['sec_02_liver_03'],
            'sec_02_08_01' => $request['sec_02_08_01'],
            'sec_02_08_02' => $request['sec_02_08_02'],
            'sec_02_08_03' => $request['sec_02_08_03'],
            'sec_02_09_01' => $request['sec_02_09_01'],
            'sec_02_09_02' => $request['sec_02_09_02'],
            'sec_02_09_03' => $request['sec_02_09_03'],
            'sec_02_liver_rem_01' => $request['sec_02_liver_rem_01'],
            'sec_02_liver_rem_02' => $request['sec_02_liver_rem_02'],
            'sec_02_liver_rem_03' => $request['sec_02_liver_rem_03'],
            'sec_02_cli_01' => $request['sec_02_cli_01'],
            'sec_02_cli_02' => $request['sec_02_cli_02'],
            'sec_02_cli_03' => $request['sec_02_cli_03'],
            'sec_02_10_01' => $request['sec_02_10_01'],
            'sec_02_10_02' => $request['sec_02_10_02'],
            'sec_02_10_03' => $request['sec_02_10_03'],
            'sec_02_11_01' => $request['sec_02_11_01'],
            'sec_02_11_02' => $request['sec_02_11_02'],
            'sec_02_11_03' => $request['sec_02_11_03'],
            'sec_02_12_01' => $request['sec_02_12_01'],
            'sec_02_12_02' => $request['sec_02_12_02'],
            'sec_02_12_03' => $request['sec_02_12_03'],
            'sec_02_13_01' => $request['sec_02_13_01'],
            'sec_02_13_02' => $request['sec_02_13_02'],
            'sec_02_13_03' => $request['sec_02_13_03'],
            'sec_02_14_01' => $request['sec_02_14_01'],
            'sec_02_14_02' => $request['sec_02_14_02'],
            'sec_02_14_03' => $request['sec_02_14_03'],
            'sec_02_15_01' => $request['sec_02_15_01'],
            'sec_02_15_02' => $request['sec_02_15_02'],
            'sec_02_15_03' => $request['sec_02_15_03'],
            'sec_02_16_01' => $request['sec_02_16_01'],
            'sec_02_16_02' => $request['sec_02_16_02'],
            'sec_02_16_03' => $request['sec_02_16_03'],
            'sec_02_17_01' => $request['sec_02_17_01'],
            'sec_02_17_02' => $request['sec_02_17_02'],
            'sec_02_17_03' => $request['sec_02_17_03'],
            'sec_02_cli_rem_01' => $request['sec_02_cli_rem_01'],
            'sec_02_cli_rem_02' => $request['sec_02_cli_rem_02'],
            'sec_02_cli_rem_03' => $request['sec_02_cli_rem_03'],
            'sec_02_sign_01' => $request['sec_02_sign_01'],
            'sec_02_sign_02' => $request['sec_02_sign_02'],
            'sec_02_sign_03' => $request['sec_02_sign_03'],
            'sec_02_cough_01' => $request['sec_02_cough_01'],
            'sec_02_cough_02' => $request['sec_02_cough_02'],
            'sec_02_cough_03' => $request['sec_02_cough_03'],
            'sec_02_breath_01' => $request['sec_02_breath_01'],
            'sec_02_breath_02' => $request['sec_02_breath_02'],
            'sec_02_breath_03' => $request['sec_02_breath_03'],
            'sec_02_fever_01' => $request['sec_02_fever_01'],
            'sec_02_fever_02' => $request['sec_02_fever_02'],
            'sec_02_fever_03' => $request['sec_02_fever_03'],
            'sec_02_tiredness_01' => $request['sec_02_tiredness_01'],
            'sec_02_tiredness_02' => $request['sec_02_tiredness_02'],
            'sec_02_tiredness_03' => $request['sec_02_tiredness_03'],
            'sec_02_diarrhea_01' => $request['sec_02_diarrhea_01'],
            'sec_02_diarrhea_02' => $request['sec_02_diarrhea_02'],
            'sec_02_diarrhea_03' => $request['sec_02_diarrhea_03'],
            'sec_02_oth_01' => $request['sec_02_oth_01'],
            'sec_02_oth_01_01' => $request['sec_02_oth_01_01'],
            'sec_02_oth_01_02' => $request['sec_02_oth_01_02'],
            'sec_02_oth_01_03' => $request['sec_02_oth_01_03'],
            'sec_02_oth_02' => $request['sec_02_oth_02'],
            'sec_02_oth_02_01' => $request['sec_02_oth_02_01'],
            'sec_02_oth_02_02' => $request['sec_02_oth_02_02'],
            'sec_02_oth_02_03' => $request['sec_02_oth_02_03'],
            'sec_02_oth_03' => $request['sec_02_oth_03'],
            'sec_02_oth_03_01' => $request['sec_02_oth_03_01'],
            'sec_02_oth_03_02' => $request['sec_02_oth_03_02'],
            'sec_02_oth_03_03' => $request['sec_02_oth_03_03'],
            'sec_02_oth_04' => $request['sec_02_oth_04'],
            'sec_02_oth_04_01' => $request['sec_02_oth_04_01'],
            'sec_02_oth_04_02' => $request['sec_02_oth_04_02'],
            'sec_02_oth_04_03' => $request['sec_02_oth_04_03'],
            'sec_02_oth_05' => $request['sec_02_oth_05'],
            'sec_02_oth_05_01' => $request['sec_02_oth_05_01'],
            'sec_02_oth_05_02' => $request['sec_02_oth_05_02'],
            'sec_02_oth_05_03' => $request['sec_02_oth_05_03'],
            'sec_add_rt_01' => $request['sec_add_rt_01'],
            'sec_add_rt_02' => $request['sec_add_rt_02'],
            'sec_add_rt_03' => $request['sec_add_rt_03'],
            'sec_add_rt_res_01' => $request['sec_add_rt_res_01'],
            'sec_add_rt_res_02' => $request['sec_add_rt_res_02'],
            'sec_add_rt_res_03' => $request['sec_add_rt_res_03'],
            'sec_add_igm_01' => $request['sec_add_igm_01'],
            'sec_add_igm_02' => $request['sec_add_igm_02'],
            'sec_add_igm_03' => $request['sec_add_igm_03'],
            'sec_add_igm_res_01' => $request['sec_add_igm_res_01'],
            'sec_add_igm_res_02' => $request['sec_add_igm_res_02'],
            'sec_add_igm_res_03' => $request['sec_add_igm_res_03'],
            'encoded_by' => Auth::user()->name
        ]);

        $notification = [
            'message' => 'Data  successfully inserted!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }


    /**
    * Insert the participant case-report data to the database
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function update(CaseReportRequest $request, $id)
    {  
        $data = [
            'date_admitted' => $request['date_admitted'],
            'date_accomplished' => $request['date_accomplished'],
            'officer_name' => $request['officer_name'],
            'position' => $request['position'],
            'phone_number' => $request['phone_number'],
            'sec_01_19_01' => $request['sec_01_19_01'],
            'sec_01_19_02' => $request['sec_01_19_02'],
            'sec_01_19_03' => $request['sec_01_19_03'],
            'sec_01_19_03_temp' => $request['sec_01_19_03_temp'],
            'sec_01_19_04' => $request['sec_01_19_04'],
            'sec_01_19_05' => $request['sec_01_19_05'],
            'sec_01_19_06' => $request['sec_01_19_06'],
            'sec_02_anthrop_01' => $request['sec_02_anthrop_01'],
            'sec_02_anthrop_02' => $request['sec_02_anthrop_02'],
            'sec_02_anthrop_03' => $request['sec_02_anthrop_03'],
            'sec_02_01_01' => $request['sec_02_01_01'],
            'sec_02_01_02' => $request['sec_02_01_02'],
            'sec_02_01_03' => $request['sec_02_01_03'],
            'sec_02_02_01' => $request['sec_02_02_01'],
            'sec_02_02_02' => $request['sec_02_02_02'],
            'sec_02_02_03' => $request['sec_02_02_03'],
            'sec_02_03_01' => $request['sec_02_03_01'],
            'sec_02_03_02' => $request['sec_02_03_02'],
            'sec_02_03_03' => $request['sec_02_03_03'],
            'sec_02_anthrop_rem_01' => $request['sec_02_anthrop_rem_01'],
            'sec_02_anthrop_rem_02' => $request['sec_02_anthrop_rem_02'],
            'sec_02_anthrop_rem_03' => $request['sec_02_anthrop_rem_03'],
            'sec_02_dia_01' => $request['sec_02_dia_01'],
            'sec_02_dia_02' => $request['sec_02_dia_02'],
            'sec_02_dia_03' => $request['sec_02_dia_03'],
            'sec_02_04_01' => $request['sec_02_04_01'],
            'sec_02_04_02' => $request['sec_02_04_02'],
            'sec_02_04_03' => $request['sec_02_04_03'],
            'sec_02_dia_rem_01' => $request['sec_02_dia_rem_01'],
            'sec_02_dia_rem_02' => $request['sec_02_dia_rem_02'],
            'sec_02_dia_rem_03' => $request['sec_02_dia_rem_03'],
            'sec_02_lipid_01' => $request['sec_02_lipid_01'],
            'sec_02_lipid_02' => $request['sec_02_lipid_02'],
            'sec_02_lipid_03' => $request['sec_02_lipid_03'],
            'sec_02_05_01' => $request['sec_02_05_01'],
            'sec_02_05_02' => $request['sec_02_05_02'],
            'sec_02_05_03' => $request['sec_02_05_03'],
            'sec_02_06_01' => $request['sec_02_06_01'],
            'sec_02_06_02' => $request['sec_02_06_02'],
            'sec_02_06_03' => $request['sec_02_06_03'],
            'sec_02_07_01' => $request['sec_02_07_01'],
            'sec_02_07_02' => $request['sec_02_07_02'],
            'sec_02_07_03' => $request['sec_02_07_03'],
            'sec_02_lipid_rem_01' => $request['sec_02_lipid_rem_01'],
            'sec_02_lipid_rem_02' => $request['sec_02_lipid_rem_02'],
            'sec_02_lipid_rem_03' => $request['sec_02_lipid_rem_03'],
            'sec_02_liver_01' => $request['sec_02_liver_01'],
            'sec_02_liver_02' => $request['sec_02_liver_02'],
            'sec_02_liver_03' => $request['sec_02_liver_03'],
            'sec_02_08_01' => $request['sec_02_08_01'],
            'sec_02_08_02' => $request['sec_02_08_02'],
            'sec_02_08_03' => $request['sec_02_08_03'],
            'sec_02_09_01' => $request['sec_02_09_01'],
            'sec_02_09_02' => $request['sec_02_09_02'],
            'sec_02_09_03' => $request['sec_02_09_03'],
            'sec_02_liver_rem_01' => $request['sec_02_liver_rem_01'],
            'sec_02_liver_rem_02' => $request['sec_02_liver_rem_02'],
            'sec_02_liver_rem_03' => $request['sec_02_liver_rem_03'],
            'sec_02_cli_01' => $request['sec_02_cli_01'],
            'sec_02_cli_02' => $request['sec_02_cli_02'],
            'sec_02_cli_03' => $request['sec_02_cli_03'],
            'sec_02_10_01' => $request['sec_02_10_01'],
            'sec_02_10_02' => $request['sec_02_10_02'],
            'sec_02_10_03' => $request['sec_02_10_03'],
            'sec_02_11_01' => $request['sec_02_11_01'],
            'sec_02_11_02' => $request['sec_02_11_02'],
            'sec_02_11_03' => $request['sec_02_11_03'],
            'sec_02_12_01' => $request['sec_02_12_01'],
            'sec_02_12_02' => $request['sec_02_12_02'],
            'sec_02_12_03' => $request['sec_02_12_03'],
            'sec_02_13_01' => $request['sec_02_13_01'],
            'sec_02_13_02' => $request['sec_02_13_02'],
            'sec_02_13_03' => $request['sec_02_13_03'],
            'sec_02_14_01' => $request['sec_02_14_01'],
            'sec_02_14_02' => $request['sec_02_14_02'],
            'sec_02_14_03' => $request['sec_02_14_03'],
            'sec_02_15_01' => $request['sec_02_15_01'],
            'sec_02_15_02' => $request['sec_02_15_02'],
            'sec_02_15_03' => $request['sec_02_15_03'],
            'sec_02_16_01' => $request['sec_02_16_01'],
            'sec_02_16_02' => $request['sec_02_16_02'],
            'sec_02_16_03' => $request['sec_02_16_03'],
            'sec_02_17_01' => $request['sec_02_17_01'],
            'sec_02_17_02' => $request['sec_02_17_02'],
            'sec_02_17_03' => $request['sec_02_17_03'],
            'sec_02_cli_rem_01' => $request['sec_02_cli_rem_01'],
            'sec_02_cli_rem_02' => $request['sec_02_cli_rem_02'],
            'sec_02_cli_rem_03' => $request['sec_02_cli_rem_03'],
            'sec_02_sign_01' => $request['sec_02_sign_01'],
            'sec_02_sign_02' => $request['sec_02_sign_02'],
            'sec_02_sign_03' => $request['sec_02_sign_03'],
            'sec_02_cough_01' => $request['sec_02_cough_01'],
            'sec_02_cough_02' => $request['sec_02_cough_02'],
            'sec_02_cough_03' => $request['sec_02_cough_03'],
            'sec_02_breath_01' => $request['sec_02_breath_01'],
            'sec_02_breath_02' => $request['sec_02_breath_02'],
            'sec_02_breath_03' => $request['sec_02_breath_03'],
            'sec_02_fever_01' => $request['sec_02_fever_01'],
            'sec_02_fever_02' => $request['sec_02_fever_02'],
            'sec_02_fever_03' => $request['sec_02_fever_03'],
            'sec_02_tiredness_01' => $request['sec_02_tiredness_01'],
            'sec_02_tiredness_02' => $request['sec_02_tiredness_02'],
            'sec_02_tiredness_03' => $request['sec_02_tiredness_03'],
            'sec_02_diarrhea_01' => $request['sec_02_diarrhea_01'],
            'sec_02_diarrhea_02' => $request['sec_02_diarrhea_02'],
            'sec_02_diarrhea_03' => $request['sec_02_diarrhea_03'],
            'sec_02_oth_01' => $request['sec_02_oth_01'],
            'sec_02_oth_01_01' => $request['sec_02_oth_01_01'],
            'sec_02_oth_01_02' => $request['sec_02_oth_01_02'],
            'sec_02_oth_01_03' => $request['sec_02_oth_01_03'],
            'sec_02_oth_02' => $request['sec_02_oth_02'],
            'sec_02_oth_02_01' => $request['sec_02_oth_02_01'],
            'sec_02_oth_02_02' => $request['sec_02_oth_02_02'],
            'sec_02_oth_02_03' => $request['sec_02_oth_02_03'],
            'sec_02_oth_03' => $request['sec_02_oth_03'],
            'sec_02_oth_03_01' => $request['sec_02_oth_03_01'],
            'sec_02_oth_03_02' => $request['sec_02_oth_03_02'],
            'sec_02_oth_03_03' => $request['sec_02_oth_03_03'],
            'sec_02_oth_04' => $request['sec_02_oth_04'],
            'sec_02_oth_04_01' => $request['sec_02_oth_04_01'],
            'sec_02_oth_04_02' => $request['sec_02_oth_04_02'],
            'sec_02_oth_04_03' => $request['sec_02_oth_04_03'],
            'sec_02_oth_05' => $request['sec_02_oth_05'],
            'sec_02_oth_05_01' => $request['sec_02_oth_05_01'],
            'sec_02_oth_05_02' => $request['sec_02_oth_05_02'],
            'sec_02_oth_05_03' => $request['sec_02_oth_05_03'],
            'sec_add_rt_01' => $request['sec_add_rt_01'],
            'sec_add_rt_02' => $request['sec_add_rt_02'],
            'sec_add_rt_03' => $request['sec_add_rt_03'],
            'sec_add_rt_res_01' => $request['sec_add_rt_res_01'],
            'sec_add_rt_res_02' => $request['sec_add_rt_res_02'],
            'sec_add_rt_res_03' => $request['sec_add_rt_res_03'],
            'sec_add_igm_01' => $request['sec_add_igm_01'],
            'sec_add_igm_02' => $request['sec_add_igm_02'],
            'sec_add_igm_03' => $request['sec_add_igm_03'],
            'sec_add_igm_res_01' => $request['sec_add_igm_res_01'],
            'sec_add_igm_res_02' => $request['sec_add_igm_res_02'],
            'sec_add_igm_res_03' => $request['sec_add_igm_res_03'],
            'updated_by' => Auth::user()->name
        ];

        $updated = $this->caseReport->updateCaseReport($id, $data);

        if($updated){

            $notification = [
                'message' => 'Data  successfully updated!',
                'alert-type' => 'info'
            ];

            return redirect()->back()->with($notification);

        }
    }
}
