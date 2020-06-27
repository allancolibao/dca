<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                <h1 class="h3 mb-2 text-grey-900">Restore Food Record</h1>
                <div class="card-body">
                    <form action="{{ action('FoodRecordController@restoreDeletedLineNumber', ['id'=> $id ]) }}" method="POST">
                        @csrf
                        <button type="button" class="d-sm-inline-block btn btn-default shadow-sm mr-2" data-dismiss="modal" aria-label="Close">
                            Cancel
                        </button> 
                        <button type="submit" class="d-sm-inline-block btn btn-primary shadow-sm">
                            Proceed
                        </button> 
                    </form>
                </div>
            </div>
        </div>       
    </div>
</div>