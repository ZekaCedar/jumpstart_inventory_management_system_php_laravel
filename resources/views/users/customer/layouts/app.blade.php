<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <!-- DataTables CDN -->
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/keytable/2.8.0/css/keyTable.dataTables.min.css" rel="stylesheet">


    <!-- Favicon icon -->
    <link rel="icon" href="{{url('/assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{url('/assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{url('/assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="index.html" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">

                    @php
                    $role = Auth::user()->role;
                    @endphp

                    <!-- Show only for employee -->
                    @if($role == 'employee')

                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project"
                        class="nav-item active">
                        <a href="{{ route('employee#index')}}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <!-- Show only for employee -->
                    @endif
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project"
                        class="nav-item active">
                        <a href="{{ route('customer#index')}}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Point of Sale
                                (POS)</span></a>
                    </li>

                    <li class="nav-item pcoded-menu-caption">
                        <label>Category</label>
                    </li>

                    <form action="{{ route('customer#index')}}" method="GET">
                        <li data-username="Charts Morris" class="nav-item">

                            <input type="hidden" name="stock_item_category" id="stock_item_category" value="all">

                            <button type="submit" class="nav-link "
                                style=" background:0; border:0; color:white; width:100%; text-align:initial;"><span
                                    class="pcoded-micon"></span><span class="pcoded-mtext">All</span>
                            </button>
                        </li>
                    </form>

                    @php
                    $categories = DB::table('stocks')->get();
                    // echo $categories;
                    @endphp
                    @foreach($categories->unique('stock_item_category') as $category)
                    <form action="{{ route('customer#index')}}" method="GET">
                        <li data-username="Charts Morris" class="nav-item">

                            <input type="hidden" name="stock_item_category" id="stock_item_category" value="{{ $category->
                                stock_item_category}}">

                            <button type="submit" class="nav-link "
                                style=" background:0; border:0; color:white; width:100%; text-align:initial;"><span
                                    class="pcoded-micon"></span><span class="pcoded-mtext">{{ $category->
                                    stock_item_category}}</span>
                            </button>
                        </li>
                    </form>
                    @endforeach

                    {{-- <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-server"></i></span><span class="pcoded-mtext">Table</span></a>
                    </li> --}}

                    {{-- <li data-username="Maps Google" class="nav-item"><a href="map-google.html"
                            class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span
                                class="pcoded-mtext">Maps</span></a></li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Pages</label>
                    </li> --}}
                    {{-- <li
                        data-username="Authentication Sign up Sign in reset password Change password Personal information profile settings map form subscribe"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-lock"></i></span><span
                                class="pcoded-mtext">Authentication</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="auth-signup.html" class="" target="_blank">Sign up</a></li>
                            <li class=""><a href="auth-signin.html" class="" target="_blank">Sign in</a></li>
                        </ul>
                    </li>
                    <li data-username="Sample Page" class="nav-item"><a href="sample-page.html" class="nav-link"><span
                                class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span
                                class="pcoded-mtext">Sample page</span></a></li>
                    <li data-username="Disabled Menu" class="nav-item disabled"><a href="javascript:"
                            class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span
                                class="pcoded-mtext">Disabled menu</span></a></li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Jumpstart</span>
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            {{-- <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i
                            class="feather icon-maximize"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown">Dropdown</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:">Action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Another action</a></li>
                        <li><a class="dropdown-item" href="javascript:">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <div class="main-search">
                        <div class="input-group">
                            <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                            <a href="javascript:" class="input-group-append search-close">
                                <i class="feather icon-x input-group-text"></i>
                            </a>
                            <span class="input-group-append search-btn btn btn-primary">
                                <i class="feather icon-search input-group-text"></i>
                            </span>
                        </div>
                    </div>
                </li>
            </ul> --}}
            <ul class="navbar-nav ml-auto">
                {{-- <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown"><i
                                class="icon feather icon-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="javascript:" class="m-r-10">mark as read</a>
                                    <a href="javascript:">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-1.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>John Doe</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="assets/images/user/avatar-3.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="javascript:">show all</a>
                            </div>
                        </div>
                    </div>
                </li> --}}
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{ url('/assets/images/user/avatar-1.jpg')}}" class="img-radius"
                                    alt="User-Profile-Image">
                                <span>{{ Auth::user()->name }}</span>

                            </div>
                            <ul class="pro-body">
                                {{-- <li><a href="javascript:" class="dropdown-item"><i
                                            class="feather icon-settings"></i> Settings</a></li> --}}
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-user"></i>
                                        Profile</a></li>
                                <li>
                                    <a class="dropdown-item" class="dud-logout" title="Logout"
                                        href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="feather icon-log-out"></i>Sign Out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                {{-- <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i>
                                        My Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i>
                                        Lock Screen</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Required Js -->
    <script src="{{url('/assets/js/vendor-all.min.js')}}"></script>
    <script src="{{url('/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('/assets/js/pcoded.min.js')}}"></script>
    <script src="{{url('/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="{{url('/assets/js/checkout-stripe.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')

    @if(Session::has('status'))
    <script>
        toastr.success("{!! Session::get('status') !!}");
    </script>
    @endif

</body>

</html>