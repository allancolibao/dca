@extends('layouts.main')

@section('content')
<!-- Search Eacode -->
<div class="container-fluid" style="padding-bottom:59vmin;">
    
  <!-- Content Row -->
  <div class="row">
    
    <!-- Upload Membership Information -->
    <div class="col-xl-12 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-gray-800">General Information of the Participants</h6>
              <div class="btn-link">
                @if(Auth::user()->is_admin === 1)
                <a href="{{route('deleted.participants')}}">
                  <button class="btn btn-sm btn-warning shadow-sm">
                    <i class="fas fa-trash-restore-alt fa-fw"></i> View Deleted Participants
                  </button>
                </a>
                @endif
                <a href="{{route('add.participant')}}">
                  <button class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-user fa-fw"></i> Register Participant
                  </button>
                </a>
              </div>
          </div>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          @if(Auth::user()->is_admin === 1)
                            <th>Del</th>
                          @endif
                            <th>Edit</th>
                            <th>Forms</th>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Sex</th>
                            <th>Age</th>
                            <th>Date of Birth</th>
                            <th>Home Address</th>
                            <th>Contact Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participants as $participant)
                        <tr>
                          @if(Auth::user()->is_admin === 1)
                            <td>
                                <button data-path={{ route('participant.delete.modal', ['id'=>$participant->participant_id ])}} type="button" class="d-sm-inline-block btn btn-sm btn-danger shadow-sm open-modal">
                                  <i class="fas fa-trash"></i>
                                </button>
                            </td>
                          @endif
                            <td>  
                                <button data-path={{ route('participant.edit.modal', ['id'=>$participant->participant_id ])}} type="button" class="d-sm-inline-block btn btn-sm btn-dark shadow-sm open-modal">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </td>
                            <td>  
                              <a href="{{route('view.participant', ['id'=> $participant->participant_id, 'fullname'=> $participant->full_name, 'sex'=> $participant->sex, 'age'=> $participant->age ])}}">
                                <button type="button" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm ">
                                   <i class="fas fa-clipboard-list"></i>
                                </button>
                              </a>
                            </td>
                            <td>{{$participant->participant_id}}</td>
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
@endsection


