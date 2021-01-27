<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ScreeningRequest;
use App\Screening;
use App\Country;
use Auth;

class ScreeningController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Country $country, Screening $screening)
    {
        $this->middleware('auth');
        $this->country = $country;
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
    * View participant screening form.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index($id, $fullname, $sex, $age)
    {   
        $countries = $this->country->getAllCountryData();
        $data = $this->screening->getScreening($id);

        return view('app.screening', compact('id','fullname','sex','age','data','countries'));

    }

    /**
    * Insert the participant screening data to the database
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function insert(ScreeningRequest $request, $participantId)
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
        $dataInserted = Screening::insertIgnore($arrayNew);

        $notification = [
            'message' => 'Data  successfully inserted!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }


    /**
    * Insert the participant screening data to the database
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function update(ScreeningRequest $request, $participantId)
    {  

        $info = [
            'updated_by' => Auth::user()->name
        ];

        // get the column list from model
        $tableArray = $this->screening->tableArray();

        if(sizeof($tableArray) > 0){
            foreach($tableArray as $column) {

                $formData[$column] = $request[$column];
            }
        }

        // combine additional data and form data
        $arrayNew = $this->combineArray($info, $formData);

        // update the form data
        $updated = $this->screening->updateScreening($participantId, $formData);

        if($updated){

            $notification = [
                'message' => 'Data  successfully updated!',
                'alert-type' => 'info'
            ];

            return redirect()->back()->with($notification);

        }
    }
}
