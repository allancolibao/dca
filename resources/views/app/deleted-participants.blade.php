@extends('layouts.main')

@section('content')
@if(Auth::user()->is_admin === 1)
<!-- Content -->
<div class="container-fluid" style="padding-bottom:59vmin;">
    
  <!-- Content Row -->
  <div class="row">
    
    <!-- Upload Membership Information -->
    <div class="col-xl-12 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-header py-3 d-flex flex-row align-items-center ">
          <a href="{{ route('home')}}" class="mr-3">
              <button type="submit" class="d-sm-inline-block btn  btn-primary shadow-sm">
                  <i class="fas fa-arrow-left"></i>   
              </button>
          </a>
          <h6 class="m-0 font-weight-bold text-gray-800">List of Deleted Participants</h6>
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Restore</th>
                            <th>Full Name</th>
                            <th>Sex</th>
                            <th>Age</th>
                            <th>Date of Birth</th>
                            <th>Home Address</th>
                            <th>Contact Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deletedParticipant as $participant)
                        <tr>
                            <td>  
                              <form id="restore-participant-info" action="{{ route('restore.participant.data', ['id'=> $participant->participant_id ]) }}" method="POST" style="display: none;">
                                @csrf
                              </form>
                              <a href="#" data-toggle="modal" data-target="#restoreInformation">
                                <button type="button" class="d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                    <i class="fas fa-trash-restore-alt"></i> Restore
                                </button>
                              </a>
                            </td>
                            <td>{{$participant->full_name}}</td>
                            <td>{{$participant->sex}}</td>
                            <td>{{$participant->age}}</td>
                            <td>{{$participant->birth_date}}</td>
                            <td>{{$participant->home_address}}</td>
                            <td>{{$participant->contact}}</td>
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

{{-- Confirmation Modal --}}
<div class="modal fade" id="restoreInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">Select "Proceed" below if you want to restore participant data.</div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="#"
                onclick="event.preventDefault();
                document.getElementById('restore-participant-info').submit();">
                Proceed
              </a>
          </div>
      </div>
  </div>
</div>
@else 
  @include('error.404')
@endif
@endsection


