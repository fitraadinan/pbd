
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERC</title>

    <link rel="stylesheet" href="{{ asset('desain/admin/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('desain/admin/assets/vendors/chartjs/Chart.min.css') }}">

    <link rel="stylesheet" href="{{ asset('desain/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('desain/admin/assets/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('desain/admin/assets/vendors/simple-datatables/style.css') }}">
</head>

<body>
    <div id="app">
        {{-- Menu --}}
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="{{ asset('desain/admin/assets/images/logo.svg') }}" alt="" srcset="">
                    CERC
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>



                        <li class="sidebar-item <?php if( $_SERVER["REQUEST_URI"]== "/club/"){
                            echo "active";
                        }
                            
                        ?>">
                            <a href="/" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>
                        <li class="sidebar-item" <?php if( $_SERVER["REQUEST_URI"]== "/club/modul/mahasiswa/"){
                            echo "active";
                        }
                            
                        ?>>
                            <a href="/modul/lab" class='sidebar-link'>
                                <i data-feather="airplay" width="20"></i>
                                <span>Lab</span>
                            </a>

                        </li>
                        <li class="sidebar-item">
                            <a href="/modul/club" class='sidebar-link'>
                                <i data-feather="archive" width="20"></i>
                                <span>Club</span>
                            </a>

                        </li>
                        <li class="sidebar-item ">
                            <a href="/modul/mahasiswa" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Mahasiswa</span>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="main">
            {{-- Navbar --}}
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                       
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="{{ asset('desain/admin/assets/images/avatar/avatar-s-1.png') }}" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">{{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                @yield('content')
            </div>
            
            {{-- Footer --}}

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                                    <!-- <div class="float-start">
                                        <p>2021 &copy; CERC</p>
                                    </div>
                                    <div class="float-end">
                                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                                                href="#">CERC</a></p>
                                    </div> -->
                                    <div class="float-start">
                                        <p>2021 &copy; CERC</p>
                                    </div>
                                    <div class="float-end">
                                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                                                href="#">CERC</a></p>
                                    </div>
                                </div>
                            </footer>             
                            <script src="{{ asset('desain/admin/assets/js/feather-icons/feather.min.js') }}"></script>
                    <script src="{{ asset('desain/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
                    <script src="{{ asset('desain/admin/assets/js/app.js') }}"></script>
                
                    <script src="{{ asset('desain/admin/assets/vendors/chartjs/Chart.min.js') }}"></script>
                    <script src="{{ asset('desain/admin/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
                    <script src="{{ asset('desain/admin/assets/js/pages/dashboard.js') }}"></script>
                
                    <script src="{{ asset('desain/admin/assets/js/main.js') }}"></script>
                    
                    <script src="{{ asset('desain/admin/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
                    
        </div>
    </div>

</body>

</html>