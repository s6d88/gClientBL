<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
     <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly-dashboard/1-0/css/orionicons.css">
    <!-- DataTables CSS -->
    <link href="{{ asset('css/addons/datatables.min.css') }}" rel="stylesheet">
    <!-- DataTables Select CSS -->
    <link href="{{ asset('css/addons/datatables-select.min.css') }}" rel="stylesheet">
     <!-- theme stylesheet-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly-dashboard/1-0/css/style.default.css" >
    <!-- datepicker -->
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly-dashboard/1-0/vendor/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <!-- Mys Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

</head>
<body>
  @guest
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white ">
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('register') }}">Register</a>
          </li>
        </ul>
      </nav>
 @else
             
  <header class="header">
    <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="{{ url('/home') }}" class="navbar-brand font-weight-bold text-uppercase text-base"> Dashboard</a>
      <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
        
        <li class="nav-item dropdown ml-auto">
          <a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <img src="https://d19m59y37dris4.cloudfront.net/bubbly-dashboard/1-0/img/avatar-6.jpg"  style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
          <div aria-labelledby="userInfo" class="dropdown-menu">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }} 
                
              </a>
            <div class="dropdown-divider"></div>
            
            <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
            </form>
              
            
            
             
          </div>
      
          
         





        </li>
      </ul>
    </nav>
  </header>

 @endguest




   

       
        @yield('content')

   


     <!-- DataTables JS -->
    <script href="{{ asset('js/addons/datatables.min.js') }}" ></script> 
    <!-- DataTables Select JS -->
     <script href="{{ asset('js/addons/datatables-select.min.js') }}"></script> 
    <!-- JQuery -->
    {{--<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
   --}}

    <!-- My Script- JavaScript --> 
     <!-- JavaScript files-->
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly-dashboard/1-0/vendor/jquery/jquery.min.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly-dashboard/1-0/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly-dashboard/1-0/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly-dashboard/1-0/js/front.js"></script>
    <script src="{{ asset('js/script.js') }}" ></script>
</body>
</html>
