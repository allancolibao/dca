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
                        <h6 class="m-0 font-weight-bold text-gray-800">Adverse Event: ID-{{$id}} {{$fullname}} {{$age}} years old</h6>
                    </div>
                    <form id="insert-update-adverse-data" method="POST" action="{{$data ? action('AdverseEventController@update', $id) : action('AdverseEventController@insert', $id)}}" accept-charset="UTF-8">
                        @csrf
                        <div class="card-body">
                            <h3 class="text-center text-dark">ADVERSE EVENT FORM</h3>
                            {{-- Start of section --}}
                            <div class="line-content mt-4">
                                <h5 class="text-primary">Criteria for reporting SAEs (adopted from CIOMS – modified version) (check if yes)</h5>
                                <div id="section">
                                    <div class="table-responsive">
                                        <tr>
                                            <td>
                                                <input type="hidden" value="0" name="ae_serious">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_serious" id="ae_serious" {{$data ? ($data->ae_serious == 1 ? 'checked' : '') : (old("ae_serious") == '1' ? 'checked' : '') }}>
                                                <label for="ae_serious" class="pr-3">Serious?</label> 

                                                <input type="hidden" value="0" name="ae_unexpected">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_unexpected" id="ae_unexpected"  {{$data ? ($data->ae_unexpected == 1 ? 'checked' : '') : (old("ae_unexpected") == '1' ? 'checked' : '') }}>
                                                <label for="ae_unexpected" class="pr-3">Unexpected?</label> 

                                                <input type="hidden" value="0" name="ae_related">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_related" id="ae_related"  {{$data ? ($data->ae_related == 1 ? 'checked' : '') : (old("ae_related") == '1' ? 'checked' : '') }}>
                                                <label for="ae_related" class="pr-3">Possibly, Probably or Definitely Related?</label>

                                                <input type="hidden" value="0" name="ae_occurring">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_occurring" id="ae_occurring"  {{$data ? ($data->ae_occurring == 1 ? 'checked' : '') : (old("ae_occurring") == '1' ? 'checked' : '') }}>
                                                <label for="ae_occurring">Occurring on a trial open at a site subject to team review?</label><br><hr>
                                            </td>                                              
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>1. This event is being reported by the (check all that apply):</strong><br>
                                                <input type="hidden" value="0" name="ae_01_physician">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_01_physician" id="ae_01_physician"  {{$data ? ($data->ae_01_physician == 1 ? 'checked' : '') : (old("ae_01_physician") == '1' ? 'checked' : '') }}>
                                                <label for="ae_01_physician" class="pr-3">Physician only</label> 

                                                <input type="hidden" value="0" name="ae_01_nurse">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_01_nurse" id="ae_01_nurse"  {{$data ? ($data->ae_01_nurse == 1 ? 'checked' : '') : (old("ae_01_nurse") == '1' ? 'checked' : '') }}>
                                                <label for="ae_01_nurse" class="pr-3">Nurse</label> 

                                                <input type="hidden" value="0" name="ae_01_rnd">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_01_rnd" id="ae_01_rnd"  {{$data ? ($data->ae_01_rnd == 1 ? 'checked' : '') : (old("ae_01_rnd") == '1' ? 'checked' : '') }}>
                                                <label for="ae_01_rnd" class="pr-3">RND</label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>2. Study is:</strong><br>
                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_02" id="ae_02"  {{$data ? ($data->ae_02 == 1 ? 'checked' : '') : (old("ae_02") == '1' ? 'checked' : '') }}>
                                                <label for="ae_02" class="pr-3">Multicenter</label> 

                                                <input type="radio" value="2" style="width: 1.3em;  height: 1.3em;" name="ae_02" id="ae_02"  {{$data ? ($data->ae_02 == 2 ? 'checked' : '') : (old("ae_02") == '2' ? 'checked' : '') }}>
                                                <label for="ae_02" class="pr-3">Only One site </label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>3.Did this SAE occur at a site subject to Team review?</strong><br>
                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_03" id="ae_03"  {{$data ? ($data->ae_03 == 1 ? 'checked' : '') : (old("ae_03") == '1' ? 'checked' : '') }}>
                                                <label for="ae_03" class="pr-3">YES</label>

                                                <input type="radio" value="0" style="width: 1.3em;  height: 1.3em;" name="ae_03" id="ae_03"  {{$data ? ($data->ae_03 == 0 ? 'checked' : '') : (old("ae_03") == '0' ? 'checked' : '') }}>
                                                <label for="ae_03" class="pr-3">NO</label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>4. This report is about a study that is:</strong><br>
                                                <input type="hidden" value="0" name="ae_04">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_04" id="ae_04"  {{$data ? ($data->ae_04 == 1 ? 'checked' : '') : (old("ae_04") == '1' ? 'checked' : '') }}>
                                                <label for="ae_04" class="pr-3">closed to enrollment with subjects receiving study treatment</label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>5. Does this event require action to protect other trial participants?</strong><br>

                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_05" id="ae_05"  {{$data ? ($data->ae_05 == 1 ? 'checked' : '') : (old("ae_05") == '1' ? 'checked' : '') }}>
                                                <label for="ae_05" class="pr-3">YES</label>

                                                <input type="radio" value="0" style="width: 1.3em;  height: 1.3em;" name="ae_05" id="ae_05"  {{$data ? ($data->ae_05 == 0 ? 'checked' : '') : (old("ae_05") == '0' ? 'checked' : '') }}>
                                                <label for="ae_05" class="pr-3">NO</label>

                                                <input type="radio" value="2" style="width: 1.3em;  height: 1.3em;" name="ae_05" id="ae_05"  {{$data ? ($data->ae_05 == 2 ? 'checked' : '') : (old("ae_05") == '2' ? 'checked' : '') }}>
                                                <label for="ae_05" class="pr-3">Undetermined at this time</label><br>
                                                
                                                <label for="ae_05_action">If yes, what action?</label>
                                                <input type="text" class="form-control" name="ae_05_action" id="ae_05_action" placeholder="what action?" value="{{ $data ? $data->ae_05_action : old('ae_05_action') }}"/><br>
                                                
                                                <label for="ae_05_urgency">If yes, with what urgency?</label>
                                                <input type="text" class="form-control" name="ae_05_urgency" id="ae_05_urgency" placeholder="with what urgency?" value="{{$data ? $data->ae_05_urgency : old('ae_05_urgency') }}"/><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>6. This report is: </strong><br>
                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_06" id="ae_06"  {{$data ? ($data->ae_06 == 1 ? 'checked' : '') : (old("ae_06") == '1' ? 'checked' : '') }}>
                                                <label for="ae_06" class="pr-3">Initial</label> 

                                                <input type="radio" value="2" style="width: 1.3em;  height: 1.3em;" name="ae_06" id="ae_06"  {{$data ? ($data->ae_06 == 2 ? 'checked' : '') : (old("ae_06") == '2' ? 'checked' : '') }}>
                                                <label for="ae_06" class="pr-3">Follow-up</label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>7. Indicate seriousness: </strong><br>
                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_07" id="ae_07"  {{$data ? ($data->ae_07 == 1 ? 'checked' : '') : (old("ae_07") == '1' ? 'checked' : '') }}>
                                                <label for="ae_07" class="pr-3">Serious but not fatal</label> 

                                                <input type="radio" value="2" style="width: 1.3em;  height: 1.3em;" name="ae_07" id="ae_07"  {{$data ? ($data->ae_07 == 2 ? 'checked' : '') : (old("ae_07") == '2' ? 'checked' : '') }}>
                                                <label for="ae_07" class="pr-3">Fatal</label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>8. Identify the event: </strong><br>
                                                <textarea class="form-control" name="ae_08" id="ae_08" rows="4">{{$data ? $data->ae_08 : old("ae_08") }}</textarea>
                                                <p class="text-warning"><i class="fa fa-file-pdf"></i> Attach supporting documents about the event such as discharge summary, clinical notes,</p><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>9. Was the event related to the procedures in this study?</strong><br>
                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_09" id="ae_09"  {{$data ? ($data->ae_09 == 1 ? 'checked' : '') : (old("ae_09") == '1' ? 'checked' : '') }}>
                                                <label for="ae_09" class="pr-3">Not related</label> 

                                                <input type="radio" value="2" style="width: 1.3em;  height: 1.3em;" name="ae_09" id="ae_09"  {{$data ? ($data->ae_09 == 2 ? 'checked' : '') : (old("ae_09") == '2' ? 'checked' : '') }}>
                                                <label for="ae_09" class="pr-3">Unlikely</label> 

                                                <input type="radio" value="3" style="width: 1.3em;  height: 1.3em;" name="ae_09" id="ae_09"  {{$data ? ($data->ae_09 == 3 ? 'checked' : '') : (old("ae_09") == '3' ? 'checked' : '') }}>
                                                <label for="ae_09" class="pr-3">Possibly</label> 

                                                <input type="radio" value="4" style="width: 1.3em;  height: 1.3em;" name="ae_09" id="ae_09"  {{$data ? ($data->ae_09 == 4 ? 'checked' : '') : (old("ae_09") == '4' ? 'checked' : '') }}>
                                                <label for="ae_09" class="pr-3">Probably</label> 

                                                <input type="radio" value="5" style="width: 1.3em;  height: 1.3em;" name="ae_09" id="ae_09"  {{$data ? ($data->ae_09 == 5 ? 'checked' : '') : (old("ae_09") == '5' ? 'checked' : '') }}>
                                                <label for="ae_09" class="pr-3">Definitely related </label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <h5>Relatedness determination made by (check all that apply):</h5><br>
                                                <input type="hidden" value="0" name="ae_rel_physician">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_rel_physician" id="ae_rel_physician"  {{$data ? ($data->ae_rel_physician == 1 ? 'checked' : '') : (old("ae_rel_physician") == '1' ? 'checked' : '') }}>
                                                <label for="ae_rel_physician" class="pr-3">Physician</label> 

                                                <input type="hidden" value="0" name="ae_rel_nurse">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_rel_nurse" id="ae_rel_nurse"  {{$data ? ($data->ae_rel_nurse == 1 ? 'checked' : '') : (old("ae_rel_nurse") == '1' ? 'checked' : '') }}>
                                                <label for="ae_rel_nurse" class="pr-3">Nurse</label> 

                                                <input type="hidden" value="0" name="ae_rel_rnd">
                                                <input type="checkbox" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_rel_rnd" id="ae_rel_rnd"  {{$data ? ($data->ae_rel_rnd == 1 ? 'checked' : '') : (old("ae_rel_rnd") == '1' ? 'checked' : '') }}>
                                                <label for="ae_rel_rnd" class="pr-3">RND (if necessary)</label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>10. Is the risk of this event described in the consent form?</strong><br>
                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_10" id="ae_10"  {{$data ? ($data->ae_10 == 1 ? 'checked' : '') : (old("ae_10") == '1' ? 'checked' : '') }}>
                                                <label for="ae_10" class="pr-3">YES</label>

                                                <input type="radio" value="0" style="width: 1.3em;  height: 1.3em;" name="ae_10" id="ae_10"  {{$data ? ($data->ae_10 == 0 ? 'checked' : '') : (old("ae_10") == '0' ? 'checked' : '') }}>
                                                <label for="ae_10" class="pr-3">NO</label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>11. Is the risk of this event described in the investigators brochure (IB)?</strong><br>
                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_11" id="ae_11"  {{$data ? ($data->ae_11 == 1 ? 'checked' : '') : (old("ae_11") == '1' ? 'checked' : '') }}>
                                                <label for="ae_11" class="pr-3">YES</label>

                                                <input type="radio" value="0" style="width: 1.3em;  height: 1.3em;" name="ae_11" id="ae_11"  {{$data ? ($data->ae_11 == 0 ? 'checked' : '') : (old("ae_11") == '0' ? 'checked' : '') }}>
                                                <label for="ae_11" class="pr-3">NO</label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>12.  Should the consent form or any part of the study be revised as a result of this event?</strong><br>
                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_12" id="ae_12"  {{$data ? ($data->ae_12 == 1 ? 'checked' : '') : (old("ae_12") == '1' ? 'checked' : '') }}>
                                                <label for="ae_12" class="pr-3"> YES:<span class="text-warning"> If yes, enclose a Request for Revision Form and revised documents with all revisions in bold print or highlighted.</span></label><br>

                                                <input type="radio" value="0" style="width: 1.3em;  height: 1.3em;" name="ae_12" id="ae_12"  {{$data ? ($data->ae_12 == 0 ? 'checked' : '') : (old("ae_12") == '0' ? 'checked' : '') }}>
                                                <label for="ae_12" class="pr-3"> NO:<span class="text-warning"> Explain why not, if the risk is possibly, probably or definitely related and the risk is not in the current consent form.</span></label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>13. Will currently enrolled individuals be notified of this event?</strong><br>
                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_13" id="ae_13"  {{$data ? ($data->ae_13 == 1 ? 'checked' : '') : (old("ae_13") == '1' ? 'checked' : '') }}>
                                                <label for="ae_13" class="pr-3">YES</label>

                                                <input type="radio" value="0" style="width: 1.3em;  height: 1.3em;" name="ae_13" id="ae_13"  {{$data ? ($data->ae_13 == 0 ? 'checked' : '') : (old("ae_13") == '0' ? 'checked' : '') }}>
                                                <label for="ae_13" class="pr-3">NO</label><br><br>

                                                <label class="text-warning">If yes, describe method of notification: </label><br>
                                                <textarea class="form-control" name="ae_13_01" id="ae_13_01" rows="4">{{$data ? $data->ae_13_01 : old("ae_13_01") }}</textarea><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>14. Can this event be explained or understood?</strong><br>
                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_14" id="ae_14"  {{$data ? ($data->ae_14 == 1 ? 'checked' : '') : (old("ae_14") == '1' ? 'checked' : '') }}>
                                                <label for="ae_14" class="pr-3"> Yes. This event can be explained or understood:</label><br>

                                                <input type="radio" value="2" style="width: 1.3em;  height: 1.3em;" name="ae_14" id="ae_14"  {{$data ? ($data->ae_14 == 2 ? 'checked' : '') : (old("ae_14") == '2' ? 'checked' : '') }}>
                                                <label for="ae_14" class="pr-3">consistent with recognized complications of underlying disease</label><br>

                                                <input type="radio" value="3" style="width: 1.3em;  height: 1.3em;" name="ae_14" id="ae_14"  {{$data ? ($data->ae_14 == 3 ? 'checked' : '') : (old("ae_14") == '3' ? 'checked' : '') }}>
                                                <label for="ae_14" class="pr-3">consistent with recognized complications of aspects of treatment apart from investigational product (VCO)  central to study named above</label><br>

                                                <input type="radio" value="4" style="width: 1.3em;  height: 1.3em;" name="ae_14" id="ae_14"  {{$data ? ($data->ae_14 == 4 ? 'checked' : '') : (old("ae_14") == '4' ? 'checked' : '') }}>
                                                <label for="ae_14" class="pr-3">consistent with known physiology or mechanism of investigational product (VCO)</label><br>

                                                <input type="radio" value="5" style="width: 1.3em;  height: 1.3em;" name="ae_14" id="ae_14"  {{$data ? ($data->ae_14 == 5 ? 'checked' : '') : (old("ae_14") == '5' ? 'checked' : '') }}>
                                                <label for="ae_14" class="pr-3">No. This event can NOT readily be explained or understood:</label><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>Patient ID: {{$id}} {{$fullname}}</strong><br>
                                                <label for="ae_date">Date</label>
                                                <input type="date" class="form-control" name="ae_date" id="ae_date"  value="{{$data ? $data->ae_date : old('ae_date') }}">

                                                <label for="ae_name">Investigator Name</label>
                                                <input type="text" class="form-control" name="ae_name" id="ae_name"  value="{{$data ? $data->ae_name : old('ae_name') }}" placeholder="Name">

                                                <label for="ae_contact_person">Contact Person who did the investigation of the AE</label>
                                                <input type="text" class="form-control" name="ae_contact_person" id="ae_contact_person"  value="{{$data ? $data->ae_contact_person : old('ae_contact_person') }}" placeholder="Contact Person">

                                                <label for="ae_email">E-mail</label>
                                                <input type="text" class="form-control" name="ae_email" id="ae_email"  value="{{$data ? $data->ae_email : old('ae_email') }}" placeholder="E-mail">

                                                <label for="ae_title">Study Title</label>
                                                <input type="text" class="form-control" name="ae_title" id="ae_title"  value="{{$data ? $data->ae_title : old('ae_title') }}" placeholder="Study Title"><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <strong>15. Required PI and research team statements</strong><br>
                                                <label class="text-warning">1. Summarize briefly the circumstances of the event.</label><br>
                                                <textarea class="form-control" name="ae_15_01" id="ae_15_01" rows="4">{{$data ? $data->ae_15_01 : old("ae_15_01") }}</textarea><br>

                                                <label class="text-warning">2.How does this event affect the conduct of the study? </label><br>
                                                <textarea class="form-control" name="ae_15_02" id="ae_15_02" rows="4">{{$data ? $data->ae_15_02 : old("ae_15_02") }}</textarea><br>

                                                <label for="ae_15_principal">Principal Investigator</label>
                                                <input type="text" class="form-control" name="ae_15_principal" id="ae_15_principal"  value="{{$data ? $data->ae_15_principal : old('ae_15_principal') }}" placeholder="Principal Investigator">

                                                <label for="ae_date">Date</label>
                                                <input type="date" class="form-control" name="ae_15_date" id="ae_15_date"  value="{{$data ? $data->ae_15_date : old('ae_15_date') }}"><br><hr>
                                            </td>                                                  
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="ae_16_name">Name</label>
                                                <input type="text" class="form-control {{ $errors->has('ae_16_name') ? 'has-error' : ''}}" name="ae_16_name" id="ae_16_name"  value="{{$data ? $data->ae_16_name : old('ae_16_name') }}" placeholder="Name">

                                                <label for="ae_16_date">Date</label>
                                                <input type="date" class="form-control" name="ae_16_date" id="ae_16_date"  value="{{$data ? $data->ae_16_date : old('ae_16_date') }}"><br>

                                                <input type="radio" value="1" style="width: 1.3em;  height: 1.3em;" name="ae_16" id="ae_16"  {{$data ? ($data->ae_16 == 1 ? 'checked' : '') : (old("ae_16") == '1' ? 'checked' : '') }}>
                                                <label for="ae_16" class="pr-3">no further action required</label><br>

                                                <input type="radio" value="2" style="width: 1.3em;  height: 1.3em;" name="ae_16" id="ae_16"  {{$data ? ($data->ae_16 == 2 ? 'checked' : '') : (old("ae_16") == '2' ? 'checked' : '') }}>
                                                <label for="ae_16" class="pr-3">obtain additional information</label><br>

                                                <input type="radio" value="3" style="width: 1.3em;  height: 1.3em;" name="ae_16" id="ae_16"  {{$data ? ($data->ae_16 == 3 ? 'checked' : '') : (old("ae_16") == '3' ? 'checked' : '') }}>
                                                <label for="ae_16" class="pr-3">send to Full Committee</label><br>

                                                <label class="text-warning">Comments</label><br>
                                                <textarea class="form-control" name="ae_16_comment" id="ae_16_comment" rows="4">{{$data ? $data->ae_16_comment : old("ae_16_comment") }}</textarea><br><hr>
                                            </td>                                                  
                                        </tr>
                                       
                                    </div>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#save-adverse-form" >
                                <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                    {{$data ? 'Update' : 'Save'}}
                                </button>
                            </a>
                            {{-- End of section  --}}
                        </div>
                    </form>
                                                    
                    {{-- Confirmation Modal --}}
                    <div class="modal fade" id="save-adverse-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        document.getElementById('insert-update-adverse-data').submit();">
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