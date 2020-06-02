<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                <h1 class="h3 mb-2 text-grey-900">Delete Food Record</h1>
                <h6 class="m-0 font-weight-bold text-primary">Date {{$date}} - {{$day}} - Line number {{$lineno}}</h6>
                <div class="card-body">
                    <form id="delete-record" method="POST" action="{{ action('FoodRecordController@destroy', ['id' => $id, 'patid'=> $patid, 'date'=> $date  ]) }}" accept-charset="UTF-8">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="d-sm-inline-block btn btn-danger shadow-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>  {{-- end row--}}           
    </div> {{-- end container-fluid --}}
</div> {{-- end content --}}