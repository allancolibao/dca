<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RecordDateRequest;
use App\Http\Requests\RecordDataRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use DateTime;
use App\Participant;
use App\Header;
use App\Record;
use App\FCT;
use App\Activity;
use Auth;

class FoodRecordController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Header $header, FCT $fct, Record $record, Participant $participant)
    {   
        $this->middleware('auth');
        $this->header = $header;
        $this->fct = $fct;
        $this->record = $record;
        $this->participant = $participant;
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

        $data = $request->all();
        
        $row_id = array_reverse($data['row_id']);
        $line_no = array_reverse($data['line_no']);
        $food_item = array_reverse($data['food_item']);
        $fi_amount_size = array_reverse($data['fi_amount_size']);
        $plate_waste = array_reverse($data['plate_waste']);
        $pw_amount_size = array_reverse($data['pw_amount_size']);
        $rf_code = array_reverse($data['rf_code']);
        $meal_code = array_reverse($data['meal_code']);

        if(Auth::user()->is_admin != 3) {
        $food_code = array_reverse($data['food_code']);
        $food_weight = array_reverse($data['food_weight']);
        $fw_rcc = array_reverse($data['fw_rcc']);
        $fw_cmc = array_reverse($data['fw_cmc']);
        $supply_code = array_reverse($data['supply_code']);
        $src_code = array_reverse($data['src_code']);
        $pw_weight = array_reverse($data['pw_weight']);
        $pw_rcc = array_reverse($data['pw_rcc']);
        $pw_cmc = array_reverse($data['pw_cmc']);
        $unit_cost = array_reverse($data['unit_cost']);
        $unit_weight = array_reverse($data['unit_weight']);
        $unit_meas = array_reverse($data['unit_meas']);
        }

        if(sizeOf($data) > 0)
        {
            foreach($line_no as $input => $value){

                if(Auth::user()->is_admin != 3) {

                $data = [
                    'line_no' => $line_no[$input],
                    'food_item' => $food_item[$input],
                    'fi_amount_size' => $fi_amount_size[$input],
                    'plate_waste' => $plate_waste[$input],
                    'pw_amount_size' => $pw_amount_size[$input],
                    'rf_code' => $rf_code[$input],
                    'meal_code' => $meal_code[$input],
                    'food_code' => $food_code[$input],
                    'fic' => Str::substr($food_code[$input], 0, 4),
                    'food_weight' => $food_weight[$input],
                    'fw_rcc' => $fw_rcc[$input],
                    'fw_cmc' => $fw_cmc[$input],
                    'supply_code' => $supply_code[$input],
                    'src_code' => $src_code[$input],
                    'pw_weight' => $pw_weight[$input],
                    'pw_rcc' => $pw_rcc[$input],
                    'pw_cmc' => $pw_cmc[$input],
                    'unit_cost' => $unit_cost[$input],
                    'unit_weight' => $unit_weight[$input],
                    'unit_meas' => $unit_meas[$input],
                    'updated_by' => Auth::user()->name
                ];

                } else {

                $data = [
                    'line_no' => $line_no[$input],
                    'food_item' => $food_item[$input],
                    'fi_amount_size' => $fi_amount_size[$input],
                    'plate_waste' => $plate_waste[$input],
                    'pw_amount_size' => $pw_amount_size[$input],
                    'rf_code' => $rf_code[$input],
                    'meal_code' => $meal_code[$input],
                    'updated_by' => Auth::user()->name
                ];

                }

                $rowId = $row_id[$input];

                try {

                $dataInserted = $this->record->updateRecord($rowId, $participantId, $recordDate, $data);

                } catch (Exception $error) {

                    $notification = [

                        'message' => 'Unable to update! Duplicate entry on line number '.$line_no[$input].'',
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


    /**
    * Show food record for deletion
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function toDelete($id, $patid, $date, $day, $lineno)
    {   

        return view('app.delete-food-record', compact('id','patid', 'date', 'day', 'lineno'));

    }


    /**
    * Delete food record
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function destroy($id, $patid, $date)
    {   
        
        $line = $this->record->getMaxLineNumber($patid, $date);

        if($line !== null) {

            $data = [
                'line_no' => $line + 1,
            ];

        } else {

            $data = [
                'line_no' => '500'
            ];
        }

        $dataInserted = $this->record->updateLineNumber($id, $data);
        $record = $this->record->deleteLineNumber($id);
        $user = Auth::user()->name;

        if($record) {
            $data = Activity::create([
                'action' => $user.' successfully deleted line number '.$data['line_no'].' on record date '.$date.'.',
                'taken_by' => $user
            ]);
        }
        
        $notification = [
            'message' => 'Successfully deleted!',
            'alert-type' => 'warning'
        ];

        return redirect()->back()->with($notification);

    }

    /**
    * Get deleted records
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function getDeleted($id, $fullname, $sex, $age, $date)
    {   
        $fct = $this->fct->getAllFctData();
        $recordData = $this->record->getDeletedLineNumber($id, $date);

        $recordDate = $date;
        $day = new DateTime($recordDate);
        $recordDay  = $day->format('l');

        return view('app.deleted-record', compact('id','fullname','sex','age','date', 'recordData', 'recordDay', 'fct'));

    }

    /**
    * Restore the target deleted participant
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function restoreDeletedLineNumber($id)
    {   

        $record = $this->record->restoreLineNumber($id);
        $user = Auth::user()->name;

        if($record) {
            $data = Activity::create([
                'action' => $user.' successfully restored line number with id'.$id.'.',
                'taken_by' => $user
            ]);
        }

        $notification = [
            'message' => 'Data successfully restored!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }


    /**
    * Copy Records
    *
    * 
    */
    public function copyRecords($id, $date)
    {   

        $participant = $this->participant->getAllParticipant();

        return view('app.copy-record', compact('id','date', 'participant'));

    }



    /**
    * Insert Copied Records
    *
    * 
    */
    public function insertCopiedRecords(Request $request, $id, $date)
    {   

        $patientID = $request['patient_id'];
        $patientRecordDate = $request['record_date'];

        $recordData = $this->record->getRecordData($patientID, $patientRecordDate);

        if(sizeOf($recordData) > 0 ) {
            foreach($recordData as $record) {

                $newData = $record->replicate();

                $data = [
                    'participant_id' =>  $id,
                    'record_date' => $date,
                    'line_no' => $newData->line_no,
                    'food_item' => $newData->food_item,
                    'fi_amount_size' => $newData->fi_amount_size,
                    'plate_waste' => $newData->plate_waste,
                    'pw_amount_size' => $newData->pw_amount_size,
                    'rf_code' => $newData->rf_code,
                    'meal_code' => $newData->meal_code,
                    'food_code' => $newData->food_code,
                    'fic' => $newData->fic,
                    'food_weight' => $newData->food_weight,
                    'fw_rcc' => $newData->fw_rcc,
                    'fw_cmc' => $newData->fw_cmc,
                    'supply_code' => $newData->supply_code,
                    'src_code' => $newData->src_code,
                    'pw_weight' => $newData->pw_weight,
                    'pw_rcc' => $newData->pw_rcc,
                    'pw_cmc' => $newData->pw_cmc,
                    'unit_cost' => $newData->unit_cost,
                    'unit_weight' => $newData->unit_weight,
                    'unit_meas' => $newData->unit_meas,
                    'encoded_by' => $newData->encoded_by,
                    'updated_by' => $newData->updated_by
                ];

                $dataInserted = Record::insertIgnore($data);
            }

        } else {

            $notification = [
                'message' => 'Nothing to copy! Please select exact patient ID and date.',
                'alert-type' => 'error'
            ];
    
            return redirect()->back()->with($notification);

        }        

        $notification = [
            'message' => 'Data successfully inserted!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

}

