<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                <h1 class="h3 mb-2 text-grey-900">Update Record Date</h1>
                <h6 class="m-0 font-weight-bold text-primary">ID {{$id}} - {{$fullname}} {{$age}}</h6>
                <div class="card-body">
                    <form id="update-record-date" method="POST" action="{{ action('FoodRecordController@updateRecordDate', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=>$date ]) }}" accept-charset="UTF-8">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Record Date</label>
                                    <input type="date" id="record_date" name="record_date" class="form-control btn-primary bg-light text-dark small" required value="{{ $date }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="d-sm-inline-block btn btn-primary shadow-sm">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>  {{-- end row--}}           
    </div> {{-- end container-fluid --}}
</div> {{-- end content --}}