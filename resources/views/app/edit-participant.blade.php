<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                <h1 class="h3 mb-2 text-grey-900">Edit Participant Information</h1>
                <h6 class="m-0 font-weight-bold text-primary">ID {{$participant->participant_id}} - {{$participant->full_name}} {{$participant->age}}</h6>
                <div class="card-body">
                    <form id="update-participant-info" method="POST" action="{{ action('ParticipantController@update', $participant->id) }}" accept-charset="UTF-8">
                        @csrf
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Last Name , First Name, M.I." value="{{$participant->full_name}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sex</label>
                                    <select type="text" class="form-control" name="sex" id="sex" value="{{$participant->sex}}">
                                        <option selected="true" disabled="disabled">Please select</option>
                                        <option value='1' {{$participant->sex == '1'  ? 'selected' : ''}} >1 - Male</option>
                                        <option value='2' {{$participant->sex == '2'  ? 'selected' : ''}} >2 - Female</option>
                                    </select>   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Civil Status</label>
                                    <select type="text" class="form-control" name="csc" id="csc" value="{{$participant->csc}}">
                                        <option selected="true" disabled="disabled">Please select</option>
                                        <option value='1' {{$participant->csc == '1'  ? 'selected' : ''}} >1 - Single</option>
                                        <option value='2' {{$participant->csc == '2'  ? 'selected' : ''}} >2 - Married</option>
                                        <option value='3' {{$participant->csc == '3'  ? 'selected' : ''}} >3 - Widowed</option>
                                        <option value='4' {{$participant->csc == '4'  ? 'selected' : ''}} >4 - Divorced</option>
                                        <option value='5' {{$participant->csc == '5'  ? 'selected' : ''}} >5 - Separated</option>
                                        <option value='6' {{$participant->csc == '6'  ? 'selected' : ''}} >6 - Annuled</option>
                                        <option value='7' {{$participant->csc == '7'  ? 'selected' : ''}} >7 - Common-Law/Live-in</option>
                                        <option value='8' {{$participant->csc == '8'  ? 'selected' : ''}} >8 - Not Reported</option>
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" name="birth_date" id="birth_date" value="{{$participant->birth_date}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" step="any" class="form-control" name="age" id="age" placeholder="00.0" value="{{$participant->age}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Educational Attainment</label>
                                    <select name="educ_attainment" id="educ_attainment" class="form-control" value="{{$participant->educ_attainment}}">

                                            <option selected="true" disabled="disabled">Please select</option>
                                            <option value='0' {{$participant->educ_attainment == '0'  ? 'selected' : ''}} >0 - No Grade Completed</option>

                                        <optgroup label="Early Childhood Education">
                                            <option value='1' {{$participant->educ_attainment == '1'  ? 'selected' : ''}} >1 - Early Child Care and Development (ECCD)</option>
                                            <option value='2' {{$participant->educ_attainment == '2'  ? 'selected' : ''}} >2 - Nursery/Daycare</option>
                                            <option value='3' {{$participant->educ_attainment == '3'  ? 'selected' : ''}} >3 - Kinder</option>
                                            <option value='4' {{$participant->educ_attainment == '4'  ? 'selected' : ''}} >4 - Preparatory</option>
                                        </optgroup> 

                                        <optgroup label="Primary Education">
                                            <option value='11' {{$participant->educ_attainment == '11'  ? 'selected' : ''}} >11 - Grade I</option>
                                            <option value='12' {{$participant->educ_attainment == '12'  ? 'selected' : ''}} >12 - Grade II</option>
                                            <option value='13' {{$participant->educ_attainment == '13'  ? 'selected' : ''}} >13 - Grade III</option>
                                            <option value='14' {{$participant->educ_attainment == '14'  ? 'selected' : ''}} >14 - Grade IV</option>
                                            <option value='15' {{$participant->educ_attainment == '15'  ? 'selected' : ''}} >15 - Grade V</option>
                                            <option value='16' {{$participant->educ_attainment == '16'  ? 'selected' : ''}} >16 - Grade VI (if w/ VII)</option>
                                            <option value='17' {{$participant->educ_attainment == '17'  ? 'selected' : ''}} >17 - Graduate</option>
                                        </optgroup> 

                                        <optgroup label="Lower Secondary Education">
                                            <option value='21' {{$participant->educ_attainment == '21'  ? 'selected' : ''}} >21 - 1st Year HS/Grade 7</option>
                                            <option value='22' {{$participant->educ_attainment == '22'  ? 'selected' : ''}} >22 - 2nd Year HS/Grade 8</option>
                                            <option value='23' {{$participant->educ_attainment == '23'  ? 'selected' : ''}} >23 - 3rd Year HS/Grade 9</option>
                                            <option value='24' {{$participant->educ_attainment == '24'  ? 'selected' : ''}} >24 - 4th Year HS/Grade 10</option>
                                        </optgroup> 

                                        <optgroup label="Upper Secondary Education">
                                            <option value='25' {{$participant->educ_attainment == '25'  ? 'selected' : ''}} >25 - Grade 11</option>
                                            <option value='26' {{$participant->educ_attainment == '26'  ? 'selected' : ''}}>26 - Grade 12</option>
                                            <option value='27' {{$participant->educ_attainment == '27'  ? 'selected' : ''}}>27 - High School Graduate</option>
                                        </optgroup>

                                        <optgroup label="Post-Secondary Non-Tertiary Education with NC I-NC III and other certificate">
                                            <option value='31'{{$participant->educ_attainment == '31'  ? 'selected' : ''}} >31 - Vocational Graduate, specify course</option>
                                        </optgroup>

                                        <optgroup label="Short-Cycle Tertiary Education or Equivalent">
                                            <option value='41' {{$participant->educ_attainment == '41'  ? 'selected' : ''}} >41 - 1st Year</option>
                                            <option value='42' {{$participant->educ_attainment == '42'  ? 'selected' : ''}} >42 - 2nd Year/3rd Year</option>
                                            <option value='43' {{$participant->educ_attainment == '43'  ? 'selected' : ''}} >43 - Technical Vocation Graduate with diploma/NC IV certificate, specify course</option>
                                        </optgroup>

                                        <optgroup label="Bachelor Level Education or Equivalent">
                                            <option value='51' {{$participant->educ_attainment == '51'  ? 'selected' : ''}} >51 - 1st Year</option>
                                            <option value='52' {{$participant->educ_attainment == '52'  ? 'selected' : ''}} >52 - 2nd Year</option>
                                            <option value='53' {{$participant->educ_attainment == '53'  ? 'selected' : ''}} >53 - 3rd Year</option>
                                            <option value='54' {{$participant->educ_attainment == '54'  ? 'selected' : ''}} >54 - 4th/5th Year</option>
                                            <option value='55' {{$participant->educ_attainment == '55'  ? 'selected' : ''}} >55 - College Graduate, specify course</option>
                                        </optgroup>

                                        <optgroup label="Master Level Education or Equivalent">
                                            <option value='66' {{$participant->educ_attainment == '66'  ? 'selected' : ''}} >66 - Master's Graduate, Specify course</option>
                                        </optgroup>    
                                        
                                        <optgroup label="Doctoral Level Education or Equivalent">
                                            <option value='67 {{$participant->educ_attainment == '67'  ? 'selected' : ''}} '>67 - Doctoral Level, Specify course</option>
                                        </optgroup> 
                                          
                                        <optgroup label="Other Education">
                                            <option value='77' {{$participant->educ_attainment == '77'  ? 'selected' : ''}} >77 - Alternative Learning System (ALS), Specify level</option>
                                            <option value='81' {{$participant->educ_attainment == '81'  ? 'selected' : ''}} >81 - SPED, specify level</option>
                                            <option value='82' {{$participant->educ_attainment == '82'  ? 'selected' : ''}} >82 - Arabic Schooling, specify level</option>
                                            <option value='83' {{$participant->educ_attainment == '83'  ? 'selected' : ''}} >83 - Others, specify</option>
                                        </optgroup>
                                    </select>  
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="specify_educ" id="specify_educ" placeholder="Specify Course or Level ( if needed )" value="{{$participant->specify_educ}}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Occupation</label>
                                    <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Enter Occupation" value="{{$participant->occupation}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Home Address</label>
                                    <input type="text" class="form-control" name="home_address" id="home_address" placeholder="House Number, Building, Street Name, Barangay, City/Municipality, Province" value="{{$participant->home_address}}"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contact Details</label>
                                    <input type="text"  class="form-control" name="contact" id="contact" placeholder="639..." value="{{$participant->contact}}"/>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>  {{-- end row--}}           
    </div> {{-- end container-fluid --}}
</div> {{-- end content --}}