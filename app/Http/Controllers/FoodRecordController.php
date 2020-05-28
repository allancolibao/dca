<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RecordDateRequest;
use App\Http\Requests\RecordDataRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use DateTime;
use App\Header;
use App\Record;
use App\FCT;
use Auth;;

class FoodRecordController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Header $header, FCT $fct, Record $record)
    {   
        $this->middleware('auth');
        $this->header = $header;
        $this->fct = $fct;
        $this->record = $record;
    }

    /**
    * View participant record.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index($id, $fullname, $sex, $age)
    {   
        $recordDates = $this->header->getRecordDate($id);

        return view('app.record', compact('id','fullname','sex','age','recordDates'));
    }

    /**
    * Insert record date.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function insertRecordDate(RecordDateRequest $request, $participantId, $fullname, $sex, $age)
    {   
        $recordDate = $request['record_date'];
        $day = new DateTime($recordDate);
        $recordDay  = $day->format('l');
       
        $recordDate = [
            'participant_id' => $participantId,
            'record_date' => $request['record_date'],
            'record_day' => $recordDay,
            'encoded_by' => Auth::user()->name
        ];

        $dateInserted = Header::insertIgnore($recordDate);

        $notification = [
            'message' => 'Data successfully inserted!',
            'alert-type' => 'success'
        ];

        return redirect()->route('encode.record', ['id'=> $participantId, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=> $request['record_date']])->with($notification);
    }

    /**
    * Get the record encoding page.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function encode($id, $fullname, $sex, $age, $date)
    {   

        $fct = $this->fct->getAllFctData();
        $recordHeader = $this->header->getRecordHeader($id, $date);
        $recordData = $this->record->getRecordData($id, $date);

        $recordDate = $date;
        $day = new DateTime($recordDate);
        $recordDay  = $day->format('l');

        return view('app.encode-record', compact('id','fullname','sex','age','date','fct','recordDay','recordHeader','recordData'));

    }

    /**
    * View record date.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function getUpdateRecordDate($id, $fullname, $sex, $age, $date)
    {   

        return view('app.update-record-date', compact('id','fullname','sex','age','date'));

    }

    /**
    * Update record date
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function updateRecordDate(RecordDateRequest $request, $participantId, $fullname, $sex, $age, $recordDate)
    {   
        $date = $request['record_date'];
        $day = new DateTime($date);
        $recordDay  = $day->format('l');

        $headerData = [
            'record_date' => $request['record_date'],
            'record_day' => $recordDay,
            'updated_by' => Auth::user()->name
        ];

        $recallData = [
            'record_date' => $request['record_date'],
            'updated_by' => Auth::user()->name
        ];

        $updatedDate = $this->header->recordDate($participantId, $recordDate, $headerData);
        $updatedRecord = $this->record->updateAllRecordDate($participantId, $recordDate, $recallData);

            
        $notification = [
            'message' => 'Data  successfully updated!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }

    /**
    * Insert record Data.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function insertRecordData(Request $request, $participantId, $fullname, $sex, $age, $recordDate)
    {   
        if(sizeof($request->line_no) > 0)
        {
            foreach($request->line_no as $input => $value){

                $record = [
                    'participant_id' => $participantId,
                    'record_date' => $recordDate,
                    'line_no' => $request->line_no[$input],
                    'food_item' => $request->food_item[$input],
                    'fi_amount_size' => $request->fi_amount_size[$input],
                    'plate_waste' => $request->plate_waste[$input],
                    'pw_amount_size' => $request->pw_amount_size[$input],
                    'rf_code' => $request->rf_code[$input],
                    'meal_code' => $request->meal_code[$input],
                    'food_code' => $request->food_code[$input],
                    'fic' => Str::substr($request->food_code[$input], 0, 4),
                    'food_weight' => $request->food_weight[$input],
                    'fw_rcc' => $request->fw_rcc[$input],
                    'fw_cmc' => $request->fw_cmc[$input],
                    'supply_code' => $request->supply_code[$input],
                    'src_code' => $request->src_code[$input],
                    'pw_weight' => $request->pw_weight[$input],
                    'pw_rcc' => $request->pw_rcc[$input],
                    'pw_cmc' => $request->pw_cmc[$input],
                    'unit_cost' => $request->unit_cost[$input],
                    'unit_weight' => $request->unit_weight[$input],
                    'unit_meas' => $request->unit_meas[$input],
                    'encoded_by' => Auth::user()->name
                ];

                $dataInserted = Record::insertIgnore($record);
            }
        }

        $notification = [
            'message' => 'Data successfully inserted!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }


    /**
    * Get the record data.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function getRecord($id, $fullname, $sex, $age, $date)
    {   

        $fct = $this->fct->getAllFctData();
        $recordHeader = $this->header->getRecordHeader($id, $date);
        $recordData = $this->record->getRecordData($id, $date);

        $recordDate = $date;
        $day = new DateTime($recordDate);
        $recordDay  = $day->format('l');

        return view('app.update-record', compact('id','fullname','sex','age','date','fct','recordDay','recordHeader','recordData'));

    }

    /**
    * Update record data.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function updateRecordData(RecordDataRequest $request, $participantId, $fullname, $sex, $age, $recordDate)
    {   
        $i = 0;
        if(sizeof($request->line_no) > 0)
        {
            foreach($request->line_no as $input => $value){

                $i++;

                $data = [
                    'line_no' => $request->line_no[$input],
                    'food_item' => $request->food_item[$input],
                    'fi_amount_size' => $request->fi_amount_size[$input],
                    'plate_waste' => $request->plate_waste[$input],
                    'pw_amount_size' => $request->pw_amount_size[$input],
                    'rf_code' => $request->rf_code[$input],
                    'meal_code' => $request->meal_code[$input],
                    'food_code' => $request->food_code[$input],
                    'fic' => Str::substr($request->food_code[$input], 0, 4),
                    'food_weight' => $request->food_weight[$input],
                    'fw_rcc' => $request->fw_rcc[$input],
                    'fw_cmc' => $request->fw_cmc[$input],
                    'supply_code' => $request->supply_code[$input],
                    'src_code' => $request->src_code[$input],
                    'pw_weight' => $request->pw_weight[$input],
                    'pw_rcc' => $request->pw_rcc[$input],
                    'pw_cmc' => $request->pw_cmc[$input],
                    'unit_cost' => $request->unit_cost[$input],
                    'unit_weight' => $request->unit_weight[$input],
                    'unit_meas' => $request->unit_meas[$input],
                    'updated_by' => Auth::user()->name
                ];

                $rowId = $request->row_id[$input];

                try {

                $dataInserted = $this->record->updateRecord($rowId, $participantId, $recordDate, $data);

                } catch (Exception $error) {

                    $notification = [

                        'message' => 'Unable to update! Duplicate entry on row number '.$i.'',
                        'alert-type' => 'error'
                    ];
                    return redirect()->back()->with($notification);
                }
            }
        }

        $notification = [
            'message' => 'Data successfully updated!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }


    /**
    * Update record header
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function updateRecordHeader(Request $request, $id, $fullname, $sex, $age, $date)
    { 
        $data = [
            'accom_by' => $request['accom_by'],
            'position' => $request['position'],
            'date' => $request['date'],
            'updated_by' => Auth::user()->name
        ];

        $updated = $this->header->recordDate($id, $date, $data);

        $notification = [
            'message' => 'Data  successfully updated!',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }

    /**
    * View the cycle menu
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function menu()
    {   

        return view('app.cycle-menu');

    }
}
