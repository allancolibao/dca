@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-header py-3 d-flex flex-row align-items-center ">
                    <a href="{{ route('home')}}" class="mr-3">
                        <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                            <i class="fas fa-arrow-left"></i>   
                        </button>
                    </a>
                    <h6 class="m-0 font-weight-bold text-gray-800">Add Background Information of the Participant</h6>
                </div>
                <div class="card-body">
                    <form id="insert-participant-info" method="POST" action="{{ action('ParticipantController@insert') }}" accept-charset="UTF-8">
                        @csrf
                        <input type="hidden" name="is_agreed" id="is_agreed" value="1">
                        <h4 class="text-dark">First Step</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" id="assent-btn">
                                    <label>INFORMED ASSENT FORM</label><span id="assent-icon" style="position:absolute;"><i class="ml-2 mb-2 text-danger fa fa-times"></i></span><br>
                                    <button data-path={{ route('assent') }} type="button" id="assent-btn" class="btn btn-danger open-modal">Assent Form</button> 
                                    <button type="button" onclick="toggleStatusAssentAlready()" class="btn btn-secondary">Read already & Agree to take part in this research</button>
                                </div>
                            </div>
                        </div>
                        <div id="second-step" style="display:none">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>Assent Date</label>
                                    <input type="date" class="form-control {{ $errors->has('assent_date') ? 'has-error' : ''}} participant" name="assent_date" id="assent_date" value="{{ old('assent_date') }}"/>
                                            @if ($errors->has('assent_date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('assent_date') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                            </div>

                            <h6 class="text-dark">If the participant cannot read nor write</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Name of Witness (optional)</label>
                                    <input type="text" class="form-control {{ $errors->has('witness_name') ? 'has-error' : ''}} participant" name="witness_name" id="witness_name" value="{{ old('witness_name') }}"/>
                                            @if ($errors->has('witness_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('witness_name') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Mobile Number (optional)</label>
                                    <input type="text" class="form-control {{ $errors->has('witness_mobile') ? 'has-error' : ''}} participant" name="witness_mobile" id="witness_mobile" value="{{ old('witness_mobile') }}"/>
                                            @if ($errors->has('witness_mobile'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('witness_mobile') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Address (optional)</label>
                                    <input type="text" class="form-control {{ $errors->has('witness_address') ? 'has-error' : ''}} participant" name="witness_address" id="witness_address" value="{{ old('witness_address') }}"/>
                                            @if ($errors->has('witness_address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('witness_address') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                            </div>

                            <h6 class="text-dark">Researcher/Person taking assent</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Name of Researcher</label>
                                    <input type="text" class="form-control {{ $errors->has('researcher_name') ? 'has-error' : ''}} participant" name="researcher_name" id="researcher_name" value="{{ old('researcher_name') }}"/>
                                            @if ($errors->has('researcher_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('researcher_name') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control {{ $errors->has('researcher_date') ? 'has-error' : ''}} participant" name="researcher_date" id="researcher_date" value="{{ old('researcher_date') }}"/>
                                            @if ($errors->has('researcher_date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('researcher_date') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                            </div><hr>
                           
                            <h4 class="text-dark">Second Step</h4>
                            <label>PARTICIPANT BACKGROUND INFORMATION</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>Participant ID Number</label>
                                    <input type="text" class="form-control {{ $errors->has('participant_id') ? 'has-error' : ''}} participant" name="participant_id" id="participant_id" placeholder="000000" value="{{ old('participant_id') }}"/>
                                            @if ($errors->has('participant_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('participant_id') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control {{ $errors->has('full_name') ? 'has-error' : ''}} participant" name="full_name" id="full_name" placeholder="Last Name , First Name, M.I." value="{{ old('full_name') }}"/>
                                            @if ($errors->has('full_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('full_name') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sex</label>
                                        <select type="text" class="form-control {{ $errors->has('sex') ? 'has-error' : ''}} participant" name="sex" id="sex"  value="{{ old('sex') }}">
                                            <option selected="true" disabled="disabled">Please select</option>
                                            <option value='1' {{ (old("sex") == '1' ? 'selected' : '') }} >1 - Male</option>
                                            <option value='2' {{ (old("sex") == '2' ? 'selected' : '') }} >2 - Female</option>
                                        </select>   
                                        @if ($errors->has('sex'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('sex') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Civil Status</label>
                                        <select type="text" class="form-control {{ $errors->has('csc') ? 'has-error' : ''}} participant" name="csc" id="csc" value="{{ old('csc') }}">
                                            <option selected="true" disabled="disabled">Please select</option>
                                            <option value='1' {{ (old("csc") == '1'  ? 'selected' : '') }} >1 - Single</option>
                                            <option value='2' {{ (old("csc") == '2'  ? 'selected' : '') }} >2 - Married</option>
                                            <option value='3' {{ (old("csc") == '3'  ? 'selected' : '') }} >3 - Widowed</option>
                                            <option value='4' {{ (old("csc") == '4'  ? 'selected' : '') }} >4 - Divorced</option>
                                            <option value='5' {{ (old("csc") == '5'  ? 'selected' : '') }} >5 - Separated</option>
                                            <option value='6' {{ (old("csc") == '6'  ? 'selected' : '') }} >6 - Annuled</option>
                                            <option value='7' {{ (old("csc") == '7'  ? 'selected' : '') }} >7 - Common-Law/Live-in</option>
                                            <option value='8' {{ (old("csc") == '8'  ? 'selected' : '') }} >8 - Not Reported</option>
                                        </select>
                                        @if ($errors->has('csc'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('csc') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control {{ $errors->has('birth_date') ? 'has-error' : ''}} participant" name="birth_date" id="birth_date" value="{{ old('birth_date') }}"/>
                                        @if ($errors->has('birth_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('birth_date') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="number" step="any" class="form-control {{ $errors->has('age') ? 'has-error' : ''}} participant" name="age" id="age" placeholder="00.0" value="{{ old('age') }}" readonly/>
                                        @if ($errors->has('age'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('age') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Educational Attainment</label>
                                        <select name="educ_attainment" id="educ_attainment" class="form-control {{ $errors->has('educ_attainment') ? 'has-error' : ''}} participant" value="{{ old('educ_attainment') }}">

                                            <option selected="true" disabled="disabled">Please select</option>
                                            <option value='0' {{(old("educ_attainment") == '0'  ? 'selected' : '') }} >0 - No Grade Completed</option>

                                            <optgroup label="Early Childhood Education">
                                                <option value='1' {{(old("educ_attainment") == '1'  ? 'selected' : '') }} >1 - Early Child Care and Development (ECCD)</option>
                                                <option value='2' {{(old("educ_attainment") == '2'  ? 'selected' : '') }} >2 - Nursery/Daycare</option>
                                                <option value='3' {{(old("educ_attainment") == '3'  ? 'selected' : '') }} >3 - Kinder</option>
                                                <option value='4' {{(old("educ_attainment") == '4'  ? 'selected' : '') }} >4 - Preparatory</option>
                                            </optgroup> 

                                            <optgroup label="Primary Education">
                                                <option value='11' {{(old("educ_attainment") == '11'  ? 'selected' : '') }} >11 - Grade I</option>
                                                <option value='12' {{(old("educ_attainment") == '12'  ? 'selected' : '') }} >12 - Grade II</option>
                                                <option value='13' {{(old("educ_attainment") == '13'  ? 'selected' : '') }} >13 - Grade III</option>
                                                <option value='14' {{(old("educ_attainment") == '14'  ? 'selected' : '') }} >14 - Grade IV</option>
                                                <option value='15' {{(old("educ_attainment") == '15'  ? 'selected' : '') }} >15 - Grade V</option>
                                                <option value='16' {{(old("educ_attainment") == '16'  ? 'selected' : '') }} >16 - Grade VI (if w/ VII)</option>
                                                <option value='17' {{(old("educ_attainment") == '17'  ? 'selected' : '') }} >17 - Graduate</option>
                                            </optgroup> 

                                            <optgroup label="Lower Secondary Education">
                                                <option value='21' {{(old("educ_attainment") == '21'  ? 'selected' : '') }} >21 - 1st Year HS/Grade 7</option>
                                                <option value='22' {{(old("educ_attainment") == '22'  ? 'selected' : '') }} >22 - 2nd Year HS/Grade 8</option>
                                                <option value='23' {{(old("educ_attainment") == '23'  ? 'selected' : '') }} >23 - 3rd Year HS/Grade 9</option>
                                                <option value='24' {{(old("educ_attainment") == '24'  ? 'selected' : '') }} >24 - 4th Year HS/Grade 10</option>
                                            </optgroup> 

                                            <optgroup label="Upper Secondary Education">
                                                <option value='25' {{(old("educ_attainment") == '25'  ? 'selected' : '') }} >25 - Grade 11</option>
                                                <option value='26' {{(old("educ_attainment") == '26'  ? 'selected' : '') }}>26 - Grade 12</option>
                                                <option value='27' {{(old("educ_attainment") == '27'  ? 'selected' : '') }}>27 - High School Graduate</option>
                                            </optgroup>

                                            <optgroup label="Post-Secondary Non-Tertiary Education with NC I-NC III and other certificate">
                                                <option value='31'{{(old("educ_attainment") == '31'  ? 'selected' : '') }} >31 - Vocational Graduate, specify course</option>
                                            </optgroup>

                                            <optgroup label="Short-Cycle Tertiary Education or Equivalent">
                                                <option value='41' {{(old("educ_attainment") == '41'  ? 'selected' : '') }} >41 - 1st Year</option>
                                                <option value='42' {{(old("educ_attainment") == '42'  ? 'selected' : '') }} >42 - 2nd Year/3rd Year</option>
                                                <option value='43' {{(old("educ_attainment") == '43'  ? 'selected' : '') }} >43 - Technical Vocation Graduate with diploma/NC IV certificate, specify course</option>
                                            </optgroup>

                                            <optgroup label="Bachelor Level Education or Equivalent">
                                                <option value='51' {{(old("educ_attainment") == '51'  ? 'selected' : '') }} >51 - 1st Year</option>
                                                <option value='52' {{(old("educ_attainment") == '52'  ? 'selected' : '') }} >52 - 2nd Year</option>
                                                <option value='53' {{(old("educ_attainment") == '53'  ? 'selected' : '') }} >53 - 3rd Year</option>
                                                <option value='54' {{(old("educ_attainment") == '54'  ? 'selected' : '') }} >54 - 4th/5th Year</option>
                                                <option value='55' {{(old("educ_attainment") == '55'  ? 'selected' : '') }} >55 - College Graduate, specify course</option>
                                            </optgroup>

                                            <optgroup label="Master Level Education or Equivalent">
                                                <option value='66' {{(old("educ_attainment") == '66'  ? 'selected' : '') }} >66 - Master's Graduate, Specify course</option>
                                            </optgroup>    
                                            
                                            <optgroup label="Doctoral Level Education or Equivalent">
                                                <option value='67 {{(old("educ_attainment") == '67'  ? 'selected' : '') }} '>67 - Doctoral Level, Specify course</option>
                                            </optgroup> 
                                            
                                            <optgroup label="Other Education">
                                                <option value='77' {{(old("educ_attainment") == '77'  ? 'selected' : '') }} >77 - Alternative Learning System (ALS), Specify level</option>
                                                <option value='81' {{(old("educ_attainment") == '81'  ? 'selected' : '') }} >81 - SPED, specify level</option>
                                                <option value='82' {{(old("educ_attainment") == '82'  ? 'selected' : '') }} >82 - Arabic Schooling, specify level</option>
                                                <option value='83' {{(old("educ_attainment") == '83'  ? 'selected' : '') }} >83 - Others, specify</option>
                                            </optgroup>

                                        </select> 
                                        @if ($errors->has('educ_attainment'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('educ_attainment') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control participant" name="specify_educ" id="specify_educ" placeholder="Specify Course or Level ( if needed )" value="{{ old('specify_educ') }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Occupation</label>
                                        <input type="text" class="form-control {{ $errors->has('occupation') ? 'has-error' : ''}} participant" name="occupation" id="occupation" placeholder="Enter Occupation" value="{{ old('occupation') }}"/>
                                        @if ($errors->has('occupation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('occupation') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Home Address</label>
                                        <input type="text" class="form-control {{ $errors->has('home_address') ? 'has-error' : ''}} participant" name="home_address" id="home_address" placeholder="House Number, Building, Street Name, Barangay, City/Municipality, Province" value="{{ old('home_address') }}"/>
                                        @if ($errors->has('home_address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('home_address') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contact Details</label>
                                        <input type="text"  class="form-control {{ $errors->has('contact') ? 'has-error' : ''}} participant" name="contact" id="contact" placeholder="09..." value="{{ old('contact') }}"/>
                                        @if ($errors->has('contact'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contact') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Launch the Confirmation modal --}}
                            <a href="#" data-toggle="modal" data-target="#saveInformation">
                                <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm participant">
                                    Save
                                </button>
                            </a>

                        </div>
                    </form>

                    {{-- Confirmation Modal --}}
                    <div class="modal fade" id="saveInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Proceed" below if you want to submit data.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="{{ route('insert.participant.data') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('insert-participant-info').submit();">
                                    Proceed
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  {{-- end row--}}           
</div> {{-- end container-fluid --}}
@endsection