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
                        <a class="text-primary" href="{{ route('backup')}}" role="button" aria-haspopup="true" aria-expanded="false">
                            <button class="btn btn-sm btn-warning shadow-sm">
                            <i class="fas fa-download fa-fw"></i>Quick Backup
                            </button>
                        </a>
                    </div>
                  <div class="card-body">
                    <p>*If you want to use this feature make sure all the data completed</p>
                    <a class="text-primary" href="{{ route('send.all.data')}}" role="button" aria-haspopup="true" aria-expanded="false">
                        <button class="btn btn-sm btn-warning shadow-sm mb-2 send">
                            <i class="fas fa-plane"></i> Send All Data
                        </button>
                    </a>
                    <div class="table-responsive">
                            <table class="table table-bordered" id="transTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>PATIENT ID</th>
                                        <th>FULL NAME</th>
                                        <th>AGE</th>
                                        <th>SEX</th>
                                        <th>TRANS COUNT</th>
                                        <th>TRANSMIT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($forTransmission as $data)
                                    <tr>
                                        <td>{{$data->participant_id}}</td>
                                        <td>{{$data->full_name}}</td>
                                        <td>{{$data->age}}</td>
                                        <td>{{$data->sex}}</td>
                                        <td>{{$data->is_transmitted}}</td>
                                        <td>  
                                            <a href="{{ route('send.data', ['id'=>$data->participant_id ])}}">
                                                <button type="submit" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm send">
                                                         <i class="fas fa-plane"></i> Send Data
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
                  <span class="spinner"></span>
              </div>
          </div>
      </div>
@endsection


