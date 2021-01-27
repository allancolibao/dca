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
                    <form id="insert-case-report-data" method="POST" action="{{ $data ? action('CaseReportController@update', $id) : action('CaseReportController@insert', $id) }}" accept-charset="UTF-8">
                        @csrf
                        <div class="table-responsive">
                            <table class="table"  width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="date_accomplished">Date Admitted</label>
                                            <input type="date" class="form-control form-header-field" name="date_admitted" id="date_admitted"  value="{{ $data ? $data->date_admitted : old('date_admitted') }}" required>
                                        </td>
                                        <td>
                                            <label for="date_accomplished">Date Accomplished</label>
                                            <input type="date" class="form-control form-header-field" name="date_accomplished" id="date_accomplished"  value="{{ $data ? $data->date_accomplished : old('date_accomplished') }}">
                                        </td>
                                        <td>
                                            <label for="officer_name">Accomplishing Officer</label>
                                            <input type="text" class="form-control form-header-field" name="officer_name" id="officer_name"  value="{{  $data ? $data->officer_name : old('officer_name') }}">
                                        </td>
                                        <td>
                                            <label for="position">Position</label>
                                            <input type="text" class="form-control form-header-field" name="position" id="position"  value="{{  $data ? $data->position : old('position') }}">
                                        </td>
                                        <td>
                                            <label for="phone_number">Mobile Number</label>
                                            <input type="text" class="form-control form-header-field" name="phone_number" id="phone_number"  value="{{  $data ? $data->phone_number : old('phone_number') }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-body">
                            <h3 class="text-center text-dark">CASE REPORT FORM</h3>

                             {{-- start of section 1 --}}

                             <div class="line-content">
                                <h5 class="text-primary">Patient Monitoring Chart</h5>
                                <div id="section-1">
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


                                                <tr style="background-color:#ced4ff">
                                                    <td colspan="2" class="text-right"><strong>Date Taken <i class="fas fa-arrow-right"></i></strong></td>
                                                    <td>
                                                        <input type="date" class="form-control" name="baseline_date" id="baseline_date"  value="{{ $data ? $data->baseline_date : old('baseline_date') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="midline_date" id="midline_date"  value="{{ $data ? $data->midline_date : old('midline_date') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="endline_date" id="endline_date"  value="{{ $data ? $data->endline_date : old('endline_date') }}">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Dry cough
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="dry_cough_01" id="dry_cough_01" placeholder=""  value="{{ $data ? $data->dry_cough_01 : old('dry_cough_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="dry_cough_02" id="dry_cough_02" placeholder=""  value="{{ $data ? $data->dry_cough_02 : old('dry_cough_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="dry_cough_03" id="dry_cough_03" placeholder=""  value="{{ $data ? $data->dry_cough_03 : old('dry_cough_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Breathing difficulty
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="breath_diff_01" id="breath_diff_01" placeholder=""  value="{{ $data ? $data->breath_diff_01 : old('breath_diff_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="breath_diff_02" id="breath_diff_02" placeholder=""  value="{{ $data ? $data->breath_diff_02 : old('breath_diff_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="breath_diff_03" id="breath_diff_03" placeholder=""  value="{{ $data ? $data->breath_diff_03 : old('breath_diff_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Fever
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="fever_01" id="fever_01" placeholder=""  value="{{ $data ? $data->fever_01 : old('fever_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="fever_02" id="fever_02" placeholder=""  value="{{ $data ? $data->fever_02 : old('fever_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="fever_03" id="fever_03" placeholder=""  value="{{ $data ? $data->fever_03 : old('fever_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Tiredness
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="tiredness_01" id="tiredness_01" placeholder=""  value="{{ $data ? $data->tiredness_01 : old('tiredness_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="tiredness_02" id="tiredness_02" placeholder=""  value="{{ $data ? $data->tiredness_02 : old('tiredness_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="tiredness_03" id="tiredness_03" placeholder=""  value="{{ $data ? $data->tiredness_03 : old('tiredness_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Diarrhea
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="diarrhea_01" id="diarrhea_01" placeholder=""  value="{{ $data ? $data->diarrhea_01 : old('diarrhea_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="diarrhea_02" id="diarrhea_02" placeholder=""  value="{{ $data ? $data->diarrhea_02 : old('diarrhea_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="diarrhea_03" id="diarrhea_03" placeholder=""  value="{{ $data ? $data->diarrhea_03 : old('diarrhea_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="5">
                                                        Other signs and symptoms
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="sign_oth_01" id="sign_oth_01" placeholder="1. _________________________"  value="{{  $data ? $data->sign_oth_01 : old('sign_oth_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_01_01" id="sign_oth_01_01" placeholder=""  value="{{ $data ? $data->sign_oth_01_01 : old('sign_oth_01_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_01_02" id="sign_oth_01_02" placeholder=""  value="{{ $data ? $data->sign_oth_01_02 : old('sign_oth_01_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_01_03" id="sign_oth_01_03" placeholder=""  value="{{ $data ? $data->sign_oth_01_03 : old('sign_oth_01_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="sign_oth_02" id="sign_oth_02" placeholder="2. _________________________"  value="{{ $data ? $data->sign_oth_02 : old('sign_oth_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_02_01" id="sign_oth_02_01" placeholder=""  value="{{ $data ? $data->sign_oth_02_01 : old('sign_oth_02_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_02_02" id="sign_oth_02_02" placeholder=""  value="{{ $data ? $data->sign_oth_02_02 : old('sign_oth_02_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_02_03" id="sign_oth_02_03" placeholder=""  value="{{ $data ? $data->sign_oth_02_03 : old('sign_oth_02_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="sign_oth_03" id="sign_oth_03" placeholder="3. _________________________"  value="{{ $data ? $data->sign_oth_03 : old('sign_oth_03') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_03_01" id="sign_oth_03_01" placeholder=""  value="{{ $data ? $data->sign_oth_03_01 : old('sign_oth_03_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_03_02" id="sign_oth_03_02" placeholder=""  value="{{ $data ? $data->sign_oth_03_02 : old('sign_oth_03_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_03_03" id="sign_oth_03_03" placeholder=""  value="{{ $data ? $data->sign_oth_03_03 : old('sign_oth_03_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="sign_oth_04" id="sign_oth_04" placeholder="4. _________________________"  value="{{ $data ? $data->sign_oth_04 : old('sign_oth_04') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_04_01" id="sign_oth_04_01" placeholder=""  value="{{ $data ? $data->sign_oth_04_01 : old('sign_oth_04_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_04_02" id="sign_oth_04_02" placeholder=""  value="{{ $data ? $data->sign_oth_04_02 : old('sign_oth_04_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_04_03" id="sign_oth_04_03" placeholder=""  value="{{ $data ? $data->sign_oth_04_03 : old('sign_oth_04_03') }}">
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control" name="sign_oth_05" id="sign_oth_05" placeholder="5. _________________________"  value="{{ $data ? $data->sign_oth_05 : old('sign_oth_05') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_05_01" id="sign_oth_05_01" placeholder=""  value="{{ $data ? $data->sign_oth_05_01 : old('sign_oth_05_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_05_02" id="sign_oth_05_02" placeholder=""  value="{{ $data ? $data->sign_oth_05_02 : old('sign_oth_05_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="sign_oth_05_03" id="sign_oth_05_03" placeholder=""  value="{{ $data ? $data->sign_oth_05_03 : old('sign_oth_05_03') }}">
                                                    </td> 
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- end of section section 1 --}}

                            {{-- Start of section 2 --}}

                            <div class="line-content">
                                <h5 class="text-primary">Patient Monitoring Chart</h5>
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
                                                    <td colspan="5"><strong>Anthropometry</strong></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2">
                                                        Weight (kg)
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="weight_01" id="weight_01" placeholder="(kg)" value="{{ $data ? $data->weight_01 : old('weight_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="weight_02" id="weight_02" placeholder="(kg)" value="{{ $data ? $data->weight_02 : old('weight_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="weight_03" id="weight_03" placeholder="(kg)" value="{{ $data ? $data->weight_03 : old('weight_03') }}">
                                                    </td>                                                     
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Height (m)
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="height_01" id="height_01" placeholder="(m)" value="{{ $data ? $data->height_01 : old('height_01') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="height_02" id="height_02" placeholder="(m)" value="{{ $data ? $data->height_02 : old('height_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="height_03" id="height_03" placeholder="(m)" value="{{ $data ? $data->height_03 : old('height_03') }}">
                                                    </td>                                                     
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Body Mass Index (BMI) (kg/m2)
                                                    </td>
                                                    <td>
                                                        <small>
                                                            - Underweight < 18.5<br>
                                                            - Normal 18.5 - 24.99<br>
                                                            - Overweight 25 - 29.99<br>
                                                            - Obese ≥ 30.0
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="bmi_01" id="bmi_01" placeholder="(BMI) (kg/m2)" value="{{ $data ? $data->bmi_01 : old('bmi_01') }}" readonly>
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="bmi_02" id="bmi_02" placeholder="(BMI) (kg/m2)" value="{{ $data ? $data->bmi_02 : old('bmi_02') }}" readonly>
                                                    </td> 
                                                    <td>
                                                        <input type="number" step="any" class="form-control" name="bmi_03" id="bmi_03" placeholder="(BMI) (kg/m2)" value="{{ $data ? $data->bmi_03 : old('bmi_03') }}" readonly>
                                                    </td> 
                                                </tr>

                                                {{-- Exclude in get data from hospital --}}
                                                <tr>
                                                    <td colspan="2">
                                                       Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="bmi_rem_01" id="bmi_rem_01" placeholder="Remarks"  data-value="{{ $data ? $data->bmi_rem_01 : old('bmi_rem_01') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Underweight">Underweight</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Overweight">Overweight</option>
                                                            <option value="Obese">Obese</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="bmi_rem_02" id="bmi_rem_02" placeholder="Remarks"  data-value="{{ $data ? $data->bmi_rem_02 : old('bmi_rem_02') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Underweight">Underweight</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Overweight">Overweight</option>
                                                            <option value="Obese">Obese</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="bmi_rem_03" id="bmi_rem_03" placeholder="Remarks"   data-value="{{ $data ? $data->bmi_rem_03 : old('bmi_rem_03') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Underweight">Underweight</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Overweight">Overweight</option>
                                                            <option value="Obese">Obese</option>
                                                        </select>
                                                    </td> 
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- end of section 2 --}}

                            {{-- start of section 3 --}}
                            <div class="line-content">
                                <h5 class="text-primary">Patient Monitoring Chart</h5>
                                <div id="section-3">
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
                                                    <td colspan="5"><strong>HEMATOLOGY - CBC and Platelet</strong></td>
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
                                                                <input type="text" class="form-control" name="wbc_si_01" id="wbc_si_01" placeholder="SI" value="{{ $data ? $data->wbc_si_01 : ($fromScreening ? $fromScreening->wbc_si_01 : old('wbc_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="wbc_conv_01" id="wbc_conv_01" placeholder="CONV" value="{{ $data ? $data->wbc_conv_01 : ($fromScreening ? $fromScreening->wbc_conv_01 : old('wbc_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="wbc_si_02" id="wbc_si_02" placeholder="SI" value="{{ $data ? $data->wbc_si_02 : old('wbc_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="wbc_conv_02" id="wbc_conv_02" placeholder="CONV" value="{{ $data ? $data->wbc_conv_02 : old('wbc_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="wbc_si_03" id="wbc_si_03" placeholder="SI" value="{{ $data ? $data->wbc_si_03 : old('wbc_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="wbc_conv_03" id="wbc_conv_03" placeholder="CONV" value="{{ $data ? $data->wbc_conv_03 : old('wbc_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="wbc_01_rem" id="wbc_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->wbc_01_rem : ( $fromScreening ? $fromScreening->wbc_01_rem : old('wbc_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="wbc_02_rem" id="wbc_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->wbc_02_rem : old('wbc_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="wbc_03_rem" id="wbc_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->wbc_03_rem : old('wbc_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="rbc_si_01" id="rbc_si_01" placeholder="SI" value="{{ $data ? $data->rbc_si_01 : ($fromScreening ? $fromScreening->rbc_si_01 : old('rbc_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rbc_conv_01" id="rbc_conv_01" placeholder="CONV" value="{{ $data ? $data->rbc_conv_01 : ($fromScreening ? $fromScreening->rbc_conv_01 : old('rbc_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rbc_si_02" id="rbc_si_02" placeholder="SI" value="{{ $data ? $data->rbc_si_02 : old('rbc_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rbc_conv_02" id="rbc_conv_02" placeholder="CONV" value="{{ $data ? $data->rbc_conv_02 : old('rbc_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rbc_si_03" id="rbc_si_03" placeholder="SI" value="{{ $data ? $data->rbc_si_03 : old('rbc_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rbc_conv_03" id="rbc_conv_03" placeholder="CONV" value="{{ $data ? $data->rbc_conv_03 : old('rbc_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                     
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="rbc_01_rem" id="rbc_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->rbc_01_rem : ($fromScreening ? $fromScreening->rbc_01_rem : old('rbc_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="rbc_02_rem" id="rbc_02_rem" placeholder="Remarks"  data-value="{{  $data ? $data->rbc_02_rem : old('rbc_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="rbc_03_rem" id="rbc_03_rem" placeholder="Remarks"  data-value="{{  $data ? $data->rbc_03_rem : old('rbc_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="hemo_si_01" id="hemo_si_01" placeholder="SI" value="{{ $data ? $data->hemo_si_01 : ($fromScreening ? $fromScreening->hemo_si_01 : old('hemo_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hemo_conv_01" id="hemo_conv_01" placeholder="CONV" value="{{ $data ? $data->hemo_conv_01 : ($fromScreening ? $fromScreening->hemo_conv_01 : old('hemo_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hemo_si_02" id="hemo_si_02" placeholder="SI" value="{{ $data ? $data->hemo_si_02 : old('hemo_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hemo_conv_02" id="hemo_conv_02" placeholder="CONV" value="{{ $data ? $data->hemo_conv_02 : old('hemo_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hemo_si_03" id="hemo_si_03" placeholder="SI" value="{{ $data ? $data->hemo_si_03 : old('hemo_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hemo_conv_03" id="hemo_conv_03" placeholder="CONV" value="{{ $data ? $data->hemo_conv_03 : old('hemo_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="hemo_01_rem" id="hemo_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hemo_01_rem : ($fromScreening ? $fromScreening->hemo_01_rem : old('hemo_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="hemo_02_rem" id="hemo_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hemo_02_rem : old('hemo_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="hemo_03_rem" id="hemo_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hemo_03_rem : old('hemo_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="hema_si_01" id="hema_si_01" placeholder="SI" value="{{ $data ? $data->hema_si_01 : ($fromScreening ? $fromScreening->hema_si_01 : old('hema_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hema_conv_01" id="hema_conv_01" placeholder="CONV" value="{{ $data ? $data->hema_conv_01 : ($fromScreening ? $fromScreening->hema_conv_01 : old('hema_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hema_si_02" id="hema_si_02" placeholder="SI" value="{{ $data ? $data->hema_si_02 : old('hema_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hema_conv_02" id="hema_conv_02" placeholder="CONV" value="{{ $data ? $data->hema_conv_02 : old('hema_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hema_si_03" id="hema_si_03" placeholder="SI" value="{{ $data ? $data->hema_si_03 : old('hema_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hema_conv_03" id="hema_conv_03" placeholder="CONV" value="{{ $data ? $data->hema_conv_03 : old('hema_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="hema_01_rem" id="hema_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hema_01_rem : ($fromScreening ? $fromScreening->hema_01_rem : old('hema_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="hema_02_rem" id="hema_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hema_02_rem : old('hema_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="hema_03_rem" id="hema_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hema_03_rem : old('hema_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="mcv_si_01" id="mcv_si_01" placeholder="SI" value="{{ $data ? $data->mcv_si_01 : ($fromScreening ? $fromScreening->mcv_si_01 : old('mcv_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mcv_conv_01" id="mcv_conv_01" placeholder="CONV" value="{{ $data ? $data->mcv_conv_01 : ($fromScreening ? $fromScreening->mcv_conv_01 : old('mcv_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mcv_si_02" id="mcv_si_02" placeholder="SI" value="{{ $data ? $data->mcv_si_02 : old('mcv_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mcv_conv_02" id="mcv_conv_02" placeholder="CONV" value="{{ $data ? $data->mcv_conv_02 : old('mcv_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mcv_si_03" id="mcv_si_03" placeholder="SI" value="{{ $data ? $data->mcv_si_03 : old('mcv_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mcv_conv_03" id="mcv_conv_03" placeholder="CONV" value="{{ $data ? $data->mcv_conv_03 : old('mcv_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="mcv_01_rem" id="mcv_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mcv_01_rem : ($fromScreening ? $fromScreening->mcv_01_rem : old('mcv_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="mcv_02_rem" id="mcv_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mcv_02_rem : old('mcv_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="mcv_03_rem" id="mcv_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mcv_03_rem : old('mcv_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="mch_si_01" id="mch_si_01" placeholder="SI" value="{{ $data ? $data->mch_si_01 : ($fromScreening ? $fromScreening->mch_si_01 : old('mch_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mch_conv_01" id="mch_conv_01" placeholder="CONV" value="{{ $data ? $data->mch_conv_01 : ($fromScreening ? $fromScreening->mch_conv_01 : old('mch_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mch_si_02" id="mch_si_02" placeholder="SI" value="{{ $data ? $data->mch_si_02 : old('mch_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mch_conv_02" id="mch_conv_02" placeholder="CONV" value="{{ $data ? $data->mch_conv_02 : old('mch_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mch_si_03" id="mch_si_03" placeholder="SI" value="{{ $data ? $data->mch_si_03 : old('mch_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mch_conv_03" id="mch_conv_03" placeholder="CONV" value="{{ $data ? $data->mch_conv_03 : old('mch_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="mch_01_rem" id="mch_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mch_01_rem : ( $fromScreening ? $fromScreening->mch_01_rem : old('mch_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="mch_02_rem" id="mch_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mch_02_rem : old('mch_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="mch_03_rem" id="mch_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mch_03_rem : old('mch_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="mchc_si_01" id="mchc_si_01" placeholder="SI" value="{{ $data ? $data->mchc_si_01 : ( $fromScreening ? $fromScreening->mchc_si_01 : old('mchc_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mchc_conv_01" id="mchc_conv_01" placeholder="CONV" value="{{ $data ? $data->mchc_conv_01 : ( $fromScreening ? $fromScreening->mchc_conv_01 : old('mchc_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mchc_si_02" id="mchc_si_02" placeholder="SI" value="{{ $data ? $data->mchc_si_02 : old('mchc_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mchc_conv_02" id="mchc_conv_02" placeholder="CONV" value="{{ $data ? $data->mchc_conv_02 : old('mchc_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mchc_si_03" id="mchc_si_03" placeholder="SI" value="{{ $data ? $data->mchc_si_03 : old('mchc_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mchc_conv_03" id="mchc_conv_03" placeholder="CONV" value="{{ $data ? $data->mchc_conv_03 : old('mchc_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="mchc_01_rem" id="mchc_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mchc_01_rem : ( $fromScreening ? $fromScreening->mchc_01_rem : old('mchc_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="mchc_02_rem" id="mchc_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mchc_02_rem : old('mchc_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="mchc_03_rem" id="mchc_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mchc_03_rem : old('mchc_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="rdw_si_01" id="rdw_si_01" placeholder="SI" value="{{ $data ? $data->rdw_si_01 : ( $fromScreening ? $fromScreening->rdw_si_01 : old('rdw_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rdw_conv_01" id="rdw_conv_01" placeholder="CONV" value="{{ $data ? $data->rdw_conv_01 : ( $fromScreening ? $fromScreening->rdw_conv_01 : old('rdw_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rdw_si_02" id="rdw_si_02" placeholder="SI" value="{{ $data ? $data->rdw_si_02 : old('rdw_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rdw_conv_02" id="rdw_conv_02" placeholder="CONV" value="{{ $data ? $data->rdw_conv_02 : old('rdw_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rdw_si_03" id="rdw_si_03" placeholder="SI" value="{{ $data ? $data->rdw_si_03 : old('rdw_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="rdw_conv_03" id="rdw_conv_03" placeholder="CONV" value="{{ $data ? $data->rdw_conv_03 : old('rdw_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="rdw_01_rem" id="rdw_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->rdw_01_rem : ( $fromScreening ? $fromScreening->rdw_01_rem : old('rdw_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="rdw_02_rem" id="rdw_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->rdw_02_rem : old('rdw_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="rdw_03_rem" id="rdw_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->rdw_03_rem : old('rdw_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="pc_si_01" id="pc_si_01" placeholder="SI" value="{{ $data ? $data->pc_si_01 : ( $fromScreening ? $fromScreening->pc_si_01 : old('pc_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="pc_conv_01" id="pc_conv_01" placeholder="CONV" value="{{ $data ? $data->pc_conv_01 : ( $fromScreening ? $fromScreening->pc_conv_01 : old('pc_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="pc_si_02" id="pc_si_02" placeholder="SI" value="{{ $data ? $data->pc_si_02 : old('pc_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="pc_conv_02" id="pc_conv_02" placeholder="CONV" value="{{ $data ? $data->pc_conv_02 : old('pc_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="pc_si_03" id="pc_si_03" placeholder="SI" value="{{ $data ? $data->pc_si_03 : old('pc_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="pc_conv_03" id="pc_conv_03" placeholder="CONV" value="{{ $data ? $data->pc_conv_03 : old('pc_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="pc_01_rem" id="pc_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->pc_01_rem : ( $fromScreening ? $fromScreening->pc_01_rem : old('pc_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="pc_02_rem" id="pc_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->pc_02_rem : old('pc_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="pc_03_rem" id="pc_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->pc_03_rem : old('pc_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="mpv_si_01" id="mpv_si_01" placeholder="SI" value="{{ $data ? $data->mpv_si_01 : ( $fromScreening ? $fromScreening->mpv_si_01 : old('mpv_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mpv_conv_01" id="mpv_conv_01" placeholder="CONV" value="{{ $data ? $data->mpv_conv_01 : ( $fromScreening ? $fromScreening->mpv_conv_01 : old('mpv_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mpv_si_02" id="mpv_si_02" placeholder="SI" value="{{ $data ? $data->mpv_si_02 : old('mpv_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mpv_conv_02" id="mpv_conv_02" placeholder="CONV" value="{{ $data ? $data->mpv_conv_02 : old('mpv_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mpv_si_03" id="mpv_si_03" placeholder="SI" value="{{ $data ? $data->mpv_si_03 : old('mpv_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mpv_conv_03" id="mpv_conv_03" placeholder="CONV" value="{{ $data ? $data->mpv_conv_03 : old('mpv_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="mpv_01_rem" id="mpv_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mpv_01_rem : ( $fromScreening ? $fromScreening->mpv_01_rem : old('mpv_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="mpv_02_rem" id="mpv_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mpv_02_rem : old('mpv_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="mpv_03_rem" id="mpv_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mpv_03_rem : old('mpv_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="neu_si_01" id="neu_si_01" placeholder="SI" value="{{ $data ? $data->neu_si_01 : ( $fromScreening ? $fromScreening->neu_si_01 : old('neu_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="neu_conv_01" id="neu_conv_01" placeholder="CONV" value="{{ $data ? $data->neu_conv_01 : ( $fromScreening ? $fromScreening->neu_conv_01 : old('neu_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="neu_si_02" id="neu_si_02" placeholder="SI" value="{{ $data ? $data->neu_si_02 : old('neu_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="neu_conv_02" id="neu_conv_02" placeholder="CONV" value="{{ $data ? $data->neu_conv_02 : old('neu_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="neu_si_03" id="neu_si_03" placeholder="SI" value="{{ $data ? $data->neu_si_03 : old('neu_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="neu_conv_03" id="neu_conv_03" placeholder="CONV" value="{{ $data ? $data->neu_conv_03 : old('neu_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="neu_01_rem" id="neu_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->neu_01_rem : ( $fromScreening ? $fromScreening->neu_01_rem : old('neu_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="neu_02_rem" id="neu_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->neu_02_rem : old('neu_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="neu_03_rem" id="neu_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->neu_03_rem : old('neu_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="lymph_si_01" id="lymph_si_01" placeholder="SI" value="{{ $data ? $data->lymph_si_01 : ( $fromScreening ? $fromScreening->lymph_si_01 : old('lymph_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="lymph_conv_01" id="lymph_conv_01" placeholder="CONV" value="{{ $data ? $data->lymph_conv_01 : ( $fromScreening ? $fromScreening->lymph_conv_01 : old('lymph_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="lymph_si_02" id="lymph_si_02" placeholder="SI" value="{{ $data ? $data->lymph_si_02 : old('lymph_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="lymph_conv_02" id="lymph_conv_02" placeholder="CONV" value="{{ $data ? $data->lymph_conv_02 : old('lymph_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="lymph_si_03" id="lymph_si_03" placeholder="SI" value="{{ $data ? $data->lymph_si_03 : old('lymph_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="lymph_conv_03" id="lymph_conv_03" placeholder="CONV" value="{{ $data ? $data->lymph_conv_03 : old('lymph_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="lymph_01_rem" id="lymph_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->lymph_01_rem : ( $fromScreening ? $fromScreening->lymph_01_rem : old('lymph_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="lymph_02_rem" id="lymph_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->lymph_02_rem : old('lymph_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="lymph_03_rem" id="lymph_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->lymph_03_rem : old('lymph_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="mono_si_01" id="mono_si_01" placeholder="SI" value="{{ $data ? $data->mono_si_01 : ( $fromScreening ? $fromScreening->mono_si_01 : old('mono_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mono_conv_01" id="mono_conv_01" placeholder="CONV" value="{{ $data ? $data->mono_conv_01 : ( $fromScreening ? $fromScreening->mono_conv_01 : old('mono_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mono_si_02" id="mono_si_02" placeholder="SI" value="{{ $data ? $data->mono_si_02 : old('mono_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mono_conv_02" id="mono_conv_02" placeholder="CONV" value="{{ $data ? $data->mono_conv_02 : old('mono_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mono_si_03" id="mono_si_03" placeholder="SI" value="{{ $data ? $data->mono_si_03 : old('mono_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="mono_conv_03" id="mono_conv_03" placeholder="CONV" value="{{ $data ? $data->mono_conv_03 : old('mono_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="mono_01_rem" id="mono_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mono_01_rem : ( $fromScreening ? $fromScreening->mono_01_rem : old('mono_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="mono_02_rem" id="mono_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mono_02_rem : old('mono_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="mono_03_rem" id="mono_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->mono_03_rem : old('mono_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="eos_si_01" id="eos_si_01" placeholder="SI" value="{{ $data ? $data->eos_si_01 : ( $fromScreening ? $fromScreening->eos_si_01 : old('eos_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="eos_conv_01" id="eos_conv_01" placeholder="CONV" value="{{ $data ? $data->eos_conv_01 : ( $fromScreening ? $fromScreening->eos_conv_01 : old('eos_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="eos_si_02" id="eos_si_02" placeholder="SI" value="{{ $data ? $data->eos_si_02 : old('eos_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="eos_conv_02" id="eos_conv_02" placeholder="CONV" value="{{ $data ? $data->eos_conv_02 : old('eos_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="eos_si_03" id="eos_si_03" placeholder="SI" value="{{ $data ? $data->eos_si_03 : old('eos_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="eos_conv_03" id="eos_conv_03" placeholder="CONV" value="{{ $data ? $data->eos_conv_03 : old('eos_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="eos_01_rem" id="eos_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->eos_01_rem : ( $fromScreening ? $fromScreening->eos_01_rem : old('eos_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="eos_02_rem" id="eos_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->eos_02_rem : old('eos_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="eos_03_rem" id="eos_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->eos_03_rem : old('eos_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="baso_si_01" id="baso_si_01" placeholder="SI" value="{{  $data ? $data->baso_si_01 : ( $fromScreening ? $fromScreening->baso_si_01 : old('baso_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="baso_conv_01" id="baso_conv_01" placeholder="CONV" value="{{  $data ? $data->baso_conv_01 : ( $fromScreening ? $fromScreening->baso_conv_01 : old('baso_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="baso_si_02" id="baso_si_02" placeholder="SI" value="{{  $data ? $data->baso_si_02 : old('baso_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="baso_conv_02" id="baso_conv_02" placeholder="CONV" value="{{  $data ? $data->baso_conv_02 : old('baso_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="baso_si_03" id="baso_si_03" placeholder="SI" value="{{  $data ? $data->baso_si_03 : old('baso_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="baso_conv_03" id="baso_conv_03" placeholder="CONV" value="{{  $data ? $data->baso_conv_03 : old('baso_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                              
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="baso_01_rem" id="baso_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->baso_01_rem : ( $fromScreening ? $fromScreening->baso_01_rem : old('baso_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="baso_02_rem" id="baso_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->baso_02_rem : old('baso_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="baso_03_rem" id="baso_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->baso_03_rem : old('baso_03_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                         </select>
                                                    </td> 
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- end of section section 3 --}}

                            {{-- start of section 4 --}}

                            <div class="line-content">
                                <h5 class="text-primary">Patient Monitoring Chart</h5>
                                <div id="section-4">
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
                                                                <input type="text" class="form-control" name="fbs_si_01" id="fbs_si_01" placeholder="SI" value="{{ $data ? $data->fbs_si_01 : ($fromScreening ? $fromScreening->fbs_si_01 : old('fbs_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="fbs_conv_01" id="fbs_conv_01" placeholder="CONV" value="{{ $data ? $data->fbs_conv_01 : ($fromScreening ? $fromScreening->fbs_conv_01 : old('fbs_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="fbs_si_02" id="fbs_si_02" placeholder="SI" value="{{ $data ? $data->fbs_si_02 : old('fbs_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="fbs_conv_02" id="fbs_conv_02" placeholder="CONV" value="{{ $data ? $data->fbs_conv_02 : old('fbs_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="fbs_si_03" id="fbs_si_03" placeholder="SI" value="{{ $data ? $data->fbs_si_03 : old('fbs_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="fbs_conv_03" id="fbs_conv_03" placeholder="CONV" value="{{ $data ? $data->fbs_conv_03 : old('fbs_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="fbs_01_rem" id="fbs_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->fbs_01_rem : ($fromScreening ? $fromScreening->fbs_01_rem : old('fbs_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Pre-diabetics">Pre-diabetics</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Diabetics">Diabetics</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="fbs_02_rem" id="fbs_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->fbs_02_rem : old('fbs_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Pre-diabetics">Pre-diabetics</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Diabetics">Diabetics</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="fbs_03_rem" id="fbs_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->fbs_03_rem : old('fbs_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="choles_si_01" id="choles_si_01" placeholder="SI" value="{{ $data ? $data->choles_si_01 : ($fromScreening ? $fromScreening->choles_si_01 : old('choles_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="choles_conv_01" id="choles_conv_01" placeholder="CONV" value="{{ $data ? $data->choles_conv_01 : ($fromScreening ? $fromScreening->choles_conv_01 : old('choles_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="choles_si_02" id="choles_si_02" placeholder="SI" value="{{ $data ? $data->choles_si_02 : old('choles_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="choles_conv_02" id="choles_conv_02" placeholder="CONV" value="{{ $data ? $data->choles_conv_02 : old('choles_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="choles_si_03" id="choles_si_03" placeholder="SI" value="{{ $data ? $data->choles_si_03 : old('choles_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="choles_conv_03" id="choles_conv_03" placeholder="CONV" value="{{ $data ? $data->choles_conv_03 : old('choles_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="choles_01_rem" id="choles_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->choles_01_rem : ($fromScreening ? $fromScreening->choles_01_rem :  old('choles_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Desirable">Desirable</option>
                                                            <option value="Borderline High">Borderline High</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="choles_02_rem" id="choles_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->choles_02_rem : old('choles_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Desirable">Desirable</option>
                                                            <option value="Borderline High">Borderline High</option>
                                                            <option value="High">High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="choles_03_rem" id="choles_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->choles_03_rem : old('choles_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="trig_si_01" id="trig_si_01" placeholder="SI" value="{{ $data ? $data->trig_si_01 : ($fromScreening ? $fromScreening->trig_si_01 : old('trig_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="trig_conv_01" id="trig_conv_01" placeholder="CONV" value="{{ $data ? $data->trig_conv_01 : ($fromScreening ? $fromScreening->trig_conv_01 : old('trig_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="trig_si_02" id="trig_si_02" placeholder="SI" value="{{ $data ? $data->trig_si_02 : old('trig_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="trig_conv_02" id="trig_conv_02" placeholder="CONV" value="{{ $data ? $data->trig_conv_02 : old('trig_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="trig_si_03" id="trig_si_03" placeholder="SI" value="{{ $data ? $data->trig_si_03 : old('trig_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="trig_conv_03" id="trig_conv_03" placeholder="CONV" value="{{ $data ? $data->trig_conv_03 : old('trig_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="trig_01_rem" id="trig_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->trig_01_rem : ($fromScreening ? $fromScreening->trig_01_rem : old('trig_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Desirable">Desirable</option>
                                                            <option value="Borderline High">Borderline High</option>
                                                            <option value="High">High</option>
                                                            <option value="Very High">Very High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="trig_02_rem" id="trig_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->trig_02_rem : old('trig_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Desirable">Desirable</option>
                                                            <option value="Borderline High">Borderline High</option>
                                                            <option value="High">High</option>
                                                            <option value="Very High">Very High</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="trig_03_rem" id="trig_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->trig_03_rem : old('trig_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="hdl_si_01" id="hdl_si_01" placeholder="SI" value="{{ $data ? $data->hdl_si_01 : ($fromScreening ? $fromScreening->hdl_si_01 : old('hdl_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hdl_conv_01" id="hdl_conv_01" placeholder="CONV" value="{{ $data ? $data->hdl_conv_01 : ($fromScreening ? $fromScreening->hdl_conv_01 : old('hdl_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hdl_si_02" id="hdl_si_02" placeholder="SI" value="{{ $data ? $data->hdl_si_02 : old('hdl_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hdl_conv_02" id="hdl_conv_02" placeholder="CONV" value="{{ $data ? $data->hdl_conv_02 : old('hdl_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hdl_si_03" id="hdl_si_03" placeholder="SI" value="{{ $data ? $data->hdl_si_03 : old('hdl_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="hdl_conv_03" id="hdl_conv_03" placeholder="CONV" value="{{ $data ? $data->hdl_conv_03 : old('hdl_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="hdl_01_rem" id="hdl_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hdl_01_rem : ($fromScreening ? $fromScreening->hdl_01_rem : old('hdl_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Borderline High">Borderline High</option>
                                                            <option value="Desirable">Desirable</option>
                                                            
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="hdl_02_rem" id="hdl_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hdl_02_rem : old('hdl_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Borderline High">Borderline High</option>
                                                            <option value="Desirable">Desirable</option>
                                                           
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="hdl_03_rem" id="hdl_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->hdl_03_rem : old('hdl_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="ldl_si_01" id="ldl_si_01" placeholder="SI" value="{{ $data ? $data->ldl_si_01 : ($fromScreening ? $fromScreening->ldl_si_01 : old('ldl_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="ldl_conv_01" id="ldl_conv_01" placeholder="CONV" value="{{ $data ? $data->ldl_conv_01 : ($fromScreening ? $fromScreening->ldl_conv_01 :  old('ldl_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="ldl_si_02" id="ldl_si_02" placeholder="SI" value="{{ $data ? $data->ldl_si_02 : old('ldl_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="ldl_conv_02" id="ldl_conv_02" placeholder="CONV" value="{{ $data ? $data->ldl_conv_02 : old('ldl_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="ldl_si_03" id="ldl_si_03" placeholder="SI" value="{{ $data ? $data->ldl_si_03 : old('ldl_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="ldl_conv_03" id="ldl_conv_03" placeholder="CONV" value="{{ $data ? $data->ldl_conv_03 : old('ldl_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="ldl_01_rem" id="ldl_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->ldl_01_rem : ($fromScreening ? $fromScreening->ldl_01_rem :  old('ldl_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                            
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="ldl_02_rem" id="ldl_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->ldl_02_rem : old('ldl_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                           
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="ldl_03_rem" id="ldl_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->ldl_03_rem : old('ldl_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="vldl_si_01" id="vldl_si_01" placeholder="SI" value="{{ $data ? $data->vldl_si_01 : ($fromScreening ? $fromScreening->vldl_si_01 : old('vldl_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="vldl_conv_01" id="vldl_conv_01" placeholder="CONV" value="{{ $data ? $data->vldl_conv_01 : ($fromScreening ? $fromScreening->vldl_conv_01 :old('vldl_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="vldl_si_02" id="vldl_si_02" placeholder="SI" value="{{ $data ? $data->vldl_si_02 : old('vldl_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="vldl_conv_02" id="vldl_conv_02" placeholder="CONV" value="{{ $data ? $data->vldl_conv_02 : old('vldl_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="vldl_si_03" id="vldl_si_03" placeholder="SI" value="{{ $data ? $data->vldl_si_03 : old('vldl_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="vldl_conv_03" id="vldl_conv_03" placeholder="CONV" value="{{ $data ? $data->vldl_conv_03 : old('vldl_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="vldl_01_rem" id="vldl_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->vldl_01_rem : ($fromScreening ? $fromScreening->vldl_01_rem : old('vldl_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                            
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="vldl_02_rem" id="vldl_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->vldl_02_rem : old('vldl_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                           
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="vldl_03_rem" id="vldl_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->vldl_03_rem : old('vldl_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="cholhdl_si_01" id="cholhdl_si_01" placeholder="SI" value="{{ $data ? $data->cholhdl_si_01 : ($fromScreening ? $fromScreening->cholhdl_si_01 : old('cholhdl_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="cholhdl_conv_01" id="cholhdl_conv_01" placeholder="CONV" value="{{ $data ? $data->cholhdl_conv_01 : ($fromScreening ? $fromScreening->cholhdl_conv_01 : old('cholhdl_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="cholhdl_si_02" id="cholhdl_si_02" placeholder="SI" value="{{ $data ? $data->cholhdl_si_02 : old('cholhdl_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="cholhdl_conv_02" id="cholhdl_conv_02" placeholder="CONV" value="{{ $data ? $data->cholhdl_conv_02 : old('cholhdl_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="cholhdl_si_03" id="cholhdl_si_03" placeholder="SI" value="{{ $data ? $data->cholhdl_si_03 : old('cholhdl_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="cholhdl_conv_03" id="cholhdl_conv_03" placeholder="CONV" value="{{ $data ? $data->cholhdl_conv_03 : old('cholhdl_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="cholhdl_01_rem" id="cholhdl_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->cholhdl_01_rem : ($fromScreening ? $fromScreening->cholhdl_01_rem : old('cholhdl_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                            
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="cholhdl_02_rem" id="cholhdl_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->cholhdl_02_rem : old('cholhdl_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                           
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="cholhdl_03_rem" id="cholhdl_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->cholhdl_03_rem : old('cholhdl_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="sgpt_si_01" id="sgpt_si_01" placeholder="SI" value="{{ $data ? $data->sgpt_si_01 : ($fromScreening ? $fromScreening->sgpt_si_01 : old('sgpt_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgpt_conv_01" id="sgpt_conv_01" placeholder="CONV" value="{{ $data ? $data->sgpt_conv_01 : ($fromScreening ? $fromScreening->sgpt_conv_01 : old('sgpt_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgpt_si_02" id="sgpt_si_02" placeholder="SI" value="{{ $data ? $data->sgpt_si_02 : old('sgpt_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgpt_conv_02" id="sgpt_conv_02" placeholder="CONV" value="{{ $data ? $data->sgpt_conv_02 : old('sgpt_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgpt_si_03" id="sgpt_si_03" placeholder="SI" value="{{ $data ? $data->sgpt_si_03 : old('sgpt_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgpt_conv_03" id="sgpt_conv_03" placeholder="CONV" value="{{ $data ? $data->sgpt_conv_03 : old('sgpt_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="sgpt_01_rem" id="sgpt_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->sgpt_01_rem : ($fromScreening ? $fromScreening->sgpt_01_rem : old('sgpt_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                            
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="sgpt_02_rem" id="sgpt_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->sgpt_02_rem : old('sgpt_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                           
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="sgpt_03_rem" id="sgpt_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->sgpt_03_rem : old('sgpt_03_rem') }}">
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
                                                                <input type="text" class="form-control" name="sgot_si_01" id="sgot_si_01" placeholder="SI" value="{{ $data ? $data->sgot_si_01 : ($fromScreening ? $fromScreening->sgot_si_01 : old('sgot_si_01')) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgot_conv_01" id="sgot_conv_01" placeholder="CONV" value="{{ $data ? $data->sgot_conv_01 : ($fromScreening ? $fromScreening->sgot_conv_01 : old('sgot_conv_01')) }}">
                                                            </div>
                                                        </div>
                                                    </td> 
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgot_si_02" id="sgot_si_02" placeholder="SI" value="{{ $data ? $data->sgot_si_02 : old('sgot_si_02') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgot_conv_02" id="sgot_conv_02" placeholder="CONV" value="{{ $data ? $data->sgot_conv_02 : old('sgot_conv_02') }}">
                                                            </div>
                                                        </div>
                                                    </td>  
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgot_si_03" id="sgot_si_03" placeholder="SI" value="{{ $data ? $data->sgot_si_03 : old('sgot_si_03') }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="sgot_conv_03" id="sgot_conv_03" placeholder="CONV" value="{{ $data ? $data->sgot_conv_03 : old('sgot_conv_03') }}">
                                                            </div>
                                                        </div>
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="sgot_01_rem" id="sgot_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->sgot_01_rem : ($fromScreening ? $fromScreening->sgot_01_rem : old('sgot_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                            
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="sgot_02_rem" id="sgot_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->sgot_02_rem : old('sgot_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Low">Low</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="High">High</option>
                                                           
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="sgot_03_rem" id="sgot_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->sgot_03_rem : old('sgot_03_rem') }}">
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
                                                        <input type="text" class="form-control" name="crp_01" id="crp_01" placeholder="(mg/L)" value="{{ $data ? $data->crp_01 : ($fromScreening ? $fromScreening->crp_01 : old('crp_01')) }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="crp_02" id="crp_02" placeholder="(mg/L)" value="{{ $data ? $data->crp_02 : old('crp_02') }}">
                                                    </td>  
                                                    <td>
                                                        <input type="text"  class="form-control" name="crp_03" id="crp_03" placeholder="(mg/L)" value="{{ $data ? $data->crp_03 : old('crp_03') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="crp_01_rem" id="crp_01_rem" placeholder="Remarks"  data-value="{{ $data ? $data->crp_01_rem : ($fromScreening ? $fromScreening->crp_01_rem : old('crp_01_rem')) }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Negative">Negative</option>
                                                            <option value="Positive">Positive</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="crp_02_rem" id="crp_02_rem" placeholder="Remarks"  data-value="{{ $data ? $data->crp_02_rem : old('crp_02_rem') }}">
                                                            <option value="">Select remarks</option>
                                                            <option value="Negative">Negative</option>
                                                            <option value="Positive">Positive</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text" class="form-control" name="crp_03_rem" id="crp_03_rem" placeholder="Remarks"  data-value="{{ $data ? $data->crp_03_rem : old('crp_03_rem') }}">
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
                                                        <input type="text" class="form-control" name="cd4_01" id="cd4_01" placeholder="value" value="{{ $data ? $data->cd4_01 : ($fromScreening ? $fromScreening->cd4_01 : old('cd4_01')) }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text"  class="form-control" name="cd4_02" id="cd4_02" placeholder="value" value="{{ $data ? $data->cd4_02 : old('cd4_02') }}">
                                                    </td>  
                                                    <td>
                                                        <input type="text"  class="form-control" name="cd4_03" id="cd4_03" placeholder="value" value="{{ $data ? $data->cd4_03 : old('cd4_03') }}">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        Remarks
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="cd4_rem_01" id="cd4_rem_01" placeholder="Remarks"  value="{{ $data ? $data->cd4_rem_01 : ($fromScreening ? $fromScreening->cd4_rem_01 : old('cd4_rem_01')) }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="cd4_rem_02" id="cd4_rem_02" placeholder="Remarks"  value="{{ $data ? $data->cd4_rem_02 : old('cd4_rem_02') }}">
                                                    </td> 
                                                    <td>
                                                        <input type="text" class="form-control" name="cd4_rem_03" id="cd4_rem_03" placeholder="Remarks"  value="{{ $data ? $data->cd4_rem_03 : old('cd4_rem_03') }}">
                                                    </td> 
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- end of section section 4 --}}


                            {{-- start of section 5 --}}

                            <div class="line-content">
                                <h5 class="text-primary">Patient Monitoring Chart</h5>
                                <div id="section-5">
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
                                                    <td><strong>RT-PCR</strong></td>
                                                    <td><strong>Date of Exam <i class="fas fa-arrow-right"></i></strong></td>
                                                    <td>
                                                        <input type="date" class="form-control" name="add_rt_01" id="add_rt_01"  value="{{  $data ? $data->add_rt_01 : old('add_rt_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="add_rt_02" id="add_rt_02"  value="{{  $data ? $data->add_rt_02 : old('add_rt_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="add_rt_03" id="add_rt_03"  value="{{  $data ? $data->add_rt_03 : old('add_rt_03') }}">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        RT-PCR Result
                                                    </td>
                                                    <td>
                                                        <small>
                                                            Positive or Negative
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="add_rt_res_01" id="add_rt_res_01" placeholder="" data-value="{{ $data ? $data->add_rt_res_01 : old('add_rt_res_01') }}">
                                                            <option value="">Select Result</option>
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text"  class="form-control" name="add_rt_res_02" id="add_rt_res_02" placeholder="" data-value="{{ $data ? $data->add_rt_res_02 : old('add_rt_res_02') }}">
                                                            <option value="">Select Result</option>
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                        </select>
                                                    </td>  
                                                    <td>
                                                        <select type="text"  class="form-control" name="add_rt_res_03" id="add_rt_res_03" placeholder="" data-value="{{ $data ? $data->add_rt_res_03 : old('add_rt_res_03') }}">
                                                            <option value="">Select Result</option>
                                                            <option value="Positive">Positive</option>
                                                            <option value="Negative">Negative</option>
                                                        </select>
                                                    </td>                                                   
                                                </tr>


                                                <tr style="background-color:#ededed">
                                                    <td><strong>IgG</strong></td>
                                                    <td><strong>Date of Exam <i class="fas fa-arrow-right"></i></strong></td>
                                                    <td>
                                                        <input type="date" class="form-control" name="add_igg_01" id="add_igg_01"  value="{{ $data ? $data->add_igg_01 : old('add_igg_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="add_igg_02" id="add_igg_02"  value="{{ $data ? $data->add_igg_02 : old('add_igg_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="add_igg_03" id="add_igg_03"  value="{{ $data ? $data->add_igg_03 : old('add_igg_03') }}">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        IgG Value
                                                    </td>
                                                    <td>
                                                        <small>
                                                            Reactive or Non-Reactive
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="add_igg_res_01" id="add_igg_res_01" placeholder="" data-value="{{ $data ? $data->add_igg_res_01 : old('add_igg_res_01') }}">
                                                            <option value="">Select Result</option>
                                                            <option value="Reactive">Reactive</option>
                                                            <option value="Non-Reactive">Non-Reactive</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text"  class="form-control" name="add_igg_res_02" id="add_igg_res_02" placeholder="" data-value="{{ $data ? $data->add_igg_res_02 : old('add_igg_res_02') }}">
                                                            <option value="">Select Result</option>
                                                            <option value="Reactive">Reactive</option>
                                                            <option value="Non-Reactive">Non-Reactive</option>
                                                        </select>
                                                    </td>  
                                                    <td>
                                                        <select type="text"  class="form-control" name="add_igg_res_03" id="add_igg_res_03" placeholder="" data-value="{{ $data ? $data->add_igg_res_03 : old('add_igg_res_03') }}">
                                                            <option value="">Select Result</option>
                                                            <option value="Reactive">Reactive</option>
                                                            <option value="Non-Reactive">Non-Reactive</option>
                                                        </select>
                                                    </td>                                                   
                                                </tr>

                                                <tr style="background-color:#ededed">
                                                    <td><strong>IgM</strong></td>
                                                    <td><strong>Date of Exam <i class="fas fa-arrow-right"></i></strong></td>
                                                    <td>
                                                        <input type="date" class="form-control" name="add_igm_01" id="add_igm_01"  value="{{ $data ? $data->add_igm_01 : old('add_igm_01') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="add_igm_02" id="add_igm_02"  value="{{ $data ? $data->add_igm_02 : old('add_igm_02') }}">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="add_igm_03" id="add_igm_03"  value="{{ $data ? $data->add_igm_03 : old('add_igm_03') }}">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        IgM Value
                                                    </td>
                                                    <td>
                                                        <small>
                                                            Reactive or Non-Reactive
                                                        </small> 
                                                    </td>
                                                    <td>
                                                        <select type="text" class="form-control" name="add_igm_res_01" id="add_igm_res_01" placeholder="" data-value="{{ $data ? $data->add_igm_res_01 : old('add_igm_res_01') }}">
                                                            <option value="">Select Result</option>
                                                            <option value="Reactive">Reactive</option>
                                                            <option value="Non-Reactive">Non-Reactive</option>
                                                        </select>
                                                    </td> 
                                                    <td>
                                                        <select type="text"  class="form-control" name="add_igm_res_02" id="add_igm_res_02" placeholder="" data-value="{{ $data ? $data->add_igm_res_02 : old('add_igm_res_02') }}">
                                                            <option value="">Select Result</option>
                                                            <option value="Reactive">Reactive</option>
                                                            <option value="Non-Reactive">Non-Reactive</option>
                                                        </select>
                                                    </td>  
                                                    <td>
                                                        <select type="text"  class="form-control" name="add_igm_res_03" id="add_igm_res_03" placeholder="" data-value="{{ $data ? $data->add_igm_res_03 : old('add_igm_res_03') }}">
                                                            <option value="">Select Result</option>
                                                            <option value="Reactive">Reactive</option>
                                                            <option value="Non-Reactive">Non-Reactive</option>
                                                        </select>
                                                    </td>                                                   
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- End of section 5 --}}
                        </div>

                        {{-- Save Button --}}
                        <div class="save-btn">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                {{ $data ? "Update" : "Save" }}
                                            </button>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </form>

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
    </script>    
@endsection