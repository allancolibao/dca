<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
use Auth;
use Hash;
use Session;
use Exception;
use Carbon\Carbon;
use App\Participant;
use App\Adverse;
use App\CaseReport;
use App\Header;
use App\Monitoring;
use App\MonitoringHeader;
use App\Record;
use App\Screening;


class ParticipantController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(Participant $participant, Adverse $adverse, Screening $screening, CaseReport $case, MonitoringHeader $monitoringHeader, Header $recordHeader, Monitoring $monitoring, Record $record)
    {
       $this->middleware('auth');
       $this->participant = $participant;
       $this->adverse = $adverse;
       $this->screening = $screening;
       $this->case = $case;
       $this->monitoringHeader = $monitoringHeader;
       $this->recordHeader = $recordHeader;
       $this->monitoring = $monitoring;
       $this->record = $record;
    }


    /**
    * Show the participant add information modal.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function assent()
    {
        return view('app.assent');
    }


   /**
    * Show the participant add information modal.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function show()
    {
        return view('app.add-participant');
    }


    /**
    * Insert the participant data to the database
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function insert(ParticipantRequest $request)
    {    
        try {

            $participant = Participant::create([
                'hospital' => $request['hospital'],
                'participant_id' => $request['hospital'].'-'.$request['participant_id'],
                'full_name' => $request['full_name'],
                'sex' => $request['sex'],
                'csc' => $request['csc'],
                'birth_date' => $request['birth_date'],
                'age' => $request['age'],
                'educ_attainment' => $request['educ_attainment'],
                'specify_educ' => $request['specify_educ'],
                'occupation' => $request['occupation'],
                'home_address' => $request['home_address'],
                'contact' => $request['contact'],
                'is_agreed' => $request['is_agreed'],
                'assent_date' => $request['assent_date'],
                'witness_name' => $request['witness_name'],
                'witness_mobile' => $request['witness_mobile'],
                'witness_address' => $request['witness_address'],
                'admitting_officer' => $request['admitting_officer'],
                'admitting_officer_date' => $request['admitting_officer_date'],
                'encoded_by' => Auth::user()->name
            ]);

            $notification = [
                'message' => 'Data  successfully inserted!',
                'alert-type' => 'success'
            ];

            return redirect()->route('home')->with($notification);

        }  catch (Exception $error) {

            $notification = [

                'message' => 'Error! Duplicate Participant ID',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification)->withInput();
        }

    }



    /**
    * Show the edit blade
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function edit($id)
    {   

        $participant = $this->participant->getParticipant($id);
        
        return view('app.edit-participant', compact('participant'));
    }

    /**
    * Update the participant information
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function update(UpdateParticipantRequest $request, $id)
    {  

        $data = [
            'full_name' => $request['full_name'],
            'sex' => $request['sex'],
            'csc' => $request['csc'],
            'birth_date' => $request['birth_date'],
            'age' => $request['age'],
            'educ_attainment' => $request['educ_attainment'],
            'specify_educ' => $request['specify_educ'],
            'occupation' => $request['occupation'],
            'home_address' => $request['home_address'],
            'contact' => $request['contact'],
            'updated_by' => Auth::user()->name
        ];

        $updated = $this->participant->updateParticipant($id, $data);

        if($updated){
            
            $notification = [
                'message' => 'Data  successfully updated!',
                'alert-type' => 'info'
            ];

            return redirect()->back()->with($notification);
        }
    }

    /**
    * Show the delete blade
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function showDelete($id)
    {   

        $participant = $this->participant->getParticipant($id);
        
        return view('app.delete-participant', compact('participant'));
    }

    /**
    * Delete the target Participant
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function destroy(Request $request, $id)
    {   
        if(Hash::check($request['password'], Auth::user()->password))
        {  

        $participant = $this->participant->getParticipant($id)->delete();
        $adverse = $this->adverse->getAdverseEventData($id)->delete();
        $case = $this->case->getCaseReport($id)->delete();
        $monitoringHeader = $this->monitoringHeader->getMonitoringHeader($id)->delete();
        $screening = $this->screening->getScreening($id)->delete();
        $monitoring = $this->monitoring->deleteMonitoringData($id)->delete();
        $record = $this->record->deleteParticipantRecord($id)->delete();
        $recordHeader = $this->recordHeader->deleteRecordDate($id)->delete();
                     
        $notification = [
            'message' => 'Data successfully deleted!',
            'alert-type' => 'success'
        ];

        return redirect()->route('home')->with($notification);

        } else {

        $notification = [
            'message' => ' Incorrect password!',
            'alert-type' => 'error'
        ];

        return redirect()->route('home')->with($notification);
        }
    }

    /**
    * Show all the deleted participants
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function showDeletedParticipant()
    {   

        $deletedParticipant =  $this->participant->getAllDeletedParticipant();

        return view('app.deleted-participants', compact('deletedParticipant'));
    }

    /**
    * Restore the target deleted participant
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function restoreDeletedParticipant($id)
    {   

        $restore = $this->participant->restoreParticipant($id);
        $adverse = $this->adverse->restoreParticipant($id);
        $case = $this->case->restoreParticipant($id);
        $recordHeader = $this->recordHeader->restoreParticipant($id);
        $monitoring = $this->monitoring->restoreParticipant($id);
        $monitoringHeader = $this->monitoringHeader->restoreParticipant($id);
        $record = $this->record->restoreParticipant($id);
        $screening = $this->screening->restoreParticipant($id);

        $notification = [
            'message' => 'Data successfully restored!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    /**
    * View the participant and Start encoding page.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function view($id, $fullname, $sex, $age)
    {

        $screening = $this->screening->getScreening($id);
        $case = $this->case->getCaseReport($id);
        $monitoring = $this->monitoringHeader->getMonitoringHeader($id);
        $foodRecord = $this->recordHeader->getRecordDate($id);

        return view('app.view-participant', compact('id','fullname','sex','age','screening','case','monitoring','foodRecord'));

    }
}
