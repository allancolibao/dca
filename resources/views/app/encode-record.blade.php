@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center ">
                        <a href="{{route('view.record', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age ])}}" class="mr-3">
                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                <i class="fas fa-arrow-left"></i>   
                            </button>
                        </a>
                        <h6 class="m-0 font-weight-bold text-gray-800">Encode Food Record: ID-{{$id}} {{$fullname}} {{$age}} years old | Record date: {{$date}} | Record day: {{$recordDay}}</h6>
                        <a href="{{route('get.record', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=>$date ])}}" class="mr-3">
                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm ml-4">
                                View and Edit  
                            </button>
                        </a>
                    </div>
                    <form id="update-record-header" method="POST" action="{{ action('FoodRecordController@updateRecordHeader', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=>$date ]) }}" accept-charset="UTF-8">
                        @csrf
                        <div class="table-responsive">
                            <table class="table"  width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label for="accom_by">Accomplished by</label>
                                            <input type="text" class="form-control form-header-field" name="accom_by" id="accom_by"  value="{{ $recordHeader->accom_by }}">
                                        </td>
                                        <td>
                                            <label for="position">Position</label>
                                            <input type="text" class="form-control form-header-field" name="position" id="position"  value="{{ $recordHeader->position }}">
                                        </td>
                                        <td>
                                            <label for="date">Date:</label>
                                            <input type="date" class="form-control form-header-field" name="date" id="date"  value="{{ $recordHeader->date }}">
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#update-modal">
                                                <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                                    <i class="fas fa-angle-double-right"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="card-body">
                        <div class="table-responsive table-responsive-foodrecord">
                            <form id="insert-record" method="POST" action="{{ action('FoodRecordController@insertRecordData', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=>$date ]) }}" accept-charset="UTF-8">
                                @csrf 
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>LINE NO</th>
                                            <th>FOOD ITEM</th>
                                            <th>FI AMOUNT/SIZE</th>
                                            <th>PLATE WASTE</th>
                                            <th>PW AMOUNT/SIZE</th>
                                            <th>RF CODE</th>
                                            <th>MEAL CODE</th>
                                            @if(Auth::user()->is_admin != 3)
                                            <th>FOODCODE (FIC)</th>
                                            <th>FOOD WEIGHT</th>
                                            <th>FW RCC</th>
                                            <th>FW CMC</th>
                                            <th>SUPCODE</th>
                                            <th>SRCCODE</th>
                                            <th>PW WEIGHT</th>
                                            <th>PW RCC</th>
                                            <th>PW CMC</th>
                                            <th>UNIT COST</th>
                                            <th>UNIT WEIGHT</th>
                                            <th>UNIT MEAS</th>
                                            @endif
                                            <th>ADD</th>
                                            <th>REM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr_clone" id="line-1">                   
                                            <td>
                                                <div class="form-group-line">
                                                <input type="number" step="any" class="form-no-border" name="line_no[]" id="line_no" placeholder="00" value="" required autofocus/>
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text"class="form-no-border" name="food_item[]" id="food_item" placeholder="Food Item" value=""/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text"  class="form-no-border" name="fi_amount_size[]" id="fi_amount_size" placeholder="Amount/Size" value=""/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                        <input type="text" class="form-no-border" name="plate_waste[]" id="plate_waste" placeholder="Plate Waste" value=""/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <input type="text"class="form-no-border" name="pw_amount_size[]" id="pw_amount_size" placeholder="Amount/Size" value=""/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <select type="text" class="form-no-border" name="rf_code[]" id="rf_code" placeholder="RF Code" value="">
                                                        <option value="">Please select</option>
                                                        <option value="1" >1 - Single food item</option>
                                                        <option value="2" >2 - Mixed Dish</option>
                                                        <option value="3" >3 - Composite Ingridient</option>
                                                        <option value="4" >4 - Water</option>
                                                        <option value="5" >5 - Water added to conc/powdered Beverage</option>
                                                        <option value="6" >6 - Water used for cooking</option>
                                                        <option value="7" >7 - Beverage</option>
                                                        <option value="8" >8 - Other liquids, specify..</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group-line">
                                                    <select type="text" class="form-no-border" name="meal_code[]" id="meal_code" placeholder="Meal Code" value="">
                                                        <option value="">Please select</option>
                                                        <option value="1" >1 - Breakfast</option>
                                                        <option value="2" >2 - AM Snack</option>
                                                        <option value="3" >3 - Lunch</option>
                                                        <option value="4" >4 - PM Snack</option>
                                                        <option value="5" >5 - Supper</option>
                                                        <option value="6" >6 - Late PM Snack</option>
                                                    </select>   
                                                </div>
                                            </td>
                                            @if(Auth::user()->is_admin != 3)
                                                <td>
                                                    <div class="form-group-line">
                                                        <input type="text" list="fct" class="form-no-border" name="food_code[]" id="food_code" placeholder="FIC" value=""/>
                                                        <datalist id="fct" >
                                                                @foreach ($fct as $value)
                                                                <option >{{$value->foodcode.' - '.$value->fooddesc}}</option>
                                                                @endforeach                                         
                                                        </datalist>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-line">
                                                        <input type="number" step="any" class="form-no-border" name="food_weight[]" id="food_weight" placeholder="Food Weight" value=""/>
                                                    </div>
                                                </td>                            
                                                <td>
                                                    <div class="form-group-line">
                                                        <select type="text"class="form-no-border RCC" name="fw_rcc[]" id="fw_rcc" placeholder="RCC" value="">
                                                            <option value="">Please select</option>
                                                            <option value="1" >1 - Raw as purchased</option>
                                                            <option value="2" >2 - Raw edible portion</option>
                                                            <option value="3" >3 - Cooked as purchased</option>
                                                            <option value="4" >4 - Cooked edible portion</option>
                                                            <option value="5" >5 - Cleaned and Drawn fresh fish </option>
                                                            <option value="6" >6 - Cleaned and Drawn cooked fish</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-line">
                                                        <select type="text"  class="form-no-border CMC" name="fw_cmc[]" id="fw_cmc" placeholder="CMC" value="">
                                                            <option value="">Please select</option>
                                                            <option value="1" >1 - Boiled</option>
                                                            <option value="2" >2 - Fried</option>
                                                            <option value="3" >3 - Sauteed</option>
                                                            <option value="4" >4 - Broiled</option>
                                                            <option value="5" >5 - Scambled</option>
                                                            <option value="6" >6 - Raw</option>
                                                        </select>    
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-line">
                                                        <select type="text" class="form-no-border" name="supply_code[]" id="supply_code" placeholder="SUP" value="">
                                                            <option value="">Please select</option>
                                                            <option value="1" >1 - Bought</option>
                                                            <option value="2" >2 - Barter</option>
                                                            <option value="3" >3 - Given</option>
                                                            <option value="4" >4 - Own Produced</option>
                                                            <option value="99" >9 - NA</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-line">
                                                        <select type="text" class="form-no-border" name="src_code[]" id="src_code" placeholder="SRC" value="">
                                                            <option value="">Please select</option>
                                                            <option value="1" >1 - Fastfood</option>
                                                            <option value="2" >2 - Carinderia / Turo-turo</option>
                                                            <option value="3" >3 - Canteen/Cafeteria</option>
                                                            <option value="4" >4 - Restaurant</option>
                                                            <option value="5" >5 - Market / Talipapa</option>
                                                            <option value="6" >6 - Sari-sari Store</option>
                                                            <option value="7" >7 - Supermarket</option>
                                                            <option value="8" >8 - Grocery</option>
                                                            <option value="9" >9 - Convenience Store</option>
                                                            <option value="10" >10 - Mobile Vendor</option>
                                                            <option value="11" >11 - Specialty Store</option>
                                                            <option value="12" >12 - Home prepared</option>
                                                            <option value="13" >13 - Food Aid</option>
                                                            <option value="14" >14 - Homeyard garden, livestock, fishpen</option>
                                                            <option value="15" >15 - Farm garden, farmstock, fishpen</option>
                                                            <option value="16" >16 - Water from deepwell, rainfall and spring</option>
                                                            <option value="17" >17 - Water from waterworks like NAWASA and Maynilad</option>
                                                            <option value="18" >18 - Pharmacy / Clinic</option>
                                                            <option value="19" >19 - Others</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-line">
                                                        <input type="number" step="any" class="form-no-border" name="pw_weight[]" id="pw_weight" placeholder="Weight" value=""/>
                                                    </div>
                                                </td>                            
                                                <td>
                                                    <div class="form-group-line">
                                                        <select type="text"class="form-no-border RCC" name="pw_rcc[]" id="pw_rcc" placeholder="RCC" value="">
                                                            <option value="">Please select</option>
                                                            <option value="1" >1 - Raw as purchased</option>
                                                            <option value="2" >2 - Raw edible portion</option>
                                                            <option value="3" >3 - Cooked as purchased</option>
                                                            <option value="4" >4 - Cooked edible portion</option>
                                                            <option value="5" >5 - Cleaned and Drawn fresh fish </option>
                                                            <option value="6" >6 - Cleaned and Drawn cooked fish</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-line">
                                                        <select type="text"  class="form-no-border CMC" name="pw_cmc[]" id="pw_cmc" placeholder="CMC" value="">
                                                            <option value="">Please select</option>
                                                            <option value="1" >1 - Boiled</option>
                                                            <option value="2" >2 - Fried</option>
                                                            <option value="3" >3 - Sauteed</option>
                                                            <option value="4" >4 - Broiled</option>
                                                            <option value="5" >5 - Scambled</option>
                                                            <option value="6" >6 - Raw</option>
                                                        </select>    
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-line">
                                                        <input type="number" step="any" class="form-no-border" name="unit_cost[]" id="unit_cost" placeholder="Unit Cost" value=""/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-line">
                                                        <input type="number" step="any" class="form-no-border" name="unit_weight[]" id="unit_weight" placeholder="Unit Weight" value=""/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group-line">
                                                        <input type="text" class="form-no-border" name="unit_meas[]" id="unit_meas" placeholder="Unit Meas" value=""/>
                                                    </div>
                                                </td>
                                            @endif
                                            <td>
                                                <input type="button" name="add" value="+"  class=" autofocus d-sm-inline-block btn  btn-primary shadow-sm tr_clone_add">
                                            </td>
                                            <td>
                                                <input type="button" id="remove" name="remove" value="-"  class="autofocus d-sm-inline-block btn  btn-primary shadow-sm remove">
                                            </td>
                                        </tr>  
                                    </tbody>  
                                </table>
                            </form>
                        </div>
                                          
                        {{-- Launch the Food record Confirmation modal --}}
                        <a href="#" id="save-record-btn">
                            <button type="submit" class="autofocus d-sm-inline-block btn  btn-primary shadow-sm">
                                Save
                            </button>
                        </a>

                        {{-- Food record Confirmation Modal --}}
                        <div class="modal fade" id="save-record" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="record-modal-body">Select "Proceed" below if you want to submit record data.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" href="#" id="save-record-proceed"
                                        onclick="event.preventDefault();
                                        document.getElementById('insert-record').submit();">
                                        Proceed
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--Update Header Confirmation Modal --}}
                        <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">NOTE: Make sure the food record below is already save before "Proceed"</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-primary" href="#"
                                            onclick="event.preventDefault();
                                            document.getElementById('update-record-header').submit();">
                                            Proceed
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Remove clone confirmation modal --}}
                        <div class="modal fade" id="remove-clone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Are you sure you want to delete the row?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-warning" type="button" id="proceed">Proceed</button>
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