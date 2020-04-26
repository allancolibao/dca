<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
use Auth;
use Hash;
use Session;
use Carbon\Carbon;
use App\Participant;


class ParticipantController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(Participant $participant)
    {
       $this->middleware('auth');
       $this->participant = $participant;
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

        $participant = Participant::create([
            'participant_id' => $request['participant_id'],
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
            'researcher_name' => $request['researcher_name'],
            'researcher_date' => $request['researcher_date'],
            'is_caregiver' => $request['is_caregiver'],
            'encoded_by' => Auth::user()->name
        ]);

        $notification = [
            'message' => 'Data  successfully inserted!',
            'alert-type' => 'success'
        ];

        return redirect()->route('home')->with($notification);

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

        return view('app.view-participant', compact('id','fullname','sex','age'));

    }
}
