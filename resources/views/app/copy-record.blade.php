<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                <h1 class="h3 mb-2 text-grey-900">Copy Food Record</h1>
                <div class="card-body">
                    <form id="copy-food-record" method="POST" action="{{ action('FoodRecordController@insertCopiedRecords', ['id'=> $id, 'date'=>$date ]) }}" accept-charset="UTF-8">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="patient_id">Please select or type exact patient id</label>
                                    <input type="text" list="participant-id" class="form-control" name="patient_id" id="patient_id" placeholder="Please select" required autocomplete="off"/>
                                    <datalist id="participant-id" >
                                            @foreach($participant as $value)
                                            <option value="{{$value->participant_id != $id ? $value->participant_id : ''}}">{{$value->participant_id != $id ? $value->full_name : ''}}</option>
                                            @endforeach                                         
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="record_date">Please input the date</label>
                                    <input type="date" class="form-control" name="record_date" id="record_date" required/>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="d-sm-inline-block btn btn-primary shadow-sm">
                            Copy Record
                        </button>
                    </form>
                </div>
            </div>
        </div>          
    </div>
</div>