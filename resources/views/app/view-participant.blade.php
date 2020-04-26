@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-12">                   
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center ">
                        <a href="{{ route('home')}}" class="mr-3">
                            <button type="button" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                <i class="fas fa-arrow-left"></i>   
                            </button>
                        </a>
                        <h6 class="m-0 font-weight-bold text-gray-800">ID-{{$id}} {{$fullname}} {{$age}} years old</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="text-dark">List of Forms</h4>
                        <div class="list-group form-list">
                            <a href="{{route('view.screening', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age ])}}" class="list-group-item d-flex justify-content-between align-items-center">
                                <h6>Screening Form </h6>
                            </a>
                            <a href="{{route('view.case.report', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age ])}}" class="list-group-item d-flex justify-content-between align-items-center">
                                <h6>Case Report Form</h6>
                            </a>
                            <a href="{{route('view.daily.monitoring', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age ])}}" class="list-group-item d-flex justify-content-between align-items-center">
                                <h6>Daily Monitoring</h6>
                            </a>
                            <a href="{{route('view.record', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age ])}}" class="list-group-item d-flex justify-content-between align-items-center">
                                <h6>Daily Food Record</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>             
@endsection