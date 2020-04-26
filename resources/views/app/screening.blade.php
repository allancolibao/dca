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
                    <form id="insert-screening-data" method="POST" action="{{ action('ScreeningController@insert', $id) }}" accept-charset="UTF-8">
                        @csrf
                        <div class="table-responsive">
                            <table class="table"  width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="officer_name">Accomplishing Officer</label>
                                            <input type="text" class="form-control form-header-field" name="officer_name" id="officer_name"  value="{{ old('officer_name') }}">
                                        </td>
                                        <td>
                                            <label for="date_accomplished">Date Accomplished</label>
                                            <input type="date" class="form-control form-header-field" name="date_accomplished" id="date_accomplished"  value="{{ old('date_accomplished') }}">
                                        </td>
                                        <td>
                                            <label for="position">Position</label>
                                            <input type="text" class="form-control form-header-field" name="position" id="position"  value="{{ old('position') }}">
                                        </td>
                                        <td>
                                            <label for="phone_number">Mobile Number</label>
                                            <input type="text" class="form-control form-header-field" name="phone_number" id="phone_number"  value="{{ old('phone_number') }}">
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
                                <h5 class="text-dark">1. Is Patient the identified as <strong class="text-primary">Suspect Case</strong> for COVID-19?</h5>
                                <div class="row ml-2">
                                    <input type="hidden" value="0" name="is_identified_sus">
                                    <input type="checkbox" value="1" style="width: 1.5em;  height: 1.5em;" name="is_identified_sus" id="is_identified_sus" {{ (old("is_identified_sus") == '1' ? 'checked' : '') }}>
                                    <label class="ml-2" for="is_identified"> Check if YES</label>
                                </div>

                                <h5 class="text-dark">2. Is the Patient identified as <strong class="text-primary">Probable Case</strong> for COVID-19?</h5>
                                <div class="row ml-2">
                                    <input type="hidden" value="0" name="is_identified_prob">
                                    <input type="checkbox" value="1" style="width: 1.5em;  height: 1.5em;" name="is_identified_prob" id="is_identified_prob" {{ (old("is_identified_prob") == '1' ? 'checked' : '') }}>
                                    <label class="ml-2" for="is_identified"> Check if YES</label>
                                </div>
                                
                                <p class="pt-2 text-warning" ><strong>If YES to either of the above, please ANSWER <span style="text-decoration:underline;"> Section 2.</span> If NO, SKIP Section 2 and proceed to  <span style="text-decoration:underline;"> Section 6.</span></strong></p>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        2.1 How long has the patient been classified as suspect/probable case? 
                                                        <input type="text" class="form-control" name="sec_02_01" id="sec_02_01" placeholder="day/s" value="{{ old('sec_02_01') }}">
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.2 When was the patient been admitted to the facility? (MM/DD/YYYY)
                                                        <input type="date" class="form-control" name="sec_02_02" id="sec_02_02" value="{{ old('sec_02_02') }}">
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.3 How long has the patient been in the facility?
                                                        <input type="text" class="form-control" name="sec_02_03" id="sec_02_03" placeholder="day/s" value="{{ old('sec_02_03') }}">
                                                    </td>                                                   
                                                </tr>

                                                <tr style="background-color:#d6d6d6">
                                                    <td></td>                                               
                                                </tr>

                                                <tr>
                                                    <td><strong>Does the patient has any of these signs and symptoms upon admission? (Check all that apply)</strong></td>                                                
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_04">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_04" id="sec_02_04"  {{ (old("sec_02_04") == '1' ? 'checked' : '') }}>
                                                        2.4 Dry cough
                                                    </td>                                                
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_05">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_05" id="sec_02_05"  {{ (old("sec_02_05") == '1' ? 'checked' : '') }}>
                                                        2.5  Breathing difficulty
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_06">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_06" id="sec_02_06"  {{ (old("sec_02_06") == '1' ? 'checked' : '') }}>
                                                        2.6 Fever
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_07">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_07" id="sec_02_07"  {{ (old("sec_02_07") == '1' ? 'checked' : '') }}>
                                                        2.7 Tiredness
                                                    </td>  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_08">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_08" id="sec_02_08"  {{ (old("sec_02_08") == '1' ? 'checked' : '') }}>
                                                        2.8 Diarrhea
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.9  Other signs and symptoms (Please specify) e.g URTI, UTI etc.
                                                        <input type="text" class="form-control" name="sec_02_09" id="sec_02_09" placeholder="Please specify (separate with comma)"  value="{{ old('sec_02_09') }}">
                                                    </td>  
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_10">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_10" id="sec_02_10" {{ (old("sec_02_10") == '1' ? 'checked' : '') }}>
                                                        2.10 Did the patient recently travel to a country reporting local transmission  of COVID-19?
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.10.1 If YES, please specify the country
                                                        <input type="text" list="country" class="form-control" name="sec_02_10_01" id="sec_02_10_01" placeholder="Specify"  value="{{ old('sec_02_10_01') }}">
                                                        <datalist id="country">
                                                            @foreach ($countries as $country)
                                                            <option>{{$country->name}}</option>
                                                            @endforeach                                         
                                                        </datalist>
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_11">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_11" id="sec_02_11" {{ (old("sec_02_11") == '1' ? 'checked' : '') }}>
                                                        2.11 Does the patient smokes?
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_12">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_12" id="sec_02_12" {{ (old("sec_02_12") == '1' ? 'checked' : '') }}>
                                                        2.12 Do the patient drinks?
                                                    </td>                                                   
                                                </tr>

                                                <tr style="background-color:#d6d6d6">
                                                    <td></td>                                               
                                                </tr>

                                                <tr>
                                                    <td><strong>Is the patient diagnosed with any of the following? (Check all that apply)</strong></td>                                                
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_13">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_13" id="sec_02_13" {{ (old("sec_02_13") == '1' ? 'checked' : '') }}>
                                                        2.13 Diabetes mellitus
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_14">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_14" id="sec_02_14" {{ (old("sec_02_14") == '1' ? 'checked' : '') }}>
                                                        2.14 Fatty liver
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_15">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_15" id="sec_02_15" {{ (old("sec_02_15") == '1' ? 'checked' : '') }}>
                                                        2.15 Hyperlipidemia
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_16">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_16" id="sec_02_16" {{ (old("sec_02_16") == '1' ? 'checked' : '') }}>
                                                        2.16 Heart disease
                                                    </td>                                                   
                                                </tr>


                                                <tr style="background-color:#d6d6d6">
                                                    <td></td>                                                  
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_17">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_17" id="sec_02_17" {{ (old("sec_02_17") == '1' ? 'checked' : '') }}>
                                                        2.17 UTI
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_18">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_18" id="sec_02_18" {{ (old("sec_02_18") == '1' ? 'checked' : '') }}>
                                                        2.18 URTI
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_19">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_19" id="sec_02_19" {{ (old("sec_02_19") == '1' ? 'checked' : '') }}>
                                                        2.19 Is the patient pregnant?
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.20 Does the patient has any allergy to food or drug?<br>
                                                        <input type="hidden" value="0" name="sec_02_20">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_02_20" id="sec_02_20" {{ (old("sec_02_20") == '1' ? 'checked' : '') }}> Check if YES<br><br>
                                                        If YES, please list food or drug allergies.
                                                        <input type="text" class="form-control" name="sec_02_20_01" id="sec_02_20_01" placeholder="Please list food or drug allergies (separate with comma)"  value="{{ old('sec_02_20_01') }}">
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
                                                        <textarea type="text" class="form-control" name="sec_03_01" id="sec_03_01" rows="4">{{ old('sec_03_01') }}</textarea>
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3.2 Has the patient been hospitalized for the past 12 months?<br>
                                                        <input type="hidden" value="0" name="sec_03_02">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_03_02" id="sec_03_02" {{ (old("sec_03_02") == '1' ? 'checked' : '') }}> Check if YES
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3.2.1 Reason for hospitalization (type of ailment)
                                                        <textarea type="text" class="form-control" name="sec_03_02_01" id="sec_03_02_01" rows="4">{{ old('sec_03_02_01') }}</textarea>
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        3.3 Has the patient suffered from any infection for the past 6 months?<br>
                                                        <input type="hidden" value="0" name="sec_03_03">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_03_03" id="sec_03_03" {{ (old("sec_03_03") == '1' ? 'checked' : '') }}> Check if YES
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3.3.1 Please list any infections the patient currently has or had in the past. (Skip this if same answer as 3.1) (separate with comma)
                                                        <textarea type="text" class="form-control" name="sec_03_03_01" id="sec_03_03_01" rows="4">{{ old('sec_03_03_01') }}</textarea>
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        3.4 Is the patient taking any medication/s or food supplement/s?<br>
                                                        <input type="hidden" value="0" name="sec_03_04">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_03_04" id="sec_03_04" {{ (old("sec_03_04") == '1' ? 'checked' : '') }}> Check if YES
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        3.4.1 If YES, please list the medication/s or food supplement/s you are currently taking. (separate with comma)
                                                        <textarea type="text" class="form-control" name="sec_03_04_01" id="sec_03_04_01" rows="4">{{ old('sec_03_04_01') }}</textarea>
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
                                                        <input type="number" step="any" class="form-control" name="sec_04_01_01" id="sec_04_01_01" placeholder="(kg)" value="{{ old('sec_04_01_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_01_02" id="sec_04_01_02" placeholder="(kg)" value="{{ old('sec_04_01_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_01_03" id="sec_04_01_03" placeholder="(kg)" value="{{ old('sec_04_01_03') }}" readonly>
                                                    </td>                                                     
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4.2 Height (m)
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_02_01" id="sec_04_02_01" placeholder="(m)" value="{{ old('sec_04_02_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_02_02" id="sec_04_02_02" placeholder="(m)" value="{{ old('sec_04_02_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_04_02_03" id="sec_04_02_03" placeholder="(m)" value="{{ old('sec_04_02_03') }}" readonly>
                                                    </td>                                                     
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4.3 Body Mass Index (BMI) (kg/m2)
                                                        <button type="button" id="calculate" class="btn btn-danger">Calculate</button>
                                                    </td>
                                                    <td colspan="3">
                                                        <input type="text" class="form-control" name="sec_04_03" id="sec_04_03" placeholder="(BMI) (kg/m2)" value="{{ old('sec_04_03') }}" readonly>
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        4.3.1 BMI classification<br>
                                                        <small>
                                                            - Underweight < 18.5<br>
                                                            - Normal 18.5-23<br>
                                                            - Overweight 23-27.5<br>
                                                            - Obese greater than 27.5
                                                        </small>
                                                    </td>
                                                    <td colspan="3">
                                                        <input type="text" class="form-control" name="sec_04_03_01" id="sec_04_03_01" value="{{old("sec_04_03_01")}}" readonly>
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
                                                    <th class="text-center">Result</th>
                                                    <th class="text-center">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="background-color:#ededed">
                                                    <td colspan="3"><strong>Diabetes</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5.1 Fasting blood sugar (mg/dL)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_01_01" id="sec_05_01_01" placeholder="(mg/dL)" value="{{ old('sec_05_01_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_01_02" id="sec_05_01_02" placeholder="Remarks" value="{{ old('sec_05_01_02') }}">
                                                    </td>                                                   
                                                </tr>

                                                <tr style="background-color:#ededed">
                                                    <td colspan="3"><strong>Lipid profile</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5.2 Total cholesterol (mg/dL)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_02_01" id="sec_05_02_01" placeholder="(mg/dL)" value="{{ old('sec_05_02_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_05_02_02" id="sec_05_02_02" placeholder="Remarks" value="{{ old('sec_05_02_02') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5.3 Low-density lipoprotein (mg/dL)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_03_01" id="sec_05_03_01" placeholder="(mg/dL)" value="{{ old('sec_05_03_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"class="form-control" name="sec_05_03_02" id="sec_05_03_02" placeholder="Remarks" value="{{ old('sec_05_03_02') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5.4 Triglyceride (mg/dL)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_04_01" id="sec_05_04_01" placeholder="(mg/dL)" value="{{ old('sec_05_04_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_04_02" id="sec_05_04_02" placeholder="Remarks" value="{{ old('sec_05_04_02') }}">
                                                    </td>                                                   
                                                </tr>

                                                <tr style="background-color:#ededed">
                                                    <td colspan="3"><strong>Liver function tests</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5.5 SGPT (units/L)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_05_01" id="sec_05_05_01" placeholder="(units/L)" value="{{ old('sec_05_05_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_05_05_02" id="sec_05_05_02" placeholder="Remarks" value="{{ old('sec_05_05_02') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5.6 SGOT (units/L)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_06_01" id="sec_05_06_01" placeholder="(units/L)" value="{{ old('sec_05_06_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_06_02" id="sec_05_06_02" placeholder="Remarks" value="{{ old('sec_05_06_02') }}">
                                                    </td>                                                   
                                                </tr>

                                                <tr style="background-color:#ededed">
                                                    <td colspan="3"><strong>Clinical tests for infection</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5.7 White blood cells (/L)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_07_01" id="sec_05_07_01" placeholder="(/L)" value="{{ old('sec_05_07_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_05_07_02" id="sec_05_07_02" placeholder="Remarks" value="{{ old('sec_05_07_02') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5.8 Neutrophils (/L)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_08_01" id="sec_05_08_01" placeholder="(/L)" value="{{ old('sec_05_08_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_08_02" id="sec_05_08_02" placeholder="Remarks" value="{{ old('sec_05_08_02') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5.9 Lymphocytes (/L)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_09_01" id="sec_05_09_01" placeholder="(/L)" value="{{ old('sec_05_09_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_09_02" id="sec_05_09_02" placeholder="Remarks" value="{{ old('sec_05_09_02') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        5.10 C-reactive protein (µg/mL)
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_10_01" id="sec_05_10_01" placeholder="(µg/mL)" value="{{ old('sec_05_10_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_10_02" id="sec_05_10_02" placeholder="Remarks" value="{{ old('sec_05_10_02') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        CD4
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_cd4_01" id="sec_05_cd4_01" placeholder="Result" value="{{ old('sec_05_cd4_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_cd4_02" id="sec_05_cd4_02" placeholder="Remarks" value="{{ old('sec_05_cd4_02') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Viral load
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_vl_01" id="sec_05_vl_01" placeholder="Result" value="{{ old('sec_05_vl_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_vl_02" id="sec_05_vl_02" placeholder="Remarks" value="{{ old('sec_05_vl_02') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Lung X-ray
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_lx_01" id="sec_05_lx_01" placeholder="Result" value="{{ old('sec_05_lx_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_05_lx_02" id="sec_05_lx_02" placeholder="Remarks" value="{{ old('sec_05_lx_02') }}">
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
                                                        <input type="text" class="form-control" name="sec_06_01" id="sec_06_01" placeholder="(mmHg)" value="{{ old('sec_06_01') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        6.2 Blood pressure category
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_06_02" id="sec_06_02" placeholder="Category" value="{{ old('sec_06_02') }}">
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
                                                        <textarea type="text" class="form-control" name="sec_06_03" id="sec_06_03" rows="6">{{ old('sec_06_03') }}</textarea>
                                                    </td> 
                                                    <td>
                                                        <textarea type="text" class="form-control" name="sec_06_04" id="sec_06_04" rows="6">{{ old('sec_06_04') }}</textarea>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>I hereby certify that {{$fullname}} is fit to participate in this study.</strong><br>
                                                        <input type="hidden" value="0" name="is_fit">
                                                        <input class="mt-4 mb-4" type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="is_fit" id="is_fit" {{ (old("is_fit") == '1' ? 'checked' : '') }}>
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
                                                        <input type="text" class="form-control mt-3" name="physician_name" id="physician_name" placeholder="Name of physician" value="{{ old('physician_name') }}">
                                                        <input type="text" class="form-control mt-3" name="physician_license" id="physician_license" placeholder="License no" value="{{ old('physician_license') }}">
                                                        <input type="date" class="form-control mt-3" name="physician_date" id="physician_date" value="{{ old('physician_date') }}">
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
                                            <select type="text" class="form-control {{ $errors->has('is_eligible') ? 'has-error' : ''}}" name="is_eligible" id="is_eligible" value="{{ old('is_eligible') }}">
                                                <option selected="true" disabled="disabled">Please select (Eligible)</option>
                                                <option value='1' {{ (old("is_eligible") == '1' ? 'selected' : '') }}>1 - Yes</option>
                                                <option value='2' {{ (old("is_eligible") == '2' ? 'selected' : '') }}>2 - No</option>
                                                <option value='3' {{ (old("is_eligible") == '3' ? 'selected' : '') }}>3 - Waitlist</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" data-toggle="modal" data-target="#save-screening-form" >
                                                <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                    Save
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