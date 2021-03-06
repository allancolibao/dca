@extends('layouts.main')

@section('content') 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center ">
                        <a href="{{route('encode.record', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=>$date, 'day'=> $day ])}}" class="mr-3">
                            <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                                <i class="fas fa-arrow-left"></i>   
                            </button>
                        </a>
                        <h6 class="m-0 font-weight-bold text-gray-800">Update Food Record: ID-{{$id}} {{$fullname}} {{$age}} years old | Record date: {{$date}} | Record day: {{$recordDay}}</h6>
                        <a href="{{route('deleted.records', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=>$date,  'day' => $day ])}}" class="mr-3">
                            <button type="submit" class="d-sm-inline-block btn  btn-warning shadow-sm ml-4">
                                Restore Data  
                            </button>
                        </a>
                    </div>
                    <form id="update-record-header" method="POST" action="{{ action('FoodRecordController@updateRecordHeader', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=>$date, 'day' => $day ]) }}" accept-charset="UTF-8">
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
                        <div class="pt-5"></div>
                        <div class="table-responsive table-responsive-foodrecord">
                            <form id="update-record" method="POST" action="{{ action('FoodRecordController@updateRecordData', ['id'=> $id, 'fullname'=> $fullname, 'sex'=> $sex, 'age'=> $age, 'date'=>$date, 'day' => $day ]) }}" accept-charset="UTF-8">
                                @csrf 
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>DEL</th>
                                            <th>MENU TITLE</th>
                                            <th>LINE NO</th>
                                            <th>FOOD ITEM</th>
                                            <th>FI AMOUNT/SIZE</th>
                                            <th>RF CODE</th>
                                            <th>MEAL CODE</th>
                                            <th>OTHER FOOD SOURCE</th>

                                            @if(Auth::user()->is_admin != 3)
                                            <th>FOODCODE (FIC)</th>
                                            <th>FOOD WEIGHT</th>
                                            <th>FW RCC</th>
                                            <th>FW CMC</th>
                                            <th>SUPCODE</th>
                                            <th>SRCCODE</th>
                                            <th>PLATE WASTE</th>
                                            <th>PW AMOUNT/SIZE</th>
                                            <th>PW WEIGHT</th>
                                            <th>PW RCC</th>
                                            <th>PW CMC</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeOf($recordData) > 0 )
                                            @foreach ($recordData as $data)
                                                <input type="hidden" name="row_id[]" value="{{$data->id}}"/>
                                                <tr id="line" style="{{ strlen($data->line_no) >= 3  ? "background-color:#ffbfbf" : ""}}">  
                                                    <td>
                                                        <button data-path={{ route('food.record.delete.data', ['id'=> $data->id, 'patid'=> $id, 'date'=>$date, 'day'=>$recordDay, 'lineno'=>$data->line_no ])}} type="button" class="autofocus d-sm-inline-block btn btn-danger shadow-sm open-modal"><i class="fa fa-trash"></i></button>
                                                    </td>   
                                                    
                                                    <td>
                                                        <div class="form-group-line">
                                                            <input type="text"class="form-no-border" name="menu_title[]" id="menu_title" placeholder="Menu Title" value="{{$data->menu_title}}"/>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group-line">
                                                        <input type="number" step="any" class="form-no-border line-number" name="line_no[]" id="line_no" placeholder="00" value="{{$data->line_no}}" required/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group-line">
                                                            <input type="text"class="form-no-border" name="food_item[]" id="food_item" placeholder="Food Item" value="{{$data->food_item}}"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group-line">
                                                            <input type="text"  class="form-no-border" name="fi_amount_size[]" id="fi_amount_size" placeholder="Amount/Size" value="{{$data->fi_amount_size}}"/>
                                                        </div>
                                                    </td>
                                                    
                                                    
                                                    <td>
                                                        <div class="form-group-line">
                                                            <select type="text" class="form-no-border" name="rf_code[]" id="rf_code" placeholder="RF Code" data-value="{{$data->rf_code}}">
                                                                <option value="">Please select</option>
                                                                <option value="1">1 - Single food item</option>
                                                                <option value="2">2 - Mixed Dish</option>
                                                                <option value="3">3 - Composite Ingridient</option>
                                                                <option value="4">4 - Water</option>
                                                                <option value="5">5 - Water added to conc/powdered Beverage</option>
                                                                <option value="6">6 - Water used for cooking</option>
                                                                <option value="7">7 - Beverage</option>
                                                                <option value="8">8 - Other liquids, specify..</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group-line">
                                                            <select type="text" class="form-no-border" name="meal_code[]" id="meal_code" placeholder="Meal Code" data-value="{{$data->meal_code}}">
                                                                <option value="">Please select</option>
                                                                <option value="1">1 - Breakfast</option>
                                                                <option value="2">2 - AM Snack</option>
                                                                <option value="3">3 - Lunch</option>
                                                                <option value="4">4 - PM Snack</option>
                                                                <option value="5">5 - Supper</option>
                                                                <option value="6">6 - Late PM Snack</option>
                                                                
                                                            </select>   
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group-line">
                                                            <input type="text"class="form-no-border" name="food_source[]" id="food_source" placeholder="eg. Fastfood" value="{{$data->food_source}}"/>
                                                        </div>
                                                    </td>
        

                                                    @if(Auth::user()->is_admin != 3)
                                                        <td>
                                                            <div class="form-group-line">
                                                                <input type="text" list="fct" class="form-no-border" name="food_code[]" id="food_code" placeholder="FIC" value="{{$data->food_code}}"/>
                                                                <datalist id="fct" >
                                                                        @foreach ($fct as $value)
                                                                        <option >{{$value->foodcode.' - '.$value->fooddesc}}</option>
                                                                        @endforeach                                         
                                                                </datalist>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group-line">
                                                                <input type="number" step="any" class="form-no-border" name="food_weight[]" id="food_weight" placeholder="Food Weight" value="{{$data->food_weight}}"/>
                                                            </div>
                                                        </td>                            
                                                        <td>
                                                            <div class="form-group-line">
                                                                <select type="text"class="form-no-border RCC" name="fw_rcc[]" id="fw_rcc" placeholder="fw_rcc" data-value="{{$data->fw_rcc}}">
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
                                                                <select type="text"  class="form-no-border CMC" name="fw_cmc[]" id="fw_cmc" placeholder="CMC" data-value="{{$data->fw_cmc}}">
                                                                    <option value="">Please select</option>
                                                                    <option value="1">1 - Boiled</option>
                                                                    <option value="2">2 - Fried</option>
                                                                    <option value="3">3 - Sauteed</option>
                                                                    <option value="4">4 - Broiled</option>
                                                                    <option value="5">5 - Scrambled</option>
                                                                    <option value="6">6 - Raw</option>
                                                                    
                                                                </select>    
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group-line">
                                                                <select type="text" class="form-no-border" name="supply_code[]" id="supply_code" placeholder="SUP" data-value="{{$data->supply_code}}">
                                                                    <option value="">Please select</option>
                                                                    <option value="1">1 - Bought</option>
                                                                    <option value="2">2 - Given</option>
                                                                    <option value="99">99 - NA</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group-line">
                                                                <select type="text" class="form-no-border" name="src_code[]" id="src_code" placeholder="SRC" data-value="{{$data->src_code}}">
                                                                    <option value="">Please select</option>
                                                                    <option value="1">1 - Fastfood</option>
                                                                    <option value="2">2 - Carinderia / Turo-turo</option>
                                                                    <option value="3">3 - Canteen/Cafeteria</option>
                                                                    <option value="4">4 - Restaurant</option>
                                                                    <option value="5">5 - Market / Talipapa</option>
                                                                    <option value="6">6 - Sari-sari Store</option>
                                                                    <option value="7">7 - Supermarket</option>
                                                                    <option value="8">8 - Grocery</option>
                                                                    <option value="9">9 - Convenience Store</option>
                                                                    <option value="10">10 - Mobile Vendor</option>
                                                                    <option value="11">11 - Specialty Store</option>
                                                                    <option value="12">12 - Home prepared</option>
                                                                    <option value="13">13 - Hospital Food</option>
                                                                    <option value="14">14 - Water Refilling Station</option>
                                                                    <option value="15">15 - Central Kitchen</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="form-group-line">
                                                                    <input type="text" class="form-no-border" name="plate_waste[]" id="plate_waste" placeholder="Plate Waste" value="{{$data->plate_waste}}"/>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group-line">
                                                                <input type="text"class="form-no-border" name="pw_amount_size[]" id="pw_amount_size" placeholder="Amount/Size" value="{{$data->pw_amount_size}}"/>
                                                            </div>
                                                        </td>
    
                                                        <td>
                                                            <div class="form-group-line">
                                                                <input type="number" step="any" class="form-no-border" name="pw_weight[]" id="pw_weight" placeholder="Weight" value="{{$data->pw_weight}}"/>
                                                            </div>
                                                        </td>                            
                                                        <td>
                                                            <div class="form-group-line">
                                                                <select type="text"class="form-no-border RCC" name="pw_rcc[]" id="pw_rcc" placeholder="RCC" data-value="{{$data->pw_rcc}}">
                                                                    <option value="">Please select</option>
                                                                    <option value="1">1 - Raw as purchased</option>
                                                                    <option value="2">2 - Raw edible portion</option>
                                                                    <option value="3">3 - Cooked as purchased</option>
                                                                    <option value="4">4 - Cooked edible portion</option>
                                                                    <option value="5">5 - Cleaned and Drawn fresh fish </option>
                                                                    <option value="6">6 - Cleaned and Drawn cooked fish</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group-line">
                                                                <select type="text"  class="form-no-border CMC" name="pw_cmc[]" id="pw_cmc" placeholder="CMC" data-value="{{$data->pw_cmc}}">
                                                                    <option value="">Please select</option>
                                                                    <option value="1">1 - Boiled</option>
                                                                    <option value="2">2 - Fried</option>
                                                                    <option value="3">3 - Sauteed</option>
                                                                    <option value="4">4 - Broiled</option>
                                                                    <option value="5">5 - Scrambled</option>
                                                                    <option value="6">6 - Raw</option>
                                                                    
                                                                </select>    
                                                            </div>
                                                        </td>

                                                    @endif

                                                </tr>  
                                            @endforeach
                                            @else 
                                            <tr><td colspan="23">No Encoded Food Record</td></tr>
                                        @endif
                                    </tbody>  
                                </table>
                            </form>
                        </div>
                                          
                        {{-- Launch the Food record Confirmation modal --}}
                        @if(sizeOf($recordData) > 0 )
                            <a href="#" id="save-record-btn">
                                <button type="submit" class="autofocus d-sm-inline-block btn  btn-primary shadow-sm">
                                    Update
                                </button>
                            </a>
                        @endif

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
                                    <div class="modal-body" id="record-modal-body">Select "Proceed" below if you want to update record data.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" href="#" id="save-record-proceed"
                                        onclick="event.preventDefault();
                                        document.getElementById('update-record').submit();">
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