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
    * View participant screening form.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index($id, $fullname, $sex, $age)
    {   
        $countries = $this->country->getAllCountryData();
        $data = $this->screening->getScreening($id);

        if($data){

            return view('app.update-screening', compact('id','fullname','sex','age','data','countries'));

        } else {

            return view('app.screening', compact('id','fullname','sex','age','countries'));
        }

    }

    /**
    * Insert the participant screening data to the database
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function insert(ScreeningRequest $request, $participantId)
    {  
        $data = Screening::create([
            'participant_id' => $participantId,
            'officer_name' => $request['officer_name'],
            'date_accomplished' => $request['date_accomplished'],
            'position' => $request['position'],
            'phone_number' => $request['phone_number'],
            'is_identified_sus' => $request['is_identified_sus'],
            'is_identified_prob' => $request['is_identified_prob'],
            'sec_02_01' => $request['sec_02_01'],
            'sec_02_02' => $request['sec_02_02'],
            'sec_02_03' => $request['sec_02_03'],
            'sec_02_04' => $request['sec_02_04'],
            'sec_02_05' => $request['sec_02_05'],
            'sec_02_06' => $request['sec_02_06'],
            'sec_02_07' => $request['sec_02_07'],
            'sec_02_08' => $request['sec_02_08'],
            'sec_02_09' => $request['sec_02_09'],
            'sec_02_10' => $request['sec_02_10'],
            'sec_02_10_01' => $request['sec_02_10_01'],
            'sec_02_11' => $request['sec_02_11'],
            'sec_02_12' => $request['sec_02_12'],
            'sec_02_13' => $request['sec_02_13'],
            'sec_02_14' => $request['sec_02_14'],
            'sec_02_15' => $request['sec_02_15'],
            'sec_02_16' => $request['sec_02_16'],
            'sec_02_17' => $request['sec_02_17'],
            'sec_02_18' => $request['sec_02_18'],
            'sec_02_19' => $request['sec_02_19'],
            'sec_02_20' => $request['sec_02_20'],
            'sec_02_20_01' => $request['sec_02_20_01'],
            'sec_02_21' => $request['sec_02_21'],
            'sec_02_22' => $request['sec_02_22'],
            'sec_03_01' => $request['sec_03_01'],
            'sec_03_02' => $request['sec_03_02'],
            'sec_03_02_01' => $request['sec_03_02_01'],
            'sec_03_03' => $request['sec_03_03'],
            'sec_03_03_01' => $request['sec_03_03_01'],
            'sec_03_04' => $request['sec_03_04'],
            'sec_03_04_01' => $request['sec_03_04_01'],
            'sec_04_01_01' => $request['sec_04_01_01'],
            'sec_04_01_02' => $request['sec_04_01_02'],
            'sec_04_01_03' => $request['sec_04_01_03'],
            'sec_04_02_01' => $request['sec_04_02_01'],
            'sec_04_02_02' => $request['sec_04_02_02'],
            'sec_04_02_03' => $request['sec_04_02_03'],
            'sec_04_03' => $request['sec_04_03'],
            'sec_04_03_01' => $request['sec_04_03_01'],
            'sec_05_01_01' => $request['sec_05_01_01'],
            'sec_05_01_02' => $request['sec_05_01_02'],
            'sec_05_02_01' => $request['sec_05_02_01'],
            'sec_05_02_02' => $request['sec_05_02_02'],
            'sec_05_03_01' => $request['sec_05_03_01'],
            'sec_05_03_02' => $request['sec_05_03_02'],
            'sec_05_04_01' => $request['sec_05_04_01'],
            'sec_05_04_02' => $request['sec_05_04_02'],
            'sec_05_05_01' => $request['sec_05_05_01'],
            'sec_05_05_02' => $request['sec_05_05_02'],
            'sec_05_06_01' => $request['sec_05_06_01'],
            'sec_05_06_02' => $request['sec_05_06_02'],
            'sec_05_07_01' => $request['sec_05_07_01'],
            'sec_05_07_02' => $request['sec_05_07_02'],
            'sec_05_08_01' => $request['sec_05_08_01'],
            'sec_05_08_02' => $request['sec_05_08_02'],
            'sec_05_09_01' => $request['sec_05_09_01'],
            'sec_05_09_02' => $request['sec_05_09_02'],
            'sec_05_10_01' => $request['sec_05_10_01'],
            'sec_05_10_02' => $request['sec_05_10_02'],
            'sec_05_cd4_01' => $request['sec_05_cd4_01'],
            'sec_05_cd4_02' => $request['sec_05_cd4_02'],
            'sec_05_vl_01' => $request['sec_05_vl_01'],
            'sec_05_vl_02' => $request['sec_05_vl_02'],
            'sec_05_lx_01' => $request['sec_05_lx_01'],
            'sec_05_lx_02' => $request['sec_05_lx_02'],
            'sec_06_01' => $request['sec_06_01'],
            'sec_06_02' => $request['sec_06_02'],
            'sec_06_03' => $request['sec_06_03'],
            'sec_06_04' => $request['sec_06_04'],
            'is_fit' => $request['is_fit'],
            'physician_name' => $request['physician_name'],
            'physician_license' => $request['physician_license'],
            'physician_date' => $request['physician_date'],
            'is_eligible' => $request['is_eligible'],
            'encoded_by' => Auth::user()->name
        ]);

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

        $data = [
            'officer_name' => $request['officer_name'],
            'date_accomplished' => $request['date_accomplished'],
            'position' => $request['position'],
            'phone_number' => $request['phone_number'],
            'is_identified_sus' => $request['is_identified_sus'],
            'is_identified_prob' => $request['is_identified_prob'],
            'sec_02_01' => $request['sec_02_01'],
            'sec_02_02' => $request['sec_02_02'],
            'sec_02_03' => $request['sec_02_03'],
            'sec_02_04' => $request['sec_02_04'],
            'sec_02_05' => $request['sec_02_05'],
            'sec_02_06' => $request['sec_02_06'],
            'sec_02_07' => $request['sec_02_07'],
            'sec_02_08' => $request['sec_02_08'],
            'sec_02_09' => $request['sec_02_09'],
            'sec_02_10' => $request['sec_02_10'],
            'sec_02_10_01' => $request['sec_02_10_01'],
            'sec_02_11' => $request['sec_02_11'],
            'sec_02_12' => $request['sec_02_12'],
            'sec_02_13' => $request['sec_02_13'],
            'sec_02_14' => $request['sec_02_14'],
            'sec_02_15' => $request['sec_02_15'],
            'sec_02_16' => $request['sec_02_16'],
            'sec_02_17' => $request['sec_02_17'],
            'sec_02_18' => $request['sec_02_18'],
            'sec_02_19' => $request['sec_02_19'],
            'sec_02_20' => $request['sec_02_20'],
            'sec_02_20_01' => $request['sec_02_20_01'],
            'sec_02_21' => $request['sec_02_21'],
            'sec_02_22' => $request['sec_02_22'],
            'sec_03_01' => $request['sec_03_01'],
            'sec_03_02' => $request['sec_03_02'],
            'sec_03_02_01' => $request['sec_03_02_01'],
            'sec_03_03' => $request['sec_03_03'],
            'sec_03_03_01' => $request['sec_03_03_01'],
            'sec_03_04' => $request['sec_03_04'],
            'sec_03_04_01' => $request['sec_03_04_01'],
            'sec_04_01_01' => $request['sec_04_01_01'],
            'sec_04_01_02' => $request['sec_04_01_02'],
            'sec_04_01_03' => $request['sec_04_01_03'],
            'sec_04_02_01' => $request['sec_04_02_01'],
            'sec_04_02_02' => $request['sec_04_02_02'],
            'sec_04_02_03' => $request['sec_04_02_03'],
            'sec_04_03' => $request['sec_04_03'],
            'sec_04_03_01' => $request['sec_04_03_01'],
            'sec_05_01_01' => $request['sec_05_01_01'],
            'sec_05_01_02' => $request['sec_05_01_02'],
            'sec_05_02_01' => $request['sec_05_02_01'],
            'sec_05_02_02' => $request['sec_05_02_02'],
            'sec_05_03_01' => $request['sec_05_03_01'],
            'sec_05_03_02' => $request['sec_05_03_02'],
            'sec_05_04_01' => $request['sec_05_04_01'],
            'sec_05_04_02' => $request['sec_05_04_02'],
            'sec_05_05_01' => $request['sec_05_05_01'],
            'sec_05_05_02' => $request['sec_05_05_02'],
            'sec_05_06_01' => $request['sec_05_06_01'],
            'sec_05_06_02' => $request['sec_05_06_02'],
            'sec_05_07_01' => $request['sec_05_07_01'],
            'sec_05_07_02' => $request['sec_05_07_02'],
            'sec_05_08_01' => $request['sec_05_08_01'],
            'sec_05_08_02' => $request['sec_05_08_02'],
            'sec_05_09_01' => $request['sec_05_09_01'],
            'sec_05_09_02' => $request['sec_05_09_02'],
            'sec_05_10_01' => $request['sec_05_10_01'],
            'sec_05_10_02' => $request['sec_05_10_02'],
            'sec_05_cd4_01' => $request['sec_05_cd4_01'],
            'sec_05_cd4_02' => $request['sec_05_cd4_02'],
            'sec_05_vl_01' => $request['sec_05_vl_01'],
            'sec_05_vl_02' => $request['sec_05_vl_02'],
            'sec_05_lx_01' => $request['sec_05_lx_01'],
            'sec_05_lx_02' => $request['sec_05_lx_02'],
            'sec_06_01' => $request['sec_06_01'],
            'sec_06_02' => $request['sec_06_02'],
            'sec_06_03' => $request['sec_06_03'],
            'sec_06_04' => $request['sec_06_04'],
            'is_fit' => $request['is_fit'],
            'physician_name' => $request['physician_name'],
            'physician_license' => $request['physician_license'],
            'physician_date' => $request['physician_date'],
            'is_eligible' => $request['is_eligible'],
            'updated_by' => Auth::user()->name
        ];

        $updated = $this->screening->updateScreening($participantId, $data);

        if($updated){

            $notification = [
                'message' => 'Data  successfully updated!',
                'alert-type' => 'info'
            ];

            return redirect()->back()->with($notification);

        }
    }
}
