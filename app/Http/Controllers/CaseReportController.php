<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CaseReportRequest;
use App\Screening;
use App\CaseReport;
use Auth;

class CaseReportController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Screening $screening , CaseReport $caseReport)
    {
        $this->middleware('auth');
        $this->caseReport = $caseReport;
        $this->screening = $screening;
    }


    /**
     * Combine the form and additional data
     *
     */
    public function combineArray($info, $formData) {

        $newArray = array_merge($info, $formData);

        return $newArray;
    }

    
    /**
    * View participant case-report form.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index($id, $fullname, $sex, $age)
    {   
        $fromScreening = [];
        $screeningData = $this->screening->getScreening($id);

        if($screeningData){

            if($screeningData->is_eligible == "Yes"){
                $fromScreening =  $screeningData;
            }
        }

        $data = $this->caseReport->getCaseReport($id);

        return view('app.case-report', compact('id','fullname','sex','age','data', 'fromScreening'));
    }

    /**
    * Insert the participant case-report data to the database
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function insert(CaseReportRequest $request, $participantId)
    {  

        $info = [
            'participant_id' => $participantId,
            'encoded_by' => Auth::user()->name
        ];

        // get the all the form data
        $formData = $request->except('_token');

        // combine additional data and form data
        $arrayNew = $this->combineArray($info, $formData);

        // insert data in database
        $dataInserted = CaseReport::insertIgnore($arrayNew);

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

        $info = [
            'updated_by' => Auth::user()->name
        ];

        // get the column list from model
        $tableArray = $this->caseReport->tableArray();

        if(sizeof($tableArray) > 0){
            foreach($tableArray as $column) {

                $formData[$column] = $request[$column];
            }
        }

        // combine additional data and form data
        $arrayNew = $this->combineArray($info, $formData);

        // update the form data
        $updated = $this->caseReport->updateCaseReport($id, $formData);

        if($updated){

            $notification = [
                'message' => 'Data  successfully updated!',
                'alert-type' => 'info'
            ];

            return redirect()->back()->with($notification);

        }
    }
}
