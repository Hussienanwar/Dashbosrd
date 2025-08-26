<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Matrix Admin Lite Free Versions Template by WrapPixel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}" />
    <!-- Custom CSS -->
    <link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/dataTables.bootstrap4.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
    @livewireStyles
</head>

<body>
    

<nav class="navbar navbar-expand-lg bg-body-tertiary p-2 ">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <!-- اللوجو -->
    <img src="{{ asset('assets/images/logo1.png') }}" alt="Logo">

    <!-- زرار التوجّل للموبايل -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- اللينكات في النص -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto gap-4">
        <li class="nav-item ">
          <a class="nav-link " aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('allproducts') }}">All Product</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('toprated') }}">Top rated </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li>
      </ul>
    </div>

    <!-- البحث + المفضلة + الكارت + البروفايل -->
    <div class="d-flex align-items-center gap-4">

      <!-- Search -->
      <div class="position-relative" style="width:150px;">
        <input type="text" class="form-control pe-5" placeholder="Search">
        <button id="searchBtn" type="button"
          class="btn border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y me-2 p-0 icon-hover">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
            class="bi bi-search" viewBox="0 0 16 16">
            <path
              d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 
                 3.85a1 1 0 0 0 1.415-1.415l-3.85-3.85zm-5.242 
                 1.106a5 5 0 1 1 0-10 5 5 0 0 1 0 10z" />
          </svg>
        </button>
      </div>

      <!-- Favorite -->
      <a href="{{ route('favorites') }}" class="nav-link d-flex align-items-center icon-hover">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" 
             class="bi bi-heart" viewBox="0 0 16 16">
          <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 
                   3.053c-.523 1.023-.641 2.5.314 
                   4.385.92 1.815 2.834 3.989 6.286 
                   6.357 3.452-2.368 5.365-4.542 
                   6.286-6.357.955-1.885.838-3.362.314-4.385C13.486.878 
                   10.4.28 8.717 2.01L8 2.748z"/>
          <path d="M8 15C-7.333 4.868 3.279-3.04 7.824 
                   1.143c.06.055.119.112.176.171a3.12 
                   3.12 0 0 1 .176-.17C12.72-3.042 
                   23.333 4.867 8 15z"/>
        </svg>
      </a>

      <!-- Cart -->
      <a href="{{ route('cart') }}" class="nav-link d-flex align-items-center icon-hover">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" 
             class="bi bi-cart" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 
                   1h1a.5.5 0 0 1 .485.379L2.89 
                   6H14.5a.5.5 0 0 1 
                   .491.592l-1.5 8A.5.5 0 0 1 
                   13 15H4a.5.5 0 0 1-.491-.408L1.01 
                   2H.5a.5.5 0 0 1-.5-.5zM3.102 
                   7l1.313 7h8.17l1.313-7H3.102z"/>
          <path d="M5 12a2 2 0 1 0 0 
                   4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 
                   0 4 2 2 0 0 0 0-4zm-7 
                   1a1 1 0 1 1 0 2 1 1 0 0 
                   1 0-2zm7 0a1 1 0 1 1 0 
                   2 1 1 0 0 1 0-2z"/>
        </svg>
      </a>

      <!-- Profile Dropdown -->
    
<div class="auth">
 @if (Route::has('login'))
    @auth
  <div class="d-flex align-items-center gap-2">
    @if(auth()->user()->role == 1)
        <a href="{{ url('dashboard') }}" class="btn btn-outline-success">Dashboard</a>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    @else
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center gap-1 text-decoration-none icon-hover"
               href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>{{ auth()->user()->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                     class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd"
                          d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 
                          11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 
                          5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('profile') }}">My Account</a></li>
                <li><a class="dropdown-item" href="{{ route('settings') }}">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    @endif
</div>


  



    @else
      <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('login') }}" class="btn btn-success">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-success">Register</a>
      </div>
     @endauth
    @endif
</div>
    </div>
  </div>
</nav>




        <div class="page-wrapper ">

            @yield('content')

            <!-- footer -->
<!-- Footer Section -->
<footer class="footer text-center py-4 bg-dark text-light">
  <p class="mb-2">
    © 2025 | Designed & Developed by <strong>Hussien</strong> - Team <strong>Ra3d</strong> 🚀
  </p>

  <div class="d-flex justify-content-center gap-3">
    <a href="https://www.facebook.com/hussein.anwar.719/" class="text-light fs-5 social-icon"><i class="fab fa-facebook-f"></i></a>
    <a href="https://www.instagram.com/hussein.anwar.719" class="text-light fs-5 social-icon"><i class="fab fa-instagram"></i></a>
    <a href="https://github.com/Hussienanwar" class="text-light fs-5 social-icon"><i class="fab fa-github"></i></a>
    <a href="https://www.linkedin.com/in/hussein-anwar-888303372/" class="text-light fs-5 social-icon"><i class="fab fa-linkedin-in"></i></a>
    <a href="https://wa.me/+201202145780?text=" class="text-light fs-5 social-icon"><i class="fab fa-whatsapp"></i></a>
  </div>
</footer>
            <!-- End footer -->

        </div>
        <!-- End Page wrapper -->
    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
    @livewireScripts
    <!-- ============================================================== -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/js/waves.js')}}"></script>

    <script src="{{asset('assets/js/home.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/js/custom.min.js')}}"></script>

    <!-- this page js -->
    <script src="{{asset('assets/js/datatables.min.js')}}"></script>

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
    </script>

</body>

</html>
