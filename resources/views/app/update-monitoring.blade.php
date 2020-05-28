<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                <h1 class="h3 mb-2 text-grey-900">Update Monitoring Data</h1>
                <h6 class="m-0 font-weight-bold text-primary">ID {{$id}} - {{$fullname}} {{$age}}</h6>
                <div class="card-body">
                    <h4 class="text-danger mb-4">Monitoring Day: {{$day}}</h4>
                    <form id="update-monitoring-data" method="POST" action="{{ action('DailyMonitoringController@update', $monitoring->id) }}" accept-charset="UTF-8">
                        @csrf 
                        <table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">  
                            <tr>
                                <th>
                                    Monitoring Day
                                    <input type="number" class="form-control {{ $errors->has('mon_day') ? 'has-error' : ''}}" name="mon_day" id="mon_day" value="{{ $monitoring->mon_day }}" required>
                                </th>
                            </tr> 
                            <tr>
                                <th>
                                    Date (MM/DD)
                                    <input type="date" class="form-control {{ $errors->has('mon_date') ? 'has-error' : ''}}" name="mon_date" id="mon_date" value="{{ $monitoring->mon_date }}" required>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Daily temperature*(degrees Celsius)
                                    <input type="text" class="form-control" name="mon_temp" id="mon_temp" value="{{ $monitoring->mon_temp }}" placeholder="(°C)">
                                </th>
                            </tr> 
                            <tr style="background:#ececec;">
                                <th>Based on the interview with the Patient write YES (Y) or NO (N) below for each symptom experienced by the participant at any given day (CHECK IF YES)</th>
                            </tr>   
                            <tr>
                                <th>
                                    Chills
                                    <input type="hidden" value="0" name="mon_chills">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_chills" id="mon_chills" {{ ($monitoring->mon_chills == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Conjunctivitis (pink eye)
                                    <input type="hidden" value="0" name="mon_conjunct">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_conjunct" id="mon_conjunct" {{ ($monitoring->mon_conjunct == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Cough and sputum production
                                    <input type="hidden" value="0" name="mon_cough">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_cough" id="mon_cough" {{ ($monitoring->mon_cough == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Cough Only (dry)
                                    <input type="hidden" value="0" name="mon_cough_dry">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_cough_dry" id="mon_cough_dry" {{ ($monitoring->mon_cough_dry == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Diarrhea (loose stool/poop)
                                    <input type="hidden" value="0" name="mon_diarrhea">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_diarrhea" id="mon_diarrhea" {{ ($monitoring->mon_diarrhea == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Runny nose
                                    <input type="hidden" value="0" name="mon_runny">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_runny" id="mon_runny" {{ ($monitoring->mon_runny == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Short of breath or difficulty breathing
                                    <input type="hidden" value="0" name="mon_breath">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_breath" id="mon_breath" {{ ($monitoring->mon_breath == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Sore throat
                                    <input type="hidden" value="0" name="mon_throat">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_throat" id="mon_throat" {{ ($monitoring->mon_throat == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Loss of appetite and/or
                                    <input type="hidden" value="0" name="mon_appetite">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_appetite" id="mon_appetite" {{ ($monitoring->mon_appetite == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    sense of smell
                                    <input type="hidden" value="0" name="mon_smell">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_smell" id="mon_smell" {{ ($monitoring->mon_smell == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Confusion
                                    <input type="hidden" value="0" name="mon_confusion">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_confusion" id="mon_confusion" {{ ($monitoring->mon_confusion == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Seizures
                                    <input type="hidden" value="0" name="mon_seizures">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_seizures" id="mon_seizures" {{ ($monitoring->mon_seizures == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Vomiting/nausea
                                    <input type="hidden" value="0" name="mon_vomiting">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_vomiting" id="mon_vomiting" {{ ($monitoring->mon_vomiting == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Muscle pain
                                    <input type="hidden" value="0" name="mon_muscle_pain">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_muscle_pain" id="mon_muscle_pain" {{ ($monitoring->mon_muscle_pain == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Chest pain
                                    <input type="hidden" value="0" name="mon_chest_pain">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_chest_pain" id="mon_chest_pain" {{ ($monitoring->mon_chest_pain == '1' ? 'checked' : '') }}>
                                </th>
                            </tr>  
                            <tr>
                                <th>
                                    Other (add in Notes below)
                                    <input type="hidden" value="0" name="mon_other">
                                    <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;"  class="form-control" name="mon_other" id="mon_other" {{ ($monitoring->mon_other == '1' ? 'checked' : '') }}>
                                </th>
                            </tr> 
                            <tr>
                                <th>
                                    Notes (separate with comma)
                                    <textarea class="form-control" name="mon_other_note" id="mon_other_note" rows="4">{{ $monitoring->mon_other_note }}</textarea>
                                </th>
                            </tr>  
                        </table>
                        <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                            Update
                        </button>
                    </form>                   
                </div>
            </div>
        </div>             
    </div>
</div>
