@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-12">                   
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center ">
                        <a href="{{route('view.participant', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age ])}}" class="mr-3">
                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                <i class="fas fa-arrow-left"></i>   
                            </button>
                        </a>
                        <h6 class="m-0 font-weight-bold text-gray-800">Food Record: ID-{{$id}} {{$fullname}} {{$age}} years old</h6>
                    </div>
                    <div class="card-body">
                        <form id="insert-record-date" method="POST" action="{{ action('FoodRecordController@insertRecordDate', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age ]) }}">
                            @csrf
                            <h5 class="mb-3 text-primary">Please enter a record date to start!</h5>
                            <div class="input-group mb-4">
                                <label for="record_day" class="p-2">Record Date</label>
                                <input type="date" id="record_date" name="record_date" class="form-control btn-primary bg-light text-dark small" required>
                                <label for="record_day" class="p-2">Record Day</label>
                                <input type="number" min="0" placeholder="Record Day" id="record_day" name="record_day" class="form-control btn-primary bg-light text-dark small" value="{{$recordDay}}" required>
                                <a href="#" data-toggle="modal" data-target="#save-record-date" >
                                    <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Add</button>
                                </a>
                            </div>
                        </form>
                        <div class="list-group record-list">
                            <h4 class="text-dark">List of Encoded Food Record</h4>
                            @if(sizeOf($recordDates) > 0)
                                @foreach ($recordDates as $date)
                                <div class="list-group-item">
                                    <div class="row">
                                    <button type="button" data-path={{route('get.record.date', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=> $date->record_date, 'day'=> $date->record_day ])}} class="mr-4 btn btn-default open-modal"><i class="fas fa-pen"></i></button>
                                    <a href="{{route('encode.record', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=> $date->record_date, 'day'=> $date->record_day ])}}" class="pt-1">
                                        <h6>Record : {{$date->record_date}}</h6>
                                    </a>
                                    </div>
                                </div>
                                @endforeach
                            @else 
                                <h6 class="pt-2">No Food Record Found!</h6>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Confirmation Modal --}}
                <div class="modal fade" id="save-record-date" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                            </div>
                            <div class="modal-body">Select "Proceed" below if you want to save the record date.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="#"
                                    onclick="event.preventDefault();
                                    document.getElementById('insert-record-date').submit();">
                                    Proceed
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>             
</div>
@endsection