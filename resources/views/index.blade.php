<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FF5055">
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/vco.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VCO') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <!-- Custom fonts for this template-->
    <link href="{{asset('main/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{asset('main/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Overide styles-->
  <link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>
<body>
    <div id="app">
         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
             <div class="container">
                    <div class="flex-center position-ref full-height">
                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        <a class="navbar-brand " href="{{ url('/home') }}">Home</a>
                                    @else
                                        <a class="navbar-brand " href="{{ url('/') }}">
                                            {{ config('app.name', 'VCO') }}
                                        </a>
                                    @endauth
                                </div>
                            @endif
                            </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <button class="btn btn-sm btn-primary shadow-sm">
                                        Login
                                      </button>
                                </a>
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
                    
                </div>
              </nav>
              <!-- End of Topbar -->

              {{-- Welcome Page --}}
              <div class="container" >
                    <h1 class="text-center" style="padding-bottom:2vmin; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight:bolder; color:#FF5055;">Welcome! Please login to start encoding</h1>
                    <img src="{{asset('asset/undraw_medical_care_movn.svg')}}" style="width:100%;">
                    <p><small>Illustration by :<a style="text-decoration:none; color:#FF5055;" href="https://undraw.co/"> undraw</a></small></p>
              </div>
    
    </div>

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


    <!-- Bootstrap core JavaScript-->
  <script src="{{asset('main/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('main/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('main/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('main/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('main/vendor/chart.js/Chart.min.js')}}"></script>
    
</body>
</html>
