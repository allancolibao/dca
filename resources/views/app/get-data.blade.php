@extends('layouts.main')

@section('content')
<div class="container-fluid" style="padding-bottom:59vmin;">
              
            <!-- Content Row -->
            <div class="row">
              
              <!-- Upload Membership Information -->
              <div class="col-xl-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Please make sure you have internet connection, Thank you!</h6>
                    </div>
                  <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>PATIENT ID</th>
                                        <th>FULL NAME</th>
                                        <th>AGE</th>
                                        <th>SEX</th>
                                        <th>GET DATA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participants as $data)
                                    <tr 
                                        @foreach ($existings as $existing)
                                            {{$data->participant_id == $existing->participant_id ? 'style=background-color:#d3f2df' : '' }}
                                        @endforeach
                                    >
                                        <td>{{$data->participant_id}}</td>
                                        <td>{{$data->full_name}}</td>
                                        <td>{{$data->age}}</td>
                                        <td>{{$data->sex}}</td>
                                        <td>  
                                            <a href="{{ route('save.data', ['id'=>$data->participant_id ])}}">
                                                <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm send">
                                                         <i class="fas fa-download"></i> Get Data
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>

        {{-- Loading Spinner --}}
        <div id="loading" class="overlay" style="display:none">
          <div class="overlay__inner">
              <div class="overlay__content">
                  <span class="spinner"></span><br>
                  <p class="text-light">Getting data...</p>
              </div>
          </div>
      </div>
@endsection


