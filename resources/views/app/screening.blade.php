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
                        <h6 class="m-0 font-weight-bold text-gray-800">Screening Form: ID-{{$id}} {{$fullname}} {{$age}} years old</h6>
                    </div>
                    <form id="insert-screening-data" method="POST" action="{{ $data ? action('ScreeningController@update', $id) : action('ScreeningController@insert', $id) }}" accept-charset="UTF-8">
                        @csrf
                        <div class="table-responsive">
                            <table class="table"  width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="officer_name">Accomplishing Officer</label>
                                            <input type="text" class="form-control form-header-field" name="officer_name" id="officer_name"  value="{{ $data ? $data->officer_name : old('officer_name') }}">
                                        </td>
                                        <td>
                                            <label for="date_accomplished">Date Accomplished</label>
                                            <input type="date" class="form-control form-header-field" name="date_accomplished" id="date_accomplished"  value="{{ $data ? $data->date_accomplished : old('date_accomplished') }}">
                                        </td>
                                        <td>
                                            <label for="position">Position</label>
                                            <input type="text" class="form-control form-header-field" name="position" id="position"  value="{{ $data ? $data->position : old('position') }}">
                                        </td>
                                        <td>
                                            <label for="phone_number">Mobile Number</label>
                                            <input type="text" class="form-control form-header-field" name="phone_number" id="phone_number"  value="{{ $data ? $data->phone_number : old('phone_number') }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center text-dark">SCREENING FORM</h3>
                            
                            {{-- Intro --}}
                            <div class="line-content">
                                <p class="text-center" style="text-decoration:underline;"> 
                                    TO BE ACCOMPLISHED BY THE ATTENDING NURSE OR NURSE ON DUTY
                                </p>

                                <div>
                                    <h5 class="text-dark">Is Patient the identified as <strong class="text-primary">Symptomatic Case?</strong></h5>
                                    <div class="row ml-2">
                                        <input type="radio" value="1" style="width: 1.5em;  height: 1.5em;" name="is_identified_symp" id="is_identified_symp" {{ $data ? ($data->is_identified_symp == 1 ? 'checked' : '') : (old("is_identified_symp") == '1' ? 'checked' : '') }}>
                                        <label class="ml-2 mr-2" for="is_identified_symp">YES</label>
                                        <input type="radio" value="0" style="width: 1.5em;  height: 1.5em;" name="is_identified_symp" id="is_identified_symp" {{ $data ? ($data->is_identified_symp == 0 ? 'checked' : '') : (old("is_identified_symp") == '0' ? 'checked' : '') }}>
                                        <label class="ml-2" for="is_identified_symp">NO</label>
                                    </div>

                                    <h5 class="text-dark">Is the Patient identified as <strong class="text-primary">Asymptomatic Case?</strong></h5>
                                    <div class="row ml-2">
                                        <input type="radio" value="1" style="width: 1.5em;  height: 1.5em;" name="is_identified_asymp" id="is_identified_asymp" {{ $data ? ($data->is_identified_asymp == 1 ? 'checked' : '') : (old("is_identified_asymp") == '1' ? 'checked' : '') }}>
                                        <label class="ml-2 mr-2" for="is_identified">YES</label>
                                        <input type="radio" value="0" style="width: 1.5em;  height: 1.5em;" name="is_identified_asymp" id="is_identified_asymp" {{ $data ? ($data->is_identified_asymp == 0 ? 'checked' : '') : (old("is_identified_asymp") == '0' ? 'checked' : '') }}>
                                        <label class="ml-2" for="is_identified">NO</label>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <h5 class="text-dark">If <strong class="text-success">YES</strong>, is he/she a COVID-19 Confirmed case based on RT-PCR Test Result?</h5>
                                    <div class="row ml-2">
                                        <input type="radio" value="1" style="width: 1.5em;  height: 1.5em;" name="is_confirmed" id="is_confirmed" {{ $data ? ($data->is_confirmed == 1 ? 'checked' : '') : (old("is_confirmed") == '1' ? 'checked' : '') }}>
                                        <label class="ml-2 mr-2" for="is_confirmed">YES</label>
                                        <input type="radio" value="0" style="width: 1.5em;  height: 1.5em;" name="is_confirmed" id="is_confirmed" {{ $data ? ($data->is_confirmed == 0 ? 'checked' : '') : (old("is_confirmed") == '0' ? 'checked' : '') }}>
                                        <label class="ml-2" for="is_confirmed">NO</label>
                                    </div>
                                    <br>
                                    <h5 class="text-dark">If <strong class="text-danger">NO, </strong>Skip Section 2 and proceed to Section 6</h5>
                                    <br>
                                    <h5 class="text-dark">If <strong class="text-success">YES</strong> to either of the symptomatic case or confirmed COVID-19 Asymptomatic case, please <strong class="text-warning">ANSWER Section 2</strong></h5>
                                </div>
                            </div>
                            {{-- End intro --}}

                            {{-- Start of section 2 --}}
                            <div class="line-content">
                                <p class="text-center" style="text-decoration:underline;"> 
                                    TO BE ACCOMPLISHED BY THE ATTENDING NURSE OR NURSE ON DUTY
                                </p>
                                <h5 class="text-primary">Section 2: For Cases/Patient who are identified as “Suspect” or “Probable” (as per DOH definition)</h5>
                                <div id="section-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Questions</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        2.1 How long has the patient been classified as suspect/probable case? 
                                                        <input type="text" class="form-control" name="sec_02_01" id="sec_02_01" placeholder="day/s" value="{{ $data ? $data->sec_02_01 : old('sec_02_01') }}">
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        2.2 When was the patient been admitted to the facility? (MM/DD/YYYY)
                                                        <input type="date" class="form-control" name="sec_02_02" id="sec_02_02" value="{{ $data ? $data->sec_02_02 : old('sec_02_02') }}">
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        2.3 How long has the patient been in the facility?
                                                        <input type="text" class="form-control" name="sec_02_03" id="sec_02_03" placeholder="day/s" value="{{ $data ? $data->sec_02_03 : old('sec_02_03') }}">
                                                    </td>                                                   
                                                </tr>

                                                <tr style="background-color:#d6d6d6">
                                                    <td colspan="2"></td>                                               
                                                </tr>

                                                <tr>
                                                    <td colspan="2"><strong>Does the patient has any of these signs and symptoms upon admission? (Check all that apply)</strong></td>                                                
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_04">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_04" id="sec_02_04"  {{ $data ? ($data->sec_02_04 == 1 ? 'checked' : '') : (old("sec_02_04") == '1' ? 'checked' : '') }}>
                                                        2.4 Dry cough
                                                    </td>                                                
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_05">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_05" id="sec_02_05"  {{ $data ? ($data->sec_02_05 == 1 ? 'checked' : '') : (old("sec_02_05") == '1' ? 'checked' : '') }}>
                                                        2.5  Breathing difficulty
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_06">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_06" id="sec_02_06"  {{ $data ? ($data->sec_02_06 == 1 ? 'checked' : '') : (old("sec_02_06") == '1' ? 'checked' : '') }}>
                                                        2.6 Fever
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_07">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_07" id="sec_02_07"  {{  $data ? ($data->sec_02_07 == 1 ? 'checked' : '') : (old("sec_02_07") == '1' ? 'checked' : '') }}>
                                                        2.7 Tiredness
                                                    </td>  
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_08">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_08" id="sec_02_08"  {{ $data ? ($data->sec_02_08 == 1 ? 'checked' : '') : (old("sec_02_08") == '1' ? 'checked' : '') }}>
                                                        2.8 Diarrhea
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        2.9  Other signs and symptoms (Please specify) e.g URTI, UTI etc.
                                                        <input type="text" class="form-control" name="sec_02_09" id="sec_02_09" placeholder="Please specify (separate with comma)"  value="{{ $data ? $data->sec_02_09 : old('sec_02_09') }}">
                                                    </td>  
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        2.10 How long has the patient been manifesting symptoms? Please specify the date of each symptom
                                                    </td>                                                
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_10_symp_01" id="sec_02_10_symp_01" value="{{ $data ? $data->sec_02_10_symp_01 : old("sec_02_10_symp_01") }}">
                                                        <input type="text" class="form-control" name="sec_02_10_symp_02" id="sec_02_10_symp_02" value="{{ $data ? $data->sec_02_10_symp_02 : old("sec_02_10_symp_02") }}">
                                                        <input type="text" class="form-control" name="sec_02_10_symp_03" id="sec_02_10_symp_03"  value="{{ $data ? $data->sec_02_10_symp_03 : old("sec_02_10_symp_03") }}">
                                                        <input type="text" class="form-control" name="sec_02_10_symp_04" id="sec_02_10_symp_04"  value="{{ $data ? $data->sec_02_10_symp_04 : old("sec_02_10_symp_04") }}">
                                                        <input type="text" class="form-control" name="sec_02_10_symp_05" id="sec_02_10_symp_05"  value="{{ $data ? $data->sec_02_10_symp_05 : old("sec_02_10_symp_05") }}">
                                                        <input type="text" class="form-control" name="sec_02_10_symp_06" id="sec_02_10_symp_06"  value="{{ $data ? $data->sec_02_10_symp_06 : old("sec_02_10_symp_06") }}">
                                                    </td>   
                                                    
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_10_symp_01_date" id="sec_02_10_symp_01_date" value="{{ $data ? $data->sec_02_10_symp_01_date : old("sec_02_10_symp_01_date") }}">
                                                        <input type="date" class="form-control" name="sec_02_10_symp_02_date" id="sec_02_10_symp_02_date"  value="{{ $data ? $data->sec_02_10_symp_02_date : old("sec_02_10_symp_02_date") }}">
                                                        <input type="date" class="form-control" name="sec_02_10_symp_03_date" id="sec_02_10_symp_03_date"  value="{{ $data ? $data->sec_02_10_symp_03_date : old("sec_02_10_symp_03_date") }}">
                                                        <input type="date" class="form-control" name="sec_02_10_symp_04_date" id="sec_02_10_symp_04_date"  value="{{ $data ? $data->sec_02_10_symp_04_date : old("sec_02_10_symp_04_date") }}">
                                                        <input type="date" class="form-control" name="sec_02_10_symp_05_date" id="sec_02_10_symp_05_date"  value="{{ $data ? $data->sec_02_10_symp_05_date : old("sec_02_10_symp_05_date") }}">
                                                        <input type="date" class="form-control" name="sec_02_10_symp_06_date" id="sec_02_10_symp_06_date"  value="{{ $data ? $data->sec_02_10_symp_06_date : old("sec_02_10_symp_06_date") }}">
                                                    </td>  
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_11">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_11" id="sec_02_11" {{ $data ? ($data->sec_02_11 == 1 ? 'checked' : '') : (old("sec_02_11") == '1' ? 'checked' : '') }}>
                                                        2.11 Did the patient recently travel to a country reporting local transmission  of COVID-19?
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        2.11.1 If YES, please specify the country
                                                        <input type="text" list="country" class="form-control" name="sec_02_11_01" id="sec_02_11_01" placeholder="Specify"  value="{{ $data ? $data->sec_02_11_01 : old('sec_02_11_01') }}">
                                                        <datalist id="country">
                                                            @foreach ($countries as $country)
                                                            <option>{{$country->name}}</option>
                                                            @endforeach                                         
                                                        </datalist>
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_12">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_12" id="sec_02_12" {{ $data ? ($data->sec_02_12 == 1 ? 'checked' : '') : (old("sec_02_12") == '1' ? 'checked' : '') }}>
                                                        2.12 Does the patient smokes?
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_13">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_13" id="sec_02_13" {{ $data ? ($data->sec_02_13 == 1 ? 'checked' : '') : (old("sec_02_13") == '1' ? 'checked' : '') }}>
                                                        2.13 Do the patient drinks?
                                                    </td>                                                   
                                                </tr>

                                                <tr style="background-color:#d6d6d6">
                                                    <td colspan="2"></td>                                               
                                                </tr>

                                                <tr>
                                                    <td colspan="2"><strong>Is the patient diagnosed with any of the following? (Check all that apply)</strong></td>                                                
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_14">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_14" id="sec_02_14" {{ $data ? ($data->sec_02_14 == 1 ? 'checked' : '') : (old("sec_02_14") == '1' ? 'checked' : '') }}>
                                                        2.14 Diabetes mellitus
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_15">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_15" id="sec_02_15" {{  $data ? ($data->sec_02_15 == 1 ? 'checked' : '') : (old("sec_02_15") == '1' ? 'checked' : '') }}>
                                                        2.15 Fatty liver
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_16">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_16" id="sec_02_16" {{ $data ? ($data->sec_02_16 == 1 ? 'checked' : '') : (old("sec_02_16") == '1' ? 'checked' : '') }}>
                                                        2.16 Hyperlipidemia
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_17">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_17" id="sec_02_17" {{ $data ? ($data->sec_02_17 == 1 ? 'checked' : '') : (old("sec_02_17") == '1' ? 'checked' : '') }}>
                                                        2.17 Heart disease
                                                    </td>                                                   
                                                </tr>


                                                <tr style="background-color:#d6d6d6">
                                                    <td colspan="2"></td>                                                  
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_18">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_18" id="sec_02_18" {{ $data ? ($data->sec_02_18 == 1 ? 'checked' : '') : (old("sec_02_18") == '1' ? 'checked' : '') }}>
                                                        2.18 UTI
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_19">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_19" id="sec_02_19" {{  $data ? ($data->sec_02_19 == 1 ? 'checked' : '') : (old("sec_02_19") == '1' ? 'checked' : '') }}>
                                                        2.19 URTI
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="hidden" value="0" name="sec_02_20">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_20" id="sec_02_20" {{ $data ? ($data->sec_02_20 == 1 ? 'checked' : '') : (old("sec_02_20") == '1' ? 'checked' : '') }}>
                                                        2.20 Is the patient pregnant?
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        2.21 Does the patient has any allergy to food or drug?<br>
                                                        <input type="hidden" value="0" name="sec_02_21">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_21" id="sec_02_21" {{ $data ? ($data->sec_02_21 == 1 ? 'checked' : '') : (old("sec_02_21") == '1' ? 'checked' : '') }}> Check if YES<br><br>
                                                        If YES, please list food or drug allergies.
                                                        <input type="text" class="form-control" name="sec_02_21_01" id="sec_02_21_01" placeholder="Please list food or drug allergies (separate with comma)"  value="{{ $data ? $data->sec_02_21_01 : old('sec_02_21_01') }}">
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        2.22 Food Preferences<br>
                                                        Please list food preferences (separate with comma)<br>
                                                        <textarea type="text" class="form-control" name="sec_02_22" id="sec_02_22" rows="4">{{ $data ? $data->sec_02_22 : old('sec_02_22') }}</textarea>
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        2.23 Food Restrictions<br>
                                                        Please list food restrictions (separate with comma)<br>
                                                        <textarea type="text" class="form-control" name="sec_02_23" id="sec_02_23" rows="4">{{ $data ? $data->sec_02_23 : old('sec_02_23') }}</textarea>
                                                    </td>                                                  
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- End of section 2 --}}


                            {{-- Start of section 3 --}}
                            <div class="line-content">
                                <p class="text-center" style="text-decoration:underline;"> 
                                    TO BE ACCOMPLISHED BY THE ATTENDING NURSE OR NURSE ON DUTY
                                </p>
                                <h5 class="text-primary">Section 3: Other Information on Participant’s Health</h5>
                                <div id="section-3">
                                    <div class="table-responsive">
                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Questions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        3.1 Please list any other medical conditions the patient currently has (separate with comma)
                                                        <textarea type="text" class="form-control" name="sec_03_01" id="sec_03_01" rows="4">{{ $data ? $data->sec_03_01 : old('sec_03_01') }}</textarea>
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3.2 Has the patient been hospitalized for the past 12 months?<br>
                                                        <input type="hidden" value="0" name="sec_03_02">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_03_02" id="sec_03_02" {{ $data ? ($data->sec_03_02 == 1 ? 'checked' : '') : (old("sec_03_02") == '1' ? 'checked' : '') }}> Check if YES
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3.2.1 Reason for hospitalization (type of ailment)
                                                        <textarea type="text" class="form-control" name="sec_03_02_01" id="sec_03_02_01" rows="4">{{ $data ? $data->sec_03_02_01 : old('sec_03_02_01') }}</textarea>
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        3.3 Has the patient suffered from any infection for the past 6 months?<br>
                                                        <input type="hidden" value="0" name="sec_03_03">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_03_03" id="sec_03_03" {{ $data ? ($data->sec_03_03 == 1 ? 'checked' : '') : (old("sec_03_03") == '1' ? 'checked' : '') }}> Check if YES
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3.3.1 Please list any infections the patient currently has or had in the past. (Skip this if same answer as 3.1) (separate with comma)
                                                        <textarea type="text" class="form-control" name="sec_03_03_01" id="sec_03_03_01" rows="4">{{ $data ? $data->sec_03_03_01 : old('sec_03_03_01') }}</textarea>
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        3.4 Is the patient taking any medication/s or food supplement/s?<br>
                                                        <input type="hidden" value="0" name="sec_03_04">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_03_04" id="sec_03_04" {{ $data ? ($data->sec_03_04 == 1 ? 'checked' : '') : (old("sec_03_04") == '1' ? 'checked' : '') }}> Check if YES
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3.4.1 If YES, please list the medication/s or food supplement/s you are currently taking. (separate with comma)
                                                        <textarea type="text" class="form-control" name="sec_03_04_01" id="sec_03_04_01" rows="4">{{ $data ? $data->sec_03_04_01 : old('sec_03_04_01') }}</textarea>
                                                    </td>                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- End of section 3 --}}


                            {{-- Start of section 4 --}}
                            <div class="line-content">
                                <p class="text-center" style="text-decoration:underline;text-transform:uppercase;"> 
                                    This section to be filled-up by the Admitting Nurse
                                </p>
                                <h5 class="text-primary">Section 4: Anthropometric Measurements</h5>
                                <div id="section-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Questions</th>
                                                    <th class="text-center">T1</th>
                                                    <th class="text-center">T2</th>
                                                    <th class="text-center">Average</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        4.1 Weight (kg)
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_01_01" id="sec_04_01_01" placeholder="(kg)" value="{{  $data ? $data->sec_04_01_01 : old('sec_04_01_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_01_02" id="sec_04_01_02" placeholder="(kg)" value="{{  $data ? $data->sec_04_01_02 : old('sec_04_01_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_01_03" id="sec_04_01_03" placeholder="(kg)" value="{{  $data ? $data->sec_04_01_03 : old('sec_04_01_03') }}" readonly>
                                                    </td>                                                     
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4.2 Height (m)
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_02_01" id="sec_04_02_01" placeholder="(m)" value="{{  $data ? $data->sec_04_02_01 : old('sec_04_02_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_02_02" id="sec_04_02_02" placeholder="(m)" value="{{  $data ? $data->sec_04_02_02 : old('sec_04_02_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_02_03" id="sec_04_02_03" placeholder="(m)" value="{{  $data ? $data->sec_04_02_03 : old('sec_04_02_03') }}" readonly>
                                                    </td>                                                     
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4.3 Body Mass Index (BMI) (kg/m2)
                                                    </td>
                                                    <td colspan="3">
                                                        <input type="text" class="form-control" name="sec_04_03" id="sec_04_03" placeholder="(BMI) (kg/m2)" value="{{  $data ? $data->sec_04_03 : old('sec_04_03') }}" readonly>
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4.3.1 BMI classification<br>
                                                        <small>
                                                            - Underweight < 18.5<br>
                                                            - Normal 18.5 - 24.99<br>
                                                            - Overweight 25 - 29.99<br>
                                                            - Obese ≥ 30.0
                                                        </small> 
                                                    </td>
                                                    <td colspan="3">
                                                        <input type="text" class="form-control" name="sec_04_03_01" id="sec_04_03_01" value="{{  $data ? $data->sec_04_03_01 : old("sec_04_03_01")}}" readonly>
                                                    </td> 
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- End of section 4 --}}


                            {{-- Start of section 5 --}}
                            <div class="line-content">
                                <p class="text-center" style="text-decoration:underline;text-transform:uppercase;"> 
                                    This section to be filled-up by the Admitting Nurse
                                </p>
                                <h5 class="text-primary">Section 5: Laboratory Results</h5>
                                <div id="section-5">
                                    <div class="table-responsive">
                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Indicator</th>
                                                    <th class="text-center">Clinical Values</th>
                                                    <th class="text-center">Result</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="background-color:#ededed">
                                                    <td colspan="3"><strong>HEMATOLOGY - CBC and Platelet</strong></td>
                                                </tr>


                                                {{-- White Blood Cells --}}
                                                <tr>
                                                    <td>
                                                        White Blood Cells
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 4.22<br>
                                                            - Normal 4.23-9.07<br>
                                                            - High  ≥ 9.08
                                                            @else
                                                            - Low ≤ 3.97<br>
                                                            - Normal 3.98-10.04<br>
                                                            - High  ≥ 10.5
                                                            @endif
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="wbc_si_01" id="wbc_si_01" placeholder="SI" value="{{ $data ? $data->wbc_si_01 : old('wbc_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="wbc_conv_01" id="wbc_conv_01" placeholder="CONV" value="{{ $data ? $data->wbc_conv_01 : old('wbc_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="wbc_01_rem" id="wbc_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->wbc_01_rem : old('wbc_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- Red Blood Cells --}}
                                                <tr>
                                                    <td>
                                                        Red Blood Cells
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 4.62<br>
                                                            - Normal 4.63-6.08<br>
                                                            - High  ≥ 6.09
                                                            @else
                                                            - Low ≤ 3.92<br>
                                                            - Normal 3.93-5.22<br>
                                                            - High  ≥ 5.23
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rbc_si_01" id="rbc_si_01" placeholder="SI" value="{{ $data ? $data->rbc_si_01 : old('rbc_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rbc_conv_01" id="rbc_conv_01" placeholder="CONV" value="{{ $data ? $data->rbc_conv_01 : old('rbc_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                     
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="rbc_01_rem" id="rbc_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->rbc_01_rem : old('rbc_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- Hemoglobin --}}
                                                <tr>
                                                    <td>
                                                        Hemoglobin
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 136.99 & 13.69<br>
                                                            - Normal 137.00-175.00 & 13.70-17.50<br>
                                                            - High  ≥ 175.01 & 17.51
                                                            @else
                                                            - Low ≤ 111.00 & 11.19<br>
                                                            - Normal 112.00-157.00 & 11.20-15.70<br>
                                                            - High  ≥ 157.01 & 15.71
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hemo_si_01" id="hemo_si_01" placeholder="SI" value="{{ $data ? $data->hemo_si_01 : old('hemo_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hemo_conv_01" id="hemo_conv_01" placeholder="CONV" value="{{ $data ? $data->hemo_conv_01 : old('hemo_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="hemo_01_rem" id="hemo_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hemo_01_rem : old('hemo_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- Hematocrit --}}
                                                <tr>
                                                    <td>
                                                        Hematocrit
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 0.39 & 39.99<br>
                                                            - Normal 0.40-0.51 & 40.00-51.00<br>
                                                            - High  ≥ 0.52 & 51.01
                                                            @else
                                                            - Low ≤ 0.33 & 33.99<br>
                                                            - Normal 0.34-0.45 & 34.00-45.00<br>
                                                            - High  ≥ 0.46 & 45.01
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hema_si_01" id="hema_si_01" placeholder="SI" value="{{ $data ? $data->hema_si_01 : old('hema_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hema_conv_01" id="hema_conv_01" placeholder="CONV" value="{{ $data ? $data->hema_conv_01 : old('hema_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                             
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="hema_01_rem" id="hema_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hema_01_rem : old('hema_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td>  
                                                </tr>

                                                {{-- Mean Corpuscular Volume --}}
                                                <tr>
                                                    <td>
                                                        Mean Corpuscular Volume
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 78.99<br>
                                                            - Normal 79.00 - 92.20<br>
                                                            - High  ≥ 92.21
                                                            @else
                                                            - Low ≤ 79.39<br>
                                                            - Normal 79.40 - 94-80<br>
                                                            - High  ≥ 94.81
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mcv_si_01" id="mcv_si_01" placeholder="SI" value="{{ $data ? $data->mcv_si_01 : old('mcv_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mcv_conv_01" id="mcv_conv_01" placeholder="CONV" value="{{ $data ? $data->mcv_conv_01 : old('mcv_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                           
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="mcv_01_rem" id="mcv_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mcv_01_rem : old('mcv_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- Mean Corpuscular Hb --}}
                                                <tr>
                                                    <td>
                                                        Mean Corpuscular Hb
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 25.69<br>
                                                            - Normal 25.70 - 32.20<br>
                                                            - High  ≥ 32.21
                                                            @else
                                                            - Low ≤ 25.59<br>
                                                            - Normal 25.60 - 32.20<br>
                                                            - High  ≥ 32.21
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mch_si_01" id="mch_si_01" placeholder="SI" value="{{ $data ? $data->mch_si_01 : old('mch_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mch_conv_01" id="mch_conv_01" placeholder="CONV" value="{{ $data ? $data->mch_conv_01 : old('mch_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                           
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="mch_01_rem" id="mch_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mch_01_rem : old('mch_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>


                                                {{-- Mean Corpuscular Hb Conc --}}
                                                <tr>
                                                    <td>
                                                        Mean Corpuscular Hb Conc
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 32.29<br>
                                                            - Normal 32.30 - 36.50<br>
                                                            - High  ≥ 36.51
                                                            @else
                                                            - Low ≤ 32.19<br>
                                                            - Normal 32.20 - 35.50<br>
                                                            - High  ≥ 35.51
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mchc_si_01" id="mchc_si_01" placeholder="SI" value="{{ $data ? $data->mchc_si_01 : old('mchc_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mchc_conv_01" id="mchc_conv_01" placeholder="CONV" value="{{ $data ? $data->mchc_conv_01 : old('mchc_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                                                         
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="mchc_01_rem" id="mchc_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mchc_01_rem : old('mchc_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>


                                                {{-- RBC Distribution Width --}}
                                                <tr>
                                                    <td>
                                                        RBC Distribution Width
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 11.59<br>
                                                            - Normal 11.60 - 14.60<br>
                                                            - High  ≥ 14.61
                                                            @else
                                                            - Low ≤ 11.59<br>
                                                            - Normal 11.60 - 14.60<br>
                                                            - High  ≥ 14.61
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rdw_si_01" id="rdw_si_01" placeholder="SI" value="{{ $data ? $data->rdw_si_01 : old('rdw_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rdw_conv_01" id="rdw_conv_01" placeholder="CONV" value="{{ $data ? $data->rdw_conv_01 : old('rdw_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                         
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="rdw_01_rem" id="rdw_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->rdw_01_rem : old('rdw_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>


                                                {{-- Platelet Count --}}
                                                <tr>
                                                    <td>
                                                        Platelet Count
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 149.99<br>
                                                            - Normal 150.00 - 450.00<br>
                                                            - High  ≥ 450.01
                                                            @else
                                                            - Low ≤ 149.99<br>
                                                            - Normal 150.00 - 450.00<br>
                                                            - High  ≥ 450.01
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="pc_si_01" id="pc_si_01" placeholder="SI" value="{{ $data ? $data->pc_si_01 : old('pc_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="pc_conv_01" id="pc_conv_01" placeholder="CONV" value="{{ $data ? $data->pc_conv_01 : old('pc_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                           
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="pc_01_rem" id="pc_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->pc_01_rem : old('pc_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                 {{-- Mean Platelet Volume --}}
                                                 <tr>
                                                    <td>
                                                        Mean Platelet Volume
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 6.49<br>
                                                            - Normal 6.50 - 12.00<br>
                                                            - High  ≥ 12.01
                                                            @else
                                                            - Low ≤ 6.49<br>
                                                            - Normal 6.50 - 12.00<br>
                                                            - High  ≥ 12.01
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mpv_si_01" id="mpv_si_01" placeholder="SI" value="{{ $data ? $data->mpv_si_01 : old('mpv_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mpv_conv_01" id="mpv_conv_01" placeholder="CONV" value="{{ $data ? $data->mpv_conv_01 : old('mpv_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="mpv_01_rem" id="mpv_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mpv_01_rem : old('mpv_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td>
                                                </tr>


                                                <tr style="background-color:#ededed">
                                                    <td colspan="5"><strong>Differential Count</strong></td>
                                                </tr>

                                                {{-- Neutrophils --}}
                                                <tr>
                                                    <td>
                                                        Neutrophils
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 33.99<br>
                                                            - Normal 34.00 - 68.00<br>
                                                            - High  ≥ 68.00
                                                            @else
                                                            - Low ≤ 33.99<br>
                                                            - Normal 34.00 - 71.00<br>
                                                            - High  ≥ 71.01
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="neu_si_01" id="neu_si_01" placeholder="SI" value="{{ $data ? $data->neu_si_01 : old('neu_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="neu_conv_01" id="neu_conv_01" placeholder="CONV" value="{{ $data ? $data->neu_conv_01 : old('neu_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="neu_01_rem" id="neu_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->neu_01_rem : old('neu_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- Lymphocytes --}}
                                                <tr>
                                                    <td>
                                                        Lymphocytes
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 21.99<br>
                                                            - Normal 22.00 - 53.00<br>
                                                            - High  ≥ 53.01
                                                            @else
                                                            - Low ≤ 18.99<br>
                                                            - Normal 19.00 -52.00<br>
                                                            - High  ≥ 52.01
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="lymph_si_01" id="lymph_si_01" placeholder="SI" value="{{ $data ? $data->lymph_si_01 : old('lymph_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="lymph_conv_01" id="lymph_conv_01" placeholder="CONV" value="{{ $data ? $data->lymph_conv_01 : old('lymph_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                           
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="lymph_01_rem" id="lymph_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->lymph_01_rem : old('lymph_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- Monocyte --}}
                                                <tr>
                                                    <td>
                                                        Monocyte
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 4.99<br>
                                                            - Normal 5.00 - 12.00<br>
                                                            - High  ≥ 12.01
                                                            @else
                                                            - Low ≤ 4.99<br>
                                                            - Normal 5.00 - 12.00<br>
                                                            - High  ≥ 12.01
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mono_si_01" id="mono_si_01" placeholder="SI" value="{{ $data ? $data->mono_si_01 : old('mono_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mono_conv_01" id="mono_conv_01" placeholder="CONV" value="{{ $data ? $data->mono_conv_01 : old('mono_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                             
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="mono_01_rem" id="mono_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mono_01_rem : old('mono_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                 {{-- Eosinophil --}}
                                                 <tr>
                                                    <td>
                                                        Eosinophil
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low ≤ 0.99<br>
                                                            - Normal 1.00 - 7.00<br>
                                                            - High  ≥ 7.01
                                                            @else
                                                            - Low ≤ 0.99<br>
                                                            - Normal 1.00 - 7.00<br>
                                                            - High  ≥ 7.01
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="eos_si_01" id="eos_si_01" placeholder="SI" value="{{ $data ? $data->eos_si_01 : old('eos_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="eos_conv_01" id="eos_conv_01" placeholder="CONV" value="{{ $data ? $data->eos_conv_01 : old('eos_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                           
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="eos_01_rem" id="eos_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->eos_01_rem : old('eos_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- Basophil --}}
                                                <tr>
                                                    <td>
                                                        Basophil
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low < 0.00<br>
                                                            - Normal 0.00 - 1.00<br>
                                                            - High  ≥ 1.01
                                                            @else
                                                            - Low < 0.00<br>
                                                            - Normal 0.00 - 1.00<br>
                                                            - High  ≥ 1.01
                                                            @endif
                                                        </small>  
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="baso_si_01" id="baso_si_01" placeholder="SI" value="{{  $data ? $data->baso_si_01 : old('baso_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="baso_conv_01" id="baso_conv_01" placeholder="CONV" value="{{  $data ? $data->baso_conv_01 : old('baso_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                             
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="baso_01_rem" id="baso_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->baso_01_rem : old('baso_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                <tr style="background-color:#ededed">
                                                    <td colspan="5"><strong>Chemistry</strong></td>
                                                </tr>

                                                {{-- FBS --}}
                                                <tr>
                                                    <td>
                                                        FBS (HEXOKINASE)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            ADA Recommendations 2015<br>
                                                            - Pre-diabetics: 5.55 - 6.94 mmol/L (100.1 -125.06 mg/dL)<br>
                                                            - Normal: 3.89 - 5.49 (70.10 - 98.93 mg/dL)<br>
                                                            - Diabetics: >/= 7.00 mmol/L (>/= 126.14 mg/dL)
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="fbs_si_01" id="fbs_si_01" placeholder="SI" value="{{ $data ? $data->fbs_si_01 : old('fbs_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="fbs_conv_01" id="fbs_conv_01" placeholder="CONV" value="{{ $data ? $data->fbs_conv_01 : old('fbs_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                            
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="fbs_01_rem" id="fbs_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->fbs_01_rem : old('fbs_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Pre-diabetics">Pre-diabetics</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Diabetics">Diabetics</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                <tr style="background-color:#ededed">
                                                    <td colspan="5"><strong>Lipid Profile</strong></td>
                                                </tr>

                                                {{-- Cholesterol --}}
                                                <tr>
                                                    <td>
                                                        Cholesterol (CHOD-PAP)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            NCEP Recommendations<br>
                                                            - Desirable: < 5.20 mmol/L (< 200.77 mg/dL)<br>
                                                            - Borderline High: 5.20 - 6.20 mmol/L (200.00 - 239.38 mg/dL)<br>
                                                            - High: >/= 6.20 mmol/L (>/= 239.38 mg/dL)
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="choles_si_01" id="choles_si_01" placeholder="SI" value="{{ $data ? $data->choles_si_01 : old('choles_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="choles_conv_01" id="choles_conv_01" placeholder="CONV" value="{{ $data ? $data->choles_conv_01 : old('choles_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="choles_01_rem" id="choles_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->choles_01_rem : old('choles_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Desirable">Desirable</option>
                                                            <option value="Borderline High">Borderline High</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                </tr>


                                                {{-- Triglycerides --}}
                                                <tr>
                                                    <td>
                                                        Triglycerides
                                                    </td>
                                                    <td>
                                                        <small>
                                                            NCEP Recommendations<br>
                                                            - Desirable: < 1.69 mmol/L (< 149.57 mg/dL)<br>
                                                            - Borderline High: 1.69 - 2.25 mmol/L (200.00 - 239.38 mg/dL)<br>
                                                            - High: 2.26-5.64 mmol/L (200.01-499.14 mg/dL)<br>
                                                            - Very High: >/= 5.65 mmol/L (>/= 500.02 mg/dL)
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="trig_si_01" id="trig_si_01" placeholder="SI" value="{{ $data ? $data->trig_si_01 : old('trig_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="trig_conv_01" id="trig_conv_01" placeholder="CONV" value="{{ $data ? $data->trig_conv_01 : old('trig_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="trig_01_rem" id="trig_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->trig_01_rem : old('trig_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Desirable">Desirable</option>
                                                            <option value="Borderline High">Borderline High</option>
                                                            <option value="High">High</option>
                                                            <option value="Very High">Very High</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- HDL --}}
                                                <tr>
                                                    <td>
                                                        HDL (Direct Measure - PEG)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            - Low: < 40.00 mg/dL<br>
                                                            - Borderline High: 40.00 - 59.00 mg/dL<br>
                                                            - Desirable: >/= 60.00 mg/dL
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hdl_si_01" id="hdl_si_01" placeholder="SI" value="{{ $data ? $data->hdl_si_01 : old('hdl_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hdl_conv_01" id="hdl_conv_01" placeholder="CONV" value="{{ $data ? $data->hdl_conv_01 : old('hdl_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="hdl_01_rem" id="hdl_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hdl_01_rem : old('hdl_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Borderline High">Borderline High</option>
                                                            <option value="Desirable">Desirable</option>
                                                            
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- LDL --}}
                                                <tr>
                                                    <td>
                                                        LDL
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low: ≤ 1.26 mmol/L & 49.02 mg/dL<br>
                                                            - Normal: 1.27-4.47 mmol/L & 49.03-172.59 mg/dL<br>
                                                            - High: ≥ 4.48 mmol/L & 172.60 mg/dL
                                                            @else 
                                                            - Low: ≤ 1.63 mmol/L & 63.31 mg/dL<br>
                                                            - Normal: 1.64-4.34 mmol/L & 63.32 - 167.57 mg/dL<br>
                                                            - High: ≥ 4.35 mmol/L & 30.01 mg/dL
                                                            @endif
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="ldl_si_01" id="ldl_si_01" placeholder="SI" value="{{ $data ? $data->ldl_si_01 : old('ldl_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="ldl_conv_01" id="ldl_conv_01" placeholder="CONV" value="{{ $data ? $data->ldl_conv_01 : old('ldl_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="ldl_01_rem" id="ldl_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->ldl_01_rem : old('ldl_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                            
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- VLDL --}}
                                                <tr>
                                                    <td>
                                                        VLDL
                                                    </td>
                                                    <td>
                                                        <small>
                                                            - Normal: < 0.78 mmol/L & 30.00 mg/dL<br>
                                                            - High: > 0.79 mmol/L
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="vldl_si_01" id="vldl_si_01" placeholder="SI" value="{{ $data ? $data->vldl_si_01 : old('vldl_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="vldl_conv_01" id="vldl_conv_01" placeholder="CONV" value="{{ $data ? $data->vldl_conv_01 : old('vldl_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="vldl_01_rem" id="vldl_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->vldl_01_rem : old('vldl_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                            
                                                        </select>
                                                    </td> 
                                                </tr>


                                                {{-- CHOL/HDL Ratio --}}
                                                <tr>
                                                    <td>
                                                        CHOL/HDL Ratio
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Normal: < 5.70<br>
                                                            - High: ≥ 5.71
                                                            @else 
                                                            - Normal: < 4.52<br>
                                                            - High: ≥ 4.53
                                                            @endif
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="cholhdl_si_01" id="cholhdl_si_01" placeholder="SI" value="{{ $data ? $data->cholhdl_si_01 : old('cholhdl_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="cholhdl_conv_01" id="cholhdl_conv_01" placeholder="CONV" value="{{ $data ? $data->cholhdl_conv_01 : old('cholhdl_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="cholhdl_01_rem" id="cholhdl_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->cholhdl_01_rem : old('cholhdl_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                            
                                                        </select>
                                                    </td>
                                                </tr>


                                                {{-- SGPT / ALT (Kinetic) --}}
                                                <tr>
                                                    <td>
                                                        SGPT / ALT (Kinetic)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low: ≤ 9.99 U/L<br>
                                                            - Normal: 10.00-50.00 U/L<br>
                                                            - High: ≥ 50.01 U/L
                                                            @else 
                                                            - Low: ≤ 9.99 U/L<br>
                                                            - Normal: 10.00-35.00 U/L<br>
                                                            - High: ≥ 35.01 U/L
                                                            @endif
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgpt_si_01" id="sgpt_si_01" placeholder="SI" value="{{ $data ? $data->sgpt_si_01 : old('sgpt_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgpt_conv_01" id="sgpt_conv_01" placeholder="CONV" value="{{ $data ? $data->sgpt_conv_01 : old('sgpt_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="sgpt_01_rem" id="sgpt_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->sgpt_01_rem : old('sgpt_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                            
                                                        </select>
                                                    </td> 
                                                </tr>

                                                {{-- SGOT / AST (Kinetic) --}}
                                                <tr>
                                                    <td>
                                                        SGOT / AST (Kinetic)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            @if( $sex == '1')
                                                            - Low: ≤ 9.99 U/L<br>
                                                            - Normal: 10.00-50.00 U/L<br>
                                                            - High: ≥ 50.01 U/L
                                                            @else 
                                                            - Low: ≤ 9.99 U/L<br>
                                                            - Normal: 10.00-35.00 U/L<br>
                                                            - High: ≥ 35.01 U/L
                                                            @endif
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgot_si_01" id="sgot_si_01" placeholder="SI" value="{{ $data ? $data->sgot_si_01 : old('sgot_si_01') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgot_conv_01" id="sgot_conv_01" placeholder="CONV" value="{{ $data ? $data->sgot_conv_01 : old('sgot_conv_01') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="sgot_01_rem" id="sgot_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->sgot_01_rem : old('sgot_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                            
                                                        </select>
                                                    </td>
                                                </tr>

                                                {{-- CRP --}}
                                                <tr>
                                                    <td>
                                                        C-reactive protein
                                                    </td>
                                                    <td>
                                                        <small>
                                                            ≤ = 5.00 Negative<br>
                                                            > 5.00 Positive
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="crp_01" id="crp_01" placeholder="(mg/L)" value="{{ $data ? $data->crp_01 : old('crp_01') }}">
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="crp_01_rem" id="crp_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->crp_01_rem : old('crp_01_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Negative">Negative</option>
                                                            <option value="Positive">Positive</option>
                                                        </select>
                                                    </td> 
                                                </tr>
                                              
                                                {{-- CD4 + Count --}}
                                                <tr>
                                                    <td colspan="2">
                                                        CD4 + Count
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="cd4_01" id="cd4_01" placeholder="value" value="{{ $data ? $data->cd4_01 : old('cd4_01') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="cd4_rem_01" id="cd4_rem_01" placeholder="Remarks"  value="{{ $data ? $data->cd4_rem_01 : old('cd4_rem_01') }}">
                                                    </td> 
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- End of section 5 --}}


                            {{-- Start of section 6 --}}
                            <div class="line-content">
                                <p class="text-center" style="text-decoration:underline;text-transform:uppercase;"> 
                                    (This section to be filled-up by the attending physician)
                                </p>
                                <h5 class="text-primary">Section 6: Medical Doctor Assessment</h5>
                                <div id="section-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        6.1 Blood pressure (mmHg)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control mb-3" name="sec_06_01_sys" id="sec_06_01_sys" placeholder="Systolic" value="{{ $data ? $data->sec_06_01_sys :  old('sec_06_01_sys') }}">

                                                        <input type="text" class="form-control" name="sec_06_01_dias" id="sec_06_01_dias" placeholder="Diastolic" value="{{ $data ? $data->sec_06_01_dias : old('sec_06_01_dias') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        6.2 Blood pressure category<br>
                                                        Classification of blood pressure accoding to JNC VIII, 2013
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_06_02" id="sec_06_02" placeholder="Category" value="{{ $data ? $data->sec_06_02 : old('sec_06_02') }}" readonly>
                                                    </td>                                                   
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Observations</th>
                                                    <th class="text-center">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <textarea type="text" class="form-control" name="sec_06_03" id="sec_06_03" rows="6">{{ $data ? $data->sec_06_03 : old('sec_06_03') }}</textarea>
                                                    </td> 
                                                    <td>
                                                        <textarea type="text" class="form-control" name="sec_06_04" id="sec_06_04" rows="6">{{ $data ? $data->sec_06_04 : old('sec_06_04') }}</textarea>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>I hereby certify that {{$fullname}} is fit to participate in this study.</strong><br>
                                                        <input type="hidden" value="0" name="is_fit">
                                                        <input class="mt-4 mb-4" type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="is_fit" id="is_fit" {{ $data ? ($data->is_fit == 1 ? 'checked' : '') : (old("is_fit") == '1' ? 'checked' : '') }}>
                                                        Check if YES
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>Attending Physician</strong> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <input type="text" class="form-control mt-3" name="physician_name" id="physician_name" placeholder="Name of physician" value="{{ $data ? $data->physician_name : old('physician_name') }}">
                                                        <input type="text" class="form-control mt-3" name="physician_license" id="physician_license" placeholder="License no" value="{{ $data ? $data->physician_license : old('physician_license') }}">
                                                        <input type="date" class="form-control mt-3" name="physician_date" id="physician_date" value="{{ $data ? $data->physician_date : old('physician_date') }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- End of section 6 --}}
                        </div>
                        <div class="save-btn">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <select type="text" class="form-control {{ $errors->has('is_eligible') ? 'has-error' : ''}}" name="is_eligible" id="is_eligible" data-value="{{ $data ? $data->is_eligible : old('is_eligible') }}">
                                                <option value="">Please select (Eligible)</option>
                                                <option value='Yes'>1 - Yes</option>
                                                <option value='No'>2 - No</option>
                                                <option value='Waitlist'>3 - Waitlist</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" data-toggle="modal" data-target="#save-screening-form" >
                                                <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                    {{ $data ? "Update" : "Save" }}
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </form>
                                                    
                    {{-- Confirmation Modal --}}
                    <div class="modal fade" id="save-screening-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                </div>
                                <div class="modal-body">Select "Proceed" below if you want to save the data.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="#"
                                        onclick="event.preventDefault();
                                        document.getElementById('insert-screening-data').submit();">
                                        Proceed
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pagination link --}}
                    <div class="pt-4" style="position:fixed; bottom:0; left:0; z-index:999; margin-bottom:1rem;">
                        <ul id="pagin"></ul>        
                    </div>
                </div>
            </div>
        </div>             
    </div>
</div>
@endsection

@section('script')
    <script>
        const sex = {!! json_encode($sex, JSON_HEX_TAG) !!};

        $(`#is_identified_asymp, #is_identified_symp`).on('click', function(){

            console.log('click')

            if($("#is_identified_sus").is(':checked')) {
                $("#is_identified_sus_div").show();  // checked
            } else {
                $("#is_identified_sus_div").hide();  // unchecked
                $("input[name='is_identified_sus_condition']").prop( "checked", false );
            }
        });

    </script>    
@endsection