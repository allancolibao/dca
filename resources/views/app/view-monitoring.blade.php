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
                        <h6 class="m-0 font-weight-bold text-gray-800">Update Participant Monitoring Form-1A: ID-{{$id}} {{$fullname}} {{$age}} years old</h6>
                    </div>
                    <form id="insert-monitoring-header" method="POST" action="{{$header ? action('DailyMonitoringController@updateHeader', $id) : action('DailyMonitoringController@insertHeader', $id) }}" accept-charset="UTF-8">
                        @csrf
                        <div class="card-body">
                            <h3 class="text-center">
                                PARTICIPANT MONITORING FORM-1A
                            </h3>
                            <h5 class="text-center" style="text-decoration:underline;">
                                (Clinical Daily Features, Day 1 to 14)
                            </h5>
                            <p class="text-center">
                                Modified from the WHO COVID-19 Case Record Form Rapid version 23Mar2020 and the British Columbia Centre for Disease Control Daily Self-Monitoring Form for COVID-19
                            </p>
                            <div class="table-responsive">
                                <table class="table"  width="100%" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="center_name">Center Name</label>
                                            <input type="text" class="form-control form-header-field" name="center_name" id="center_name" value="{{$header ? $header->center_name : old('center_name') }}">
                                            </td>
                                            <td>
                                                <label for="center_address">Address</label>
                                                <input type="text" class="form-control form-header-field" name="center_address" id="center_address"  value="{{$header ? $header->center_address : old('center_address') }}">
                                            </td>
                                            <td>
                                                <label for="date_fill">Date</label>
                                                <input type="date" class="form-control form-header-field" name="date_fill" id="date_fill"  value="{{$header ? $header->date_fill: old('date_fill') }}">
                                            </td>
                                            <td>
                                                <label for="date_enroll">Date of Enrollment in the Project</label>
                                                <input type="date" class="form-control form-header-field" name="date_enroll" id="date_enroll"  value="{{$header ? $header->date_enroll: old('date_enroll') }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pt-4 pb-2">
                                <a href="{{route('encode.daily.monitoring', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age ])}}">
                                    <button type="button" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                       Encode
                                    </button> 
                                </a>
                            </div>
                            <div class="table-responsive table-responsive-foodrecord">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Edit</th>
                                            <th>Day</th>
                                            <th>Date</th>
                                            <th>Temperature</th>
                                            <th>Chills</th>
                                            <th>Conjunctivitis</th>
                                            <th>Cough & sputum</th>
                                            <th>Cough Only (dry)</th>
                                            <th>Diarrhea</th>
                                            <th>Runny nose</th>
                                            <th>Short of breath</th>
                                            <th>Sore throat</th>
                                            <th>Loss of appetite</th>
                                            <th>Sense of smell</th>
                                            <th>Confusion</th>
                                            <th>Seizures</th>
                                            <th>Vomiting</th>
                                            <th>Muscle pain</th>
                                            <th>Chest pain</th>
                                            <th>Other</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeOf($monitoring) > 0)
                                        @foreach ($monitoring as $data)
                                            <tr>  
                                                <td>
                                                    <button data-path={{ route('edit.daily.monitoring', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'day'=>$data->mon_day])}} type="button" class="d-sm-inline-block btn btn-sm btn-dark shadow-sm open-modal">
                                                        <i class="fas fa-pen"></i>
                                                    </button>  
                                                </td>                 
                                                <td>{{$data->mon_day}}</td>
                                                <td>{{$data->mon_date}}</td>
                                                <td>{{$data->mon_temp}}</td>
                                                <td>{{$data->mon_chills == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_conjunct == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_cough == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_cough_dry == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_diarrhea == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_runny == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_breath == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_throat == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_appetite == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_smell == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_confusion == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_seizures == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_vomiting == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_muscle_pain == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_chest_pain == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_other == 0 ? 'No' : 'Yes'}}</td>
                                                <td>{{$data->mon_other_note}}</td>
                                            </tr>  
                                        @endforeach
                                        @else 
                                            <tr>
                                                <td colspan="21">No data to display</td>
                                            </tr>
                                        @endif
                                    </tbody>  
                                </table>
                            </div>  
                            <div class="pt-4"></div>
                            <div class="mt-4">  
                                <p>
                                    Other Complaints, specify : (If complaints is suspected to be related to VCO, proceed investigating following the Adverse event form)
                                    <a href="{{route('get.adverse.event', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age ] )}}">
                                        <button type="button" class="btn btn-sm btn-danger ml-2">Adverse event form</button>
                                    </a>
                                </p>
                                <p>
                                    Date Withdrawal from the study 
                                    <input type="date" class="form-control form-header-field" name="date_withdraw" id="date_withdraw"  value="{{$header ? $header->date_withdraw: old('date_withdraw') }}">
                                    (Proceed with accomplishing the Withdrawal form)
                                </p>
                                <div class="table-responsive">
                                    <table class="table"  width="100%" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="completed_by">Completed by</label>
                                                    <input type="text" class="form-control form-header-field" name="completed_by" id="completed_by" value="{{$header ? $header->completed_by : old('completed_by') }}">
                                                </td>
                                                <td>
                                                    <label for="center_address">Date</label>
                                                    <input type="date" class="form-control form-header-field" name="date_completed" id="date_completed"  value="{{$header ? $header->date_completed : old('date_completed') }}">
                                                </td>
                                                <td>
                                                    <label for="position">Position</label>
                                                    <input type="text" class="form-control form-header-field" name="position" id="position"  value="{{$header ? $header->position: old('position') }}">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- Launch the Confirmation modal --}}
                            <a href="#" data-toggle="modal" data-target="#save-monitoring-header">
                                <button type="button" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                    {{$header ? 'Update' : 'Save'}}
                                </button>
                            </a>           
                        </div>
                    </form> 

                    {{-- Monitoring Confirmation Modal --}}
                    <div class="modal fade" id="save-monitoring-header" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Proceed" below if you want to submit Monitoring Form.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="#"
                                    onclick="event.preventDefault();
                                    document.getElementById('insert-monitoring-header').submit();">
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
</div>
@endsection