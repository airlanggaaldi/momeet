<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>MoMeet</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico" type="image/x-icon') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/Chart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Chart.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="/home"><img src="{{ asset('images/logo.png') }}" class="logo"
                            alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="/order">Order</a></li>
                        @auth
                            <li class="nav-item"><a class="nav-link" href="/bookmark">Bookmark</a></li>
                        @endauth
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="#">
                                <i class="bi bi-person-circle"></i>
                                <span class="badge"></span>
                                <p>
                                    @auth
                                        {{ Auth::user()->username }}
                                    @else
                                        Login
                                    @endauth
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            {{-- <a href="#" class="photo"><img src="images/img-user.jpg" class="cart-thumb"
                                    alt="" /></a> --}}
                            <h3>
                                @auth
                                    <b>{{ Auth::user()->username }}</b>
                                @else
                                    -
                                @endauth
                            </h3>
                            <p>
                                @auth
                                    {{ Auth::user()->akses }}
                                @else
                                    -
                                @endauth
                            </p>
                        </li>
                        <li class="total">
                            @auth
                                @if (Auth::user()->akses == 'provider')
                                    <a href="{{ route('properties', Auth::user()->id) }}"
                                        class="btn btn-primary btn-cart mt-1"
                                        style="background-color: #8C52FF !important;">My
                                        Properties</a>
                                @elseif (Auth::user()->akses == 'admin')
                                    <a href="/status" class="btn btn-primary btn-cart mt-1"
                                        style="background-color: #8C52FF !important;">Approval</a>
                                    <a href="/kota" class="btn btn-primary btn-cart mt-1"
                                        style="background-color: #8C52FF !important;">Daftar Kota</a>
                                    <a href="/myOrder" class="btn btn-primary btn-cart mt-1"
                                        style="background-color: #8C52FF !important;">My Order</a>
                                    <a href="/adminOrder" class="btn btn-primary btn-cart mt-1"
                                        style="background-color: #8C52FF !important;">Cek All Order</a>
                                    <a href="/showContact" class="btn btn-primary btn-cart mt-1"
                                        style="background-color: #8C52FF !important;">Contact Us</a>
                                    <a href="/approveAds" class="btn btn-primary btn-cart mt-1"
                                        style="background-color: #8C52FF !important;">Ads</a>
                                @elseif (Auth::user()->akses == 'customer')
                                    <a href="/myOrder" class="btn btn-primary btn-cart mt-1"
                                        style="background-color: #8C52FF !important; ">My Order</a>
                                @endif
                                <a href="/logout" class="btn btn-danger btn-cart mt-1"
                                    style="background-color: red !important">LOG OUT</a>
                            @else
                                <a href="/" class="btn btn-default hvr-hover btn-cart">LOGIN</a>
                            @endauth
                            <!-- <span class="float-right"><strong>Total</strong>: $180.00</span> -->
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <form action="{{ route('order') }}" class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search" name="search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </form>
        </div>
    </div>
    <!-- End Top Search -->

    @yield('content')
    <br><br>
    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Social Media</h3>
                            <p>Ikuti sosial media kami.</p>
                            <ul>
                                <li><a href="https://www.facebook.com/profile.php?id=100094042145649"><i
                                            class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/momeet_info"><i class="fab fa-twitter"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="https://wa.me/082335958933"><i class="fab fa-whatsapp"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About MoMeet</h4>
                            <p> MoMeet adalah sebuah platform digital yang memungkinkan pengguna untuk
                                melakukan reservasi tempat untuk rapat seperti hotel, restoran, dan cafe. Aplikasi ini
                                dirancang untuk memberikan kemudahan dan kenyamanan bagi pengguna dalam merencanakan dan
                                mengatur tempat dan jadwal kegiatan mereka.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i><a
                                            href="https://maps.app.goo.gl/TvPfcSE3hp3fURH66
                                        ">
                                            Kompleks PT. Semen Indonesia (Persero) Tbk
                                            Jl. Veteran, Kb. Dalem, Sidomoro, Kec. Kebomas, Kabupaten Gresik, Jawa Timur
                                            61122 </a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a
                                            href="https://wa.me/082335958933">+6282335958933</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a
                                            href="mailto:momeet.info@gmail.com">momeet.info@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <!-- <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a>
        </p>
    </div> -->
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('js/inewsticker.js') }}"></script>
    <script src="{{ asset('js/bootsnav.js') }}"></script>
    <script src="{{ asset('js/images-loded.min.js') }}"></script>
    <script src="{{ asset('js/isotope.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('js/form-validator.min.js') }}"></script>
    <script src="{{ asset('js/contact-form-script.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/Chart.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/chart.umd.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>

    <script>
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        $(function() {
            $.get('http://127.0.0.1:8000/getProperty/', function(data) {
                // console.log(data)
                var label = []
                var harga = []

                for (let i = 0; i < data.length; i++) {
                    // console.log(Object.keys(data[i])[0])
                    label.push(Object.keys(data[i])[0])
                    harga.push(Object.values(data[i])[0])
                }

                // console.log(label)
                var donutChartCanvas = $('#dayChart').get(0).getContext('2d')

                var donutData = {
                    labels: label,
                    datasets: [{
                        data: harga,
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef',
                            '#3c8dbc'
                        ],
                    }]
                }
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })
            })
        })
    </script>
    <script>
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        $(function() {
            $.get('http://127.0.0.1:8000/getPropertyBulan/', function(data) {

                var label = []
                var harga = []

                for (let i = 0; i < data.length; i++) {
                    // console.log(Object.keys(data[i])[0])
                    label.push(Object.keys(data[i])[0])
                    harga.push(Object.values(data[i])[0])
                }
                // console.log(label)
                var donutChartCanvas = $('#monthChart').get(0).getContext('2d')

                var donutData = {
                    labels: label,
                    datasets: [{
                        data: harga,
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef',
                            '#3c8dbc'
                        ],
                    }]
                }
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })
            })
        })
    </script>
</body>

</html>
