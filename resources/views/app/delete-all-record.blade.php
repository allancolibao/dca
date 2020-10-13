<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                <h1 class="h3 mb-2 text-grey-900">Delete Food Record</h1>
                <h6 class="m-0 font-weight-bold text-primary">ID {{$patid}} - {{$date}} {{$day}}</h6>
                <div class="card-body">
                    <form id="delete-all-record" method="POST" action="{{ action('FoodRecordController@destroyAll', ['patid'=> $patid, 'date'=>$date ]) }}" accept-charset="UTF-8">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />
                        @foreach ($record as $data)
                            <input type="hidden" name="row_id[]" value="{{$data->id}}" />
                        @endforeach
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Please enter your password" required autocomplete="off"/>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="d-sm-inline-block btn btn-danger shadow-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>          
    </div>
</div>