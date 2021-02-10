
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#8645bf">
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/vco.png') }}">

  <title>{{ config('app.name', 'VCO') }}</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('main/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="{{asset('main/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Overide styles-->
  <link href="{{asset('css/custom.css')}}" rel="stylesheet">

  {{-- Toastr Alert Notification css --}}
  <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
              <a class="nav-link text-primary" href="{{url('/home')}}">
                <span>HOME</span>
              </a>
            </li>
            <li class="nav-item {{ Request::is('get-data') ? 'active' : '' }}">
              <a class="nav-link text-primary" href="{{url('/get-data')}}">
                <span>GET DATA</span>
              </a>
            </li>
            <li class="nav-item {{ Request::is('transmit') ? 'active' : '' }}">
              <a class="nav-link text-primary" href="{{url('/transmit')}}">
                <span>TRANSMISSION</span>
              </a>
            </li>
          </ul>
          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <div >
                <a id="status" class="nav-link text-success" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-wifi fa-2x" style="padding-right:2vmin;"></i>
                </a>
              </div>
            </li>

            {{-- <li class="nav-item">
              <div >
                <a href="http://202.90.141.86/vco-dash/public/index.php" class="nav-link text-primary" target="blank">
                  <button type="button" class="d-sm-inline-block btn btn-sm  btn-danger shadow-sm">
                      <i class="fas fa-eye"></i> View Dashboard
                  </button>
                </a>
              </div>
            </li>

            <li class="nav-item">
              <div >
                <a href="{{ route('cycle.menu')}}" class="nav-link text-primary">
                  <button type="button" class="d-sm-inline-block btn btn-sm  btn-danger shadow-sm">
                      <i class="fas fa-utensils"></i> Cycle Menu
                  </button>
                </a>
              </div>
            </li> --}}
            
            
            <!-- Version -->
            @include('inc.version')

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
                 @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                              </a>
                        </div>
                    </li>
                @endguest
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <main>
            @yield('content')
        </main>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('inc.footer')

      <!--Global Modal -->
      @include('inc.modal')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Wish to delete this line?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Please set the line no. to 500 - 5**. Thank you!</div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('main/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('main/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('main/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('main/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('main/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('main/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('main/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>


  <!-- Page level custom scripts -->
  <script type="text/javascript" src="{{ asset('js/pagination.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/tick.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/clone.js') }}"></script>
  <script type="text/javascript" src="{{ asset('main/js/demo/datatables-demo.js') }}"></script>

  {{-- Dropdown --}}
  <script type="text/javascript" src="{{ asset('js/dropdown.js') }}"></script>

  {{-- Open as window script --}}
  <script type="text/javascript" src="{{ asset('js/openwindow.js') }}"></script>

  {{-- Disable refresh (f5) --}}
  <script type="text/javascript" src="{{ asset('js/refresh.js') }}"></script>

  {{-- Validation --}}
  <script type="text/javascript" src="{{ asset('js/validation.js') }}"></script>

  {{-- Toastr alert notification script --}}
  <script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>

  {{-- Check if connected script --}}
  <script type="text/javascript" src="{{ asset('js/check_conn.js') }}"></script>

  {{-- Loading spinner show --}}
  <script type="text/javascript" src="{{ asset('js/loading.js') }}"></script>

  {{-- Auto compute age --}}
  <script type="text/javascript" src="{{ asset('js/dob.js') }}"></script>

  {{-- BMI --}}
  <script type="text/javascript" src="{{ asset('js/bmi.js') }}"></script>

  {{-- Participant ID --}}
  <script type="text/javascript" src="{{ asset('js/id.js') }}"></script>

  @yield('script')

  {{-- Remarks --}}
  <script type="text/javascript" src="{{ asset('js/remarks.js') }}"></script>

  {{-- Toastr alert session condition --}}
  @include('error.messages')
  
</body>

</html>

