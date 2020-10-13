@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center ">
                        <a href="{{route('view.daily.monitoring', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age ])}}" class="mr-3">
                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                <i class="fas fa-arrow-left"></i>   
                            </button>
                        </a>
                        <h6 class="m-0 font-weight-bold text-gray-800">Participant Monitoring Form-1A: ID-{{$id}} {{$fullname}} {{$age}} years old</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="text-danger mb-4">Daily Monitoring Day</h4>
                        <form id="insert-monitoring-data" method="POST" action="{{ action('DailyMonitoringController@insert', $id) }}" accept-charset="UTF-8">
                            @csrf 
                            <div class="table-responsive table-responsive-foodrecord">
                                <table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">   
                                    <tr>
                                        <th>
                                            Monitoring Day
                                            <input type="number" class="form-control {{ $errors->has('mon_day') ? 'has-error' : ''}}" name="mon_day" id="mon_day" value="{{ old('mon_day') }}">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Date (MM/DD)
                                            <input type="date" class="form-control {{ $errors->has('mon_date') ? 'has-error' : ''}}" name="mon_date" id="mon_date" value="{{ old('mon_date') }}">
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Daily temperature*(degrees Celsius)
                                            <input type="text" class="form-control" name="mon_temp" id="mon_temp" value="{{ old('mon_temp') }}" placeholder="(°C)">
                                        </th>
                                    </tr> 
                                    <tr style="background:#ececec;">
                                        <th>Based on the interview with the Patient write YES (Y) or NO (N) below for each symptom experienced by the participant at any given day (CHECK IF YES)</th>
                                    </tr>   
                                    <tr>
                                        <th>
                                            Chills
                                            <input type="hidden" value="0" name="mon_chills">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_chills" id="mon_chills" {{ (old("mon_chills") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Conjunctivitis (pink eye)
                                            <input type="hidden" value="0" name="mon_conjunct">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_conjunct" id="mon_conjunct" {{ (old("mon_conjunct") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Cough and sputum production
                                            <input type="hidden" value="0" name="mon_cough">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_cough" id="mon_cough" {{ (old("mon_cough") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Cough Only (dry)
                                            <input type="hidden" value="0" name="mon_cough_dry">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_cough_dry" id="mon_cough_dry" {{ (old("mon_cough_dry") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Diarrhea (loose stool/poop)
                                            <input type="hidden" value="0" name="mon_diarrhea">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_diarrhea" id="mon_diarrhea" {{ (old("mon_diarrhea") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Runny nose
                                            <input type="hidden" value="0" name="mon_runny">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_runny" id="mon_runny" {{ (old("mon_runny") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Short of breath or difficulty breathing
                                            <input type="hidden" value="0" name="mon_breath">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_breath" id="mon_breath" {{ (old("mon_breath") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Sore throat
                                            <input type="hidden" value="0" name="mon_throat">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_throat" id="mon_throat" {{ (old("mon_throat") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Loss of appetite and/or
                                            <input type="hidden" value="0" name="mon_appetite">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_appetite" id="mon_appetite" {{ (old("mon_appetite") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            sense of smell
                                            <input type="hidden" value="0" name="mon_smell">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_smell" id="mon_smell" {{ (old("mon_smell") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Confusion
                                            <input type="hidden" value="0" name="mon_confusion">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_confusion" id="mon_confusion" {{ (old("mon_confusion") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Seizures
                                            <input type="hidden" value="0" name="mon_seizures">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_seizures" id="mon_seizures" {{ (old("mon_seizures") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Vomiting/nausea
                                            <input type="hidden" value="0" name="mon_vomiting">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_vomiting" id="mon_vomiting" {{ (old("mon_vomiting") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Muscle pain
                                            <input type="hidden" value="0" name="mon_muscle_pain">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_muscle_pain" id="mon_muscle_pain" {{ (old("mon_muscle_pain") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Chest pain
                                            <input type="hidden" value="0" name="mon_chest_pain">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_chest_pain" id="mon_chest_pain" {{ (old("mon_chest_pain") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr>  
                                    <tr>
                                        <th>
                                            Other (add in Notes below)
                                            <input type="hidden" value="0" name="mon_other">
                                            <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_other" id="mon_other" {{ (old("mon_other") == '1' ? 'checked' : '') }}>
                                        </th>
                                    </tr> 
                                    <tr>
                                        <th>
                                            Notes (separate with comma)
                                            <textarea class="form-control" name="mon_other_note" id="mon_other_note" rows="4">{{ old("mon_other_note") }}</textarea>
                                        </th>
                                    </tr>  
                                </table>
                            </div>
                        </form>
                                          
                        {{-- Launch the Confirmation modal --}}
                        <a href="#" data-toggle="modal" data-target="#save-monitoring">
                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                Save
                            </button>
                        </a>

                        {{-- Monitoring Confirmation Modal --}}
                        <div class="modal fade" id="save-monitoring" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Select "Proceed" below if you want to submit monitoring data.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="#"
                                        onclick="event.preventDefault();
                                        document.getElementById('insert-monitoring-data').submit();">
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
</div>
@endsection