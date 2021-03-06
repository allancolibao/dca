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
use Hash;

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
        $recordDatesCount = $recordDates->count();
        $recordDay = $recordDatesCount + 1;

        return view('app.record', compact('id','fullname','sex','age','recordDates', 'recordDay'));
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
            'record_day' => $request['record_day'],
            'encoded_by' => Auth::user()->name
        ];

        $dateInserted = Header::insertIgnore($recordDate);

        $notification = [
            'message' => 'Data successfully inserted!',
            'alert-type' => 'success'
        ];

        return redirect()->route('encode.record', ['id'=> $participantId, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=> $request['record_date'], 'day'=> $request['record_day']])->with($notification);
    }

    /**
    * Get the record encoding page.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function encode($id, $fullname, $sex, $age, $date, $day)
    {   

        $fct = $this->fct->getAllFctData();
        $recordHeader = $this->header->getRecordHeader($id, $date);
        $recordData = $this->record->getRecordData($id, $date);

        $recordDate = $date;
        $newDay = new DateTime($recordDate);
        $recordDay  = $newDay->format('l');

        return view('app.encode-record', compact('id','fullname','sex','age','date','fct','recordDay','recordHeader','recordData', 'day'));

    }

    /**
    * View record date.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function getUpdateRecordDate($id, $fullname, $sex, $age, $date, $day)
    {   

        return view('app.update-record-date', compact('id','fullname','sex','age','date', 'day'));

    }

    /**
    * Update record date
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function updateRecordDate(RecordDateRequest $request, $participantId, $fullname, $sex, $age, $recordDate)
    {   

        $headerData = [
            'record_date' => $request['record_date'],
            'record_day' => $request['record_day'],
            'updated_by' => Auth::user()->name
        ];

        $recallData = [
            'record_date' => $request['record_date'],
            'record_day' => $request['record_day'],
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
    public function insertRecordData(Request $request, $participantId, $fullname, $sex, $age, $recordDate, $day)
    {   
        if(sizeof($request->line_no) > 0)
        {
            foreach($request->line_no as $input => $value){

                $record = [
                    'participant_id' => $participantId,
                    'record_date' => $recordDate,
                    'record_day' => $day,
                    'menu_title' => $request->menu_title[$input],
                    'line_no' => $request->line_no[$input],
                    'food_item' => $request->food_item[$input],
                    'fi_amount_size' => $request->fi_amount_size[$input],
                    'rf_code' => $request->rf_code[$input],
                    'meal_code' => $request->meal_code[$input],
                    'food_source' => $request->food_source[$input],
                    'food_code' => $request->food_code[$input],
                    'fic' => Str::substr($request->food_code[$input], 0, 4),
                    'food_weight' => $request->food_weight[$input],
                    'fw_rcc' => $request->fw_rcc[$input],
                    'fw_cmc' => $request->fw_cmc[$input],
                    'supply_code' => $request->supply_code[$input],
                    'src_code' => $request->src_code[$input], 
                    'plate_waste' => $request->plate_waste[$input],
                    'pw_amount_size' => $request->pw_amount_size[$input],
                    'pw_weight' => $request->pw_weight[$input],
                    'pw_rcc' => $request->pw_rcc[$input],
                    'pw_cmc' => $request->pw_cmc[$input],
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
    public function getRecord($id, $fullname, $sex, $age, $date, $day)
    {   

        $fct = $this->fct->getAllFctData();
        $recordHeader = $this->header->getRecordHeader($id, $date);
        $recordData = $this->record->getRecordData($id, $date);

        $recordDate = $date;
        $newDay = new DateTime($recordDate);
        $recordDay  = $newDay->format('l');

        return view('app.update-record', compact('id','fullname','sex','age','date','fct','recordDay','recordHeader','recordData', 'day'));

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
        $menu_title = array_reverse($data['menu_title']);
        $line_no = array_reverse($data['line_no']);
        $food_item = array_reverse($data['food_item']);
        $fi_amount_size = array_reverse($data['fi_amount_size']);
        $rf_code = array_reverse($data['rf_code']);
        $meal_code = array_reverse($data['meal_code']);
        $food_source = array_reverse($data['food_source']);

        if(Auth::user()->is_admin != 3) {
        $food_code = array_reverse($data['food_code']);
        $food_weight = array_reverse($data['food_weight']);
        $fw_rcc = array_reverse($data['fw_rcc']);
        $fw_cmc = array_reverse($data['fw_cmc']);
        $supply_code = array_reverse($data['supply_code']);
        $src_code = array_reverse($data['src_code']);
        $plate_waste = array_reverse($data['plate_waste']);
        $pw_amount_size = array_reverse($data['pw_amount_size']);
        $pw_weight = array_reverse($data['pw_weight']);
        $pw_rcc = array_reverse($data['pw_rcc']);
        $pw_cmc = array_reverse($data['pw_cmc']);
        }

        if(sizeOf($data) > 0)
        {
            foreach($line_no as $input => $value){

                if(Auth::user()->is_admin != 3) {

                $data = [
                    'menu_title' => $menu_title[$input],
                    'line_no' => $line_no[$input],
                    'food_item' => $food_item[$input],
                    'fi_amount_size' => $fi_amount_size[$input],
                    'rf_code' => $rf_code[$input],
                    'meal_code' => $meal_code[$input],
                    'food_source' => $food_source[$input],
                    'food_code' => $food_code[$input],
                    'fic' => Str::substr($food_code[$input], 0, 4),
                    'food_weight' => $food_weight[$input],
                    'fw_rcc' => $fw_rcc[$input],
                    'fw_cmc' => $fw_cmc[$input],
                    'supply_code' => $supply_code[$input],
                    'src_code' => $src_code[$input],
                    'plate_waste' => $plate_waste[$input],
                    'pw_amount_size' => $pw_amount_size[$input],
                    'pw_weight' => $pw_weight[$input],
                    'pw_rcc' => $pw_rcc[$input],
                    'pw_cmc' => $pw_cmc[$input],
                    'updated_by' => Auth::user()->name
                ];

                } else {

                $data = [
                    'menu_title' => $menu_title[$input],
                    'line_no' => $line_no[$input],
                    'food_item' => $food_item[$input],
                    'fi_amount_size' => $fi_amount_size[$input],
                    'rf_code' => $rf_code[$input],
                    'meal_code' => $meal_code[$input],
                    'food_source' => $food_source[$input],
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
        
        $data = [
            'line_no' => random_int(500,9999),
        ];

        $updated = $this->record->updateLineNumber($id, $data);
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
    public function getDeleted($id, $fullname, $sex, $age, $date, $day)
    {   
        $fct = $this->fct->getAllFctData();
        $recordData = $this->record->getDeletedLineNumber($id, $date);

        $recordDate = $date;
        $newDay = new DateTime($recordDate);
        $recordDay  = $newDay->format('l');

        return view('app.deleted-record', compact('id','fullname','sex','age','date', 'recordData', 'recordDay', 'fct', 'day'));

    }


    /**
    * Get restore line number
    *
    * 
    */
    public function getrestoreDeletedLineNumber($id)
    {   

        return view('app.confirm-restore', compact('id'));

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
                'action' => $user.' successfully restored line number with id '.$id.'.',
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
                    'menu_title' => $newData->menu_title,
                    'line_no' => $newData->line_no,
                    'food_item' => $newData->food_item,
                    'fi_amount_size' => $newData->fi_amount_size,
                    'rf_code' => $newData->rf_code,
                    'meal_code' => $newData->meal_code,
                    'food_source' => $newData->food_source,
                    'food_code' => $newData->food_code,
                    'fic' => $newData->fic,
                    'food_weight' => $newData->food_weight,
                    'fw_rcc' => $newData->fw_rcc,
                    'fw_cmc' => $newData->fw_cmc,
                    'supply_code' => $newData->supply_code,
                    'src_code' => $newData->src_code,
                    'plate_waste' => $newData->plate_waste,
                    'pw_amount_size' => $newData->pw_amount_size,
                    'pw_weight' => $newData->pw_weight,
                    'pw_rcc' => $newData->pw_rcc,
                    'pw_cmc' => $newData->pw_cmc,
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


    /**
    * Show delete all record confirmation
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function deleteAll($patid, $date, $day)
    {   
        $record = $this->record->deleteParticipantRecordPerDay($patid, $date)->get();

        return view('app.delete-all-record', compact('patid', 'date', 'day', 'record'));

    }


    /**
    * Delete the target Participant
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function destroyAll(Request $request, $patid, $date)
    {   
        if(Hash::check($request['password'], Auth::user()->password))
        {  

        $rowId = $request['row_id'];

        if(is_array($rowId) && sizeof($rowId) > 0) {

            foreach($rowId as $id) {

                $data = [
                    'line_no' => random_int(500,9999),
                ];

                $lineUpdated = $this->record->updateLineNumber($id, $data);

                $user = Auth::user()->name;

                if($lineUpdated) {
                    $data = Activity::create([
                        'action' => $user.' successfully deleted line number '.$data['line_no'].' on record date '.$date.'.',
                        'taken_by' => $user
                    ]);
                }
            }

            $record = $this->record->deleteParticipantRecordPerDay($patid, $date)->delete();
                     
            $notification = [
                'message' => 'Data successfully deleted!',
                'alert-type' => 'warning'
            ];

            return redirect()->back()->with($notification);

        }
                     
        $notification = [
            'message' => 'Nothing to delete!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($notification);

        } else {

        $notification = [
            'message' => ' Incorrect password!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($notification);
        }
    }

}

