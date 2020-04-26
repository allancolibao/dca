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
                        <h6 class="m-0 font-weight-bold text-gray-800">Case Report Form: ID- {{$id}} {{$fullname}} {{$age}} years old</h6>
                    </div>
                    <form id="insert-case-report-data" method="POST" action="{{ action('CaseReportController@insert', $id) }}" accept-charset="UTF-8">
                        @csrf
                        <div class="table-responsive">
                            <table class="table"  width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="date_accomplished">Date Admitted</label>
                                            <input type="date" class="form-control form-header-field" name="date_admitted" id="date_admitted"  value="{{ old('date_admitted') }}">
                                        </td>
                                        <td>
                                            <label for="date_accomplished">Date Accomplished</label>
                                            <input type="date" class="form-control form-header-field" name="date_accomplished" id="date_accomplished"  value="{{ old('date_accomplished') }}">
                                        </td>
                                        <td>
                                            <label for="officer_name">Accomplishing Officer</label>
                                            <input type="text" class="form-control form-header-field" name="officer_name" id="officer_name"  value="{{ old('officer_name') }}">
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
                            <h3 class="text-center text-dark">CASE REPORT FORM</h3>
                            {{-- Start of section 1 --}}
                            <div class="line-content">
                                <h5 class="text-primary">Section 1: Patient General Profile</h5>
                                <div id="section-1">
                                    <div class="table-responsive">
                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td><strong>1.9 Signs and Symptoms Upon Admission (Check all that apply)</strong></td>                                                
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_04_01">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_01_19_01" id="sec_01_19_01"  {{ (old("sec_01_19_01") == '1' ? 'checked' : '') }}>
                                                        Cough
                                                    </td>                                                
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_04_02">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_01_19_02" id="sec_01_19_02"  {{ (old("sec_01_19_02") == '1' ? 'checked' : '') }}>
                                                        Breathing difficulty
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_04_03">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_01_19_03" id="sec_01_19_03"  {{ (old("sec_01_19_03") == '1' ? 'checked' : '') }}>
                                                        Fever
                                                        <input type="text" class="form-control mt-2" name="sec_01_19_03_temp" id="sec_01_19_03_temp" placeholder="Body Temperature (°C)"  value="{{ old('sec_01_19_03_temp') }}">
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_04_04">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_01_19_04" id="sec_01_19_04"  {{ (old("sec_01_19_04") == '1' ? 'checked' : '') }}>
                                                        Tiredness
                                                    </td>  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" value="0" name="sec_02_04_05">
                                                        <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="sec_01_19_05" id="sec_01_19_05"  {{ (old("sec_01_19_05") == '1' ? 'checked' : '') }}>
                                                        Diarrhea
                                                    </td>                                                 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Other manifestations (Please specify)
                                                        <input type="text" class="form-control" name="sec_01_19_06" id="sec_01_19_06" placeholder="Please specify"  value="{{ old('sec_01_19_06') }}">
                                                    </td>  
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- End of section 1 --}}


                            {{-- Start of section 2 --}}
                            <div class="line-content">
                                <h5 class="text-primary">Section 2: Patient Monitoring Chart</h5>
                                <div id="section-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered"  width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Indicator</th>
                                                    <th class="text-center">Clinical Values</th>
                                                    <th class="text-center">Baseline</th>
                                                    <th class="text-center">Midline</th>
                                                    <th class="text-center">Endline</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="background-color:#ededed">
                                                    <td><strong>Anthropometry</strong></td>
                                                    <td><strong>Date Taken <i class="fas fa-arrow-right"></i></strong></td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_anthrop_01" id="sec_02_anthrop_01"  value="{{ old('sec_02_anthrop_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_anthrop_02" id="sec_02_anthrop_02"  value="{{ old('sec_02_anthrop_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_anthrop_03" id="sec_02_anthrop_03"  value="{{ old('sec_02_anthrop_03') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        2.1 Weight (kg)
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_02_01_01" id="sec_02_01_01" placeholder="(kg)" value="{{ old('sec_02_01_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_02_01_02" id="sec_02_01_02" placeholder="(kg)" value="{{ old('sec_02_01_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_02_01_03" id="sec_02_01_03" placeholder="(kg)" value="{{ old('sec_02_01_03') }}">
                                                    </td>                                                     
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        2.2 Height (m)
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_02_02_01" id="sec_02_02_01" placeholder="(m)" value="{{ old('sec_02_02_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_02_02_02" id="sec_02_02_02" placeholder="(m)" value="{{ old('sec_02_02_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_02_02_03" id="sec_02_02_03" placeholder="(m)" value="{{ old('sec_02_02_03') }}">
                                                    </td>                                                     
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.3 Body Mass Index (BMI) (kg/m2)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            - Underweight < 18.5<br>
                                                            - Normal 18.5–23<br>
                                                            - Overweight 23-27.5<br>
                                                            - Obese greater than 27.5
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_02_03_01" id="sec_02_03_01" placeholder="(BMI) (kg/m2)" value="{{ old('sec_02_03_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_02_03_02" id="sec_02_03_02" placeholder="(BMI) (kg/m2)" value="{{ old('sec_02_03_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="sec_02_03_03" id="sec_02_03_03" placeholder="(BMI) (kg/m2)" value="{{ old('sec_02_03_03') }}">
                                                    </td> 
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_anthrop_rem_01" id="sec_02_anthrop_rem_01" placeholder="Remarks"  value="{{ old('sec_02_anthrop_rem_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_anthrop_rem_02" id="sec_02_anthrop_rem_02" placeholder="Remarks"  value="{{ old('sec_02_anthrop_rem_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_anthrop_rem_03" id="sec_02_anthrop_rem_03" placeholder="Remarks"  value="{{ old('sec_02_anthrop_rem_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr style="background-color:#ededed">
                                                    <td><strong>Diabetes</strong></td>
                                                    <td><strong>Date Taken <i class="fas fa-arrow-right"></i></strong></td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_dia_01" id="sec_02_dia_01"  value="{{ old('sec_02_dia_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_dia_02" id="sec_02_dia_02"  value="{{ old('sec_02_dia_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_dia_03" id="sec_02_dia_03"  value="{{ old('sec_02_dia_03') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.4 Fasting blood glucose  (mg/dL)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            - Normal 70-99<br>
                                                            - Prediabetes 100-125<br>
                                                            - Diabetes ≥126
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_04_01" id="sec_02_04_01" placeholder="(mg/dL)" value="{{ old('sec_02_04_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_04_02" id="sec_02_04_02" placeholder="(mg/dL)" value="{{ old('sec_02_04_02') }}">
                                                    </td>  
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_04_03" id="sec_02_04_03" placeholder="(mg/dL)" value="{{ old('sec_02_04_03') }}">
                                                    </td>                                                  
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_dia_rem_01" id="sec_02_dia_rem_01" placeholder="Remarks"  value="{{ old('sec_02_dia_rem_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_dia_rem_02" id="sec_02_dia_rem_02" placeholder="Remarks"  value="{{ old('sec_02_dia_rem_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_dia_rem_03" id="sec_02_dia_rem_03" placeholder="Remarks"  value="{{ old('sec_02_dia_rem_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr style="background-color:#ededed">
                                                    <td><strong>Lipid profile</strong></td>
                                                    <td><strong>Date Taken <i class="fas fa-arrow-right"></i></strong></td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_lipid_01" id="sec_02_lipid_01"  value="{{ old('sec_02_lipid_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_lipid_02" id="sec_02_lipid_02"  value="{{ old('sec_02_lipid_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_lipid_03" id="sec_02_lipid_03"  value="{{ old('sec_02_lipid_03') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.5 Total cholesterol (mg/dL)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            - Desirable < 200<br>
                                                            - Borderline 200-239<br>
                                                            - High Risk ≥240
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_05_01" id="sec_02_05_01" placeholder="(mg/dL)" value="{{ old('sec_02_05_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_05_02" id="sec_02_05_02" placeholder="(mg/dL)" value="{{ old('sec_02_05_02') }}">
                                                    </td>  
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_05_03" id="sec_02_05_03" placeholder="(mg/dL)" value="{{ old('sec_02_05_03') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.6 Low-density lipoprotein cholesterol (mg/dL)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            - Desirable 60-130<br>
                                                            - Borderline 130-159<br>
                                                            - High Risk 160-189
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_06_01" id="sec_02_06_01" placeholder="(mg/dL)" value="{{ old('sec_02_06_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"class="form-control" name="sec_02_06_02" id="sec_02_06_02" placeholder="(mg/dL)" value="{{ old('sec_02_06_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"class="form-control" name="sec_02_06_03" id="sec_02_06_03" placeholder="(mg/dL)" value="{{ old('sec_02_06_03') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.7 Triglyceride (mg/dL)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            Desirable < 150<br>
                                                            Borderline 150-199<br>
                                                            High Risk 200-499
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_07_01" id="sec_02_07_01" placeholder="(mg/dL)" value="{{ old('sec_02_07_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_07_02" id="sec_02_07_02" placeholder="(mg/dL)" value="{{ old('sec_02_07_02') }}">
                                                    </td>    
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_07_03" id="sec_02_07_03" placeholder="(mg/dL)" value="{{ old('sec_02_07_03') }}">
                                                    </td>                                                
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_lipid_rem_01" id="sec_02_lipid_rem_01" placeholder="Remarks"  value="{{ old('sec_02_lipid_rem_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_lipid_rem_02" id="sec_02_lipid_rem_02" placeholder="Remarks"  value="{{ old('sec_02_lipid_rem_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_lipid_rem_03" id="sec_02_lipid_rem_03" placeholder="Remarks"  value="{{ old('sec_02_lipid_rem_03') }}">
                                                    </td> 
                                                </tr>


                                                <tr style="background-color:#ededed">
                                                    <td><strong>Liver function tests</strong></td>
                                                    <td><strong>Date Taken <i class="fas fa-arrow-right"></i></strong></td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_liver_01" id="sec_02_liver_01"  value="{{ old('sec_02_liver_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_liver_02" id="sec_02_liver_02"  value="{{ old('sec_02_liver_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_liver_03" id="sec_02_liver_03"  value="{{ old('sec_02_liver_03') }}">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        2.8 Alanine transaminase (ALT or SGPT) (/L)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            Normal 7-56
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_08_01" id="sec_02_08_01" placeholder="(/L)" value="{{ old('sec_02_08_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_08_02" id="sec_02_08_02" placeholder="(/L)" value="{{ old('sec_02_08_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_08_03" id="sec_02_08_03" placeholder="(/L)" value="{{ old('sec_02_08_03') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        2.9 Aspartate aminotransferase (AST or SGOT) (/L)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            Normal 5-40
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_09_01" id="sec_02_09_01" placeholder="(/L)" value="{{ old('sec_02_09_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_09_02" id="sec_02_09_02" placeholder="(/L)" value="{{ old('sec_02_09_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_09_03" id="sec_02_09_03" placeholder="(/L)" value="{{ old('sec_02_09_03') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_liver_rem_01" id="sec_02_liver_rem_01" placeholder="Remarks"  value="{{ old('sec_02_liver_rem_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_liver_rem_02" id="sec_02_liver_rem_02" placeholder="Remarks"  value="{{ old('sec_02_liver_rem_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_liver_rem_03" id="sec_02_liver_rem_03" placeholder="Remarks"  value="{{ old('sec_02_liver_rem_03') }}">
                                                    </td> 
                                                </tr>

                                                
                                                <tr style="background-color:#ededed">
                                                    <td><strong>Clinical tests for infection</strong></td>
                                                    <td><strong>Date Taken <i class="fas fa-arrow-right"></i></strong></td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_cli_01" id="sec_02_cli_01"  value="{{ old('sec_02_cli_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_cli_02" id="sec_02_cli_02"  value="{{ old('sec_02_cli_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_cli_03" id="sec_02_cli_03"  value="{{ old('sec_02_cli_03') }}">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        2.10 White blood cells (/µL)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            Adult 4,300–10,000
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_10_01" id="sec_02_10_01" placeholder="(/µL)" value="{{ old('sec_02_10_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_10_02" id="sec_02_10_02" placeholder="(/µL)" value="{{ old('sec_02_10_02') }}">
                                                    </td>  
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_10_03" id="sec_02_10_03" placeholder="(/µL)" value="{{ old('sec_02_10_03') }}">
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        2.11 Neutrophils (/µL)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            Adult 1,500–8,000
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_11_01" id="sec_02_11_01" placeholder="(/µL)" value="{{ old('sec_02_11_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_11_02" id="sec_02_11_02" placeholder="(/µL)" value="{{ old('sec_02_11_02') }}">
                                                    </td>  
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_11_03" id="sec_02_11_03" placeholder="(/µL)" value="{{ old('sec_02_11_03') }}">
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        2.12 Lymphocytes (/L)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            Adult 800–5,000
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_12_01" id="sec_02_12_01" placeholder="(/L)" value="{{ old('sec_02_12_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_12_02" id="sec_02_12_02" placeholder="(/L)" value="{{ old('sec_02_12_02') }}">
                                                    </td>  
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_12_03" id="sec_02_12_03" placeholder="(/L)" value="{{ old('sec_02_12_03') }}">
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td>
                                                        2.13 C-reactive protein (mg/L)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            - Normal < 10 <br>
                                                            - Sign of infection >10
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_13_01" id="sec_02_13_01" placeholder="(mg/L)" value="{{ old('sec_02_13_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_13_02" id="sec_02_13_02" placeholder="(mg/L)" value="{{ old('sec_02_13_02') }}">
                                                    </td>  
                                                    <td>
                                                        <input type="text"  class="form-control" name="sec_02_13_03" id="sec_02_13_03" placeholder="(mg/L)" value="{{ old('sec_02_13_03') }}">
                                                    </td>                                                   
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_cli_rem_01" id="sec_02_cli_rem_01" placeholder="Remarks"  value="{{ old('sec_02_cli_rem_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_cli_rem_02" id="sec_02_cli_rem_02" placeholder="Remarks"  value="{{ old('sec_02_cli_rem_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_cli_rem_03" id="sec_02_cli_rem_03" placeholder="Remarks"  value="{{ old('sec_02_cli_rem_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr style="background-color:#ededed">
                                                    <td><strong>Signs and symptoms</strong></td>
                                                    <td><strong>Date Taken <i class="fas fa-arrow-right"></i></strong></td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_sign_01" id="sec_02_sign_01"  value="{{ old('sec_02_sign_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_sign_02" id="sec_02_sign_02"  value="{{ old('sec_02_sign_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="sec_02_sign_03" id="sec_02_sign_03"  value="{{ old('sec_02_sign_03') }}">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Dry cough
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_cough_01" id="sec_02_cough_01" placeholder=""  value="{{ old('sec_02_cough_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_cough_02" id="sec_02_cough_02" placeholder=""  value="{{ old('sec_02_cough_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_cough_03" id="sec_02_cough_03" placeholder=""  value="{{ old('sec_02_cough_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Breathing difficulty
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_breath_01" id="sec_02_breath_01" placeholder=""  value="{{ old('sec_02_breath_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_breath_02" id="sec_02_breath_02" placeholder=""  value="{{ old('sec_02_breath_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_breath_03" id="sec_02_breath_03" placeholder=""  value="{{ old('sec_02_breath_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Fever
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_fever_01" id="sec_02_fever_01" placeholder=""  value="{{ old('sec_02_fever_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_fever_02" id="sec_02_fever_02" placeholder=""  value="{{ old('sec_02_fever_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_fever_03" id="sec_02_fever_03" placeholder=""  value="{{ old('sec_02_fever_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Tiredness
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_tiredness_01" id="sec_02_tiredness_01" placeholder=""  value="{{ old('sec_02_tiredness_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_tiredness_02" id="sec_02_tiredness_02" placeholder=""  value="{{ old('sec_02_tiredness_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_tiredness_03" id="sec_02_tiredness_03" placeholder=""  value="{{ old('sec_02_tiredness_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Diarrhea
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_diarrhea_01" id="sec_02_diarrhea_01" placeholder=""  value="{{ old('sec_02_diarrhea_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_diarrhea_02" id="sec_02_diarrhea_02" placeholder=""  value="{{ old('sec_02_diarrhea_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_diarrhea_03" id="sec_02_diarrhea_03" placeholder=""  value="{{ old('sec_02_diarrhea_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="5">
                                                        Other signs and symptoms
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="sec_02_oth_01" id="sec_02_oth_01" placeholder="1. _________________________"  value="{{ old('sec_02_oth_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_01_01" id="sec_02_oth_01_01" placeholder=""  value="{{ old('sec_02_oth_01_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_01_02" id="sec_02_oth_01_02" placeholder=""  value="{{ old('sec_02_oth_01_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_01_03" id="sec_02_oth_01_03" placeholder=""  value="{{ old('sec_02_oth_01_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="sec_02_oth_02" id="sec_02_oth_02" placeholder="2. _________________________"  value="{{ old('sec_02_oth_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_02_01" id="sec_02_oth_02_01" placeholder=""  value="{{ old('sec_02_oth_02_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_02_02" id="sec_02_oth_02_02" placeholder=""  value="{{ old('sec_02_oth_02_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_02_03" id="sec_02_oth_02_03" placeholder=""  value="{{ old('sec_02_oth_02_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="sec_02_oth_03" id="sec_02_oth_03" placeholder="3. _________________________"  value="{{ old('sec_02_oth_03') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_03_01" id="sec_02_oth_03_01" placeholder=""  value="{{ old('sec_02_oth_03_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_03_02" id="sec_02_oth_03_02" placeholder=""  value="{{ old('sec_02_oth_03_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_03_03" id="sec_02_oth_03_03" placeholder=""  value="{{ old('sec_02_oth_03_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="sec_02_oth_04" id="sec_02_oth_04" placeholder="4. _________________________"  value="{{ old('sec_02_oth_04') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_04_01" id="sec_02_oth_04_01" placeholder=""  value="{{ old('sec_02_oth_04_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_04_02" id="sec_02_oth_04_02" placeholder=""  value="{{ old('sec_02_oth_04_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_04_03" id="sec_02_oth_04_03" placeholder=""  value="{{ old('sec_02_oth_04_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="sec_02_oth_05" id="sec_02_oth_05" placeholder="5. _________________________"  value="{{ old('sec_02_oth_05') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_05_01" id="sec_02_oth_05_01" placeholder=""  value="{{ old('sec_02_oth_05_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_05_02" id="sec_02_oth_05_02" placeholder=""  value="{{ old('sec_02_oth_05_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sec_02_oth_05_03" id="sec_02_oth_05_03" placeholder=""  value="{{ old('sec_02_oth_05_03') }}">
                                                    </td> 
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- End of section 2 --}}
                        </div>
                        <div class="save-btn">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="#" data-toggle="modal" data-target="#save-case-report-form" >
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
                    <div class="modal fade" id="save-case-report-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        document.getElementById('insert-case-report-data').submit();">
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