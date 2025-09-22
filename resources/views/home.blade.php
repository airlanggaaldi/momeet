@extends('layout')

@section('content')
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> MoMeet</strong></h1>
                            <p class="m-b-40">Make Meetings Work</p>
                            <p><a class="btn hvr-hover" href="/order">Pesan Sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> MoMeet</strong></h1>
                            <p class="m-b-40">Make Meetings Work</p>
                            <p><a class="btn hvr-hover" href="/order">Pesan Sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> MoMeet</strong></h1>
                            <p class="m-b-40">Make Meetings Work</p>
                            <p><a class="btn hvr-hover" href="/order">Pesan Sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    {{-- User Dashboard --}}
    @auth
        @if (Auth::user()->akses == 'customer' || Auth::user()->akses == 'admin')
            <div class="product-box">
                <div class="container mt-4">
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="products-single fix">
                                <h3>
                                    <b>Data Reservasi</b>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- coba --}}

            <div class="grey-bg container">
                <section id="minimal-statistics">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="bi bi-hourglass-top danger font-large-2 float-left"
                                                    style="margin-top: -1rem; margin-bottom: -1rem;"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h1><b>{{ $notReserved }}</b></h1>
                                                <span>Belum Dibayar</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="bi bi-database-check primary font-large-2 float-left"
                                                    style="margin-top: -1rem; margin-bottom: -1rem;"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h1><b>{{ $hasReserved }}</b></h1>
                                                <span>Sudah Dibayar</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="bi bi-calendar2-check light font-large-2 float-left"
                                                    style="margin-top: -1rem; margin-bottom: -1rem; color: rgb(139, 195, 247)"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h1><b>{{ $hasCompleted }}</b></h1>
                                                <span>Sudah Selesai</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="bi bi-cash-coin warning font-large-2 float-left"
                                                    style="margin-top: -1rem; margin-bottom: -1rem;"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h1>Rp. <b>{{ $pengeluaran }}</b></h1>
                                                <span>Total Pengeluaran</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            {{-- end coba --}}
        @elseif (Auth::user()->akses == 'provider')
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col text-center">
                        <h3><b> Laporan Reservasi Hari ini </b></h3>
                    </div>
                </div>
                <div class="row">
                    @foreach ($propertyProvider as $p)
                        <div class="col-sm-4 mb-4 mb-sm-0">
                            <div class="card mb-1">
                                <div class="card-body">
                                    <h4 class="card-title"><b>{{ $p->nama_properti }}</b></h4>
                                    <p class="card-text">
                                        @php
                                            $properti = App\Models\Order::where('status', 'accepted')
                                                ->where('id_properti', $p->id_properti)
                                                ->where('tanggal', Carbon\Carbon::today())
                                                ->count();
                                            $properti += App\Models\Order::where('status', 'completed')
                                                ->where('id_properti', $p->id_properti)
                                                ->where('tanggal', Carbon\Carbon::today())
                                                ->count();
                                        @endphp
                                        {{ $properti }} Reserved
                                    </p>
                                    <h1>
                                        @php
                                            $harga = $properti * $p->harga;
                                        @endphp
                                        Rp. {{ $harga }}
                                    </h1>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="product-box">
                <div class="container mt-4 mb-4 text-center ">
                    <h3><b> Laporan Pendapatan </b></h3>
                    <div class="row">
                        <div class="col-sm-6 mb-2 mb-sm-0">
                            <div class="card mb-1">
                                <div class="card-body">
                                    <h4 class="card-title"><b>Harian</b></h4>
                                    <div class="chart">
                                        <canvas id="dayChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                                <div class="container">
                                    <table class="table table-sm-5">
                                        <thead>
                                            <tr>
                                                <th>Properti</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataHarian as $i)
                                                @if ($i->properties->first()->id_user == Auth::id())
                                                    <tr>
                                                        <td>{{ $i->properties->first()->nama_properti }}</td>
                                                        <td>{{ $i->properties->first()->harga }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2 mb-sm-0">
                            <div class="card mb-1">
                                <div class="card-body">
                                    <h4 class="card-title"><b>Bulanan</b></h4>
                                    <div class="chart">
                                        <canvas id="monthChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                                <div class="container">
                                    <table class="table table-sm-5">
                                        <thead>
                                            <tr>
                                                <th>Properti</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataBulanan as $i)
                                                @if ($i->properties->first()->id_user == Auth::id())
                                                    <tr>
                                                        <td>{{ $i->properties->first()->nama_properti }}</td>
                                                        <td>{{ $i->properties->first()->harga }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="product-box">
                <div class="container mt-4 mb-4 text-center ">
                    <h3><b> Rekap Semua Properti </b></h3>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Properti</th>
                                <th>Total Pesanan</th>
                                <th>Total Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($propertyProvider as $p)
                                <tr>
                                    <td>{{ $p->nama_properti }}</td>
                                    <td>
                                        {{ $totalPesananProperti[$i] }}
                                    </td>
                                    <td>
                                        @php
                                            $totalPendapatan = $totalPesananPropertiSelesai[$i] * $p->harga;
                                        @endphp
                                        Rp. {{ $totalPendapatan }}
                                    </td>
                                </tr>
                                @php
                                    $i += 1;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if (Auth::user()->akses == 'admin')
            <hr>
            {{-- revenue --}}
            <div class="container mt-5 mb-5">
                <div class="row">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($semuaProperti as $s)
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card mb-1">
                                <div class="card-body">
                                    <h4 class="card-title"><b>{{ $s->nama_properti }}</b></h4>
                                    <p class="card-text">
                                        {{ $pesananSemua[$i] }} Reserved
                                    </p>
                                    <h1>
                                        @php
                                            $totalPendapatan = $pesananSemuaSelesai[$i] * $s->harga;
                                        @endphp
                                        Rp. {{ $totalPendapatan }}
                                    </h1>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div>
                        @php
                            $i += 1;
                        @endphp
                    @endforeach
                </div>
            </div>
        @endif
    @endauth

    <div class="box-add-products">
        <div class="container">
            <div class="row">
                @foreach ($ads as $a)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="offer-box-products">
                            <a href="{{ route('booking', $a->id_properti) }}">
                                <img class="img-fluid" src="{{ $a->poster }}" alt="{{ $a->id_properti }}"
                                    style="width: 600px; height: 300px; object-fit: cover;" />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Best Seller  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Most Popular</h1>
                        <p>Tempat yang paling direkomendasiin nihh!!</p>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @foreach ($popular as $p)
                    @foreach ($property as $m)
                        @if ($p->id_properti == $m->id_properti)
                            <div class="col-lg-4 col-md-7 col-sm-9 special-grid best-seller">
                                <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <div class="type-lb">
                                            <p class="new">{{ $p->total_order }} Orders</p>
                                        </div>
                                        <img src="{{ $m->gambar }}" class="img-fluid"
                                            style="width: 100%; height: 100%; object-fit: cover;" alt="Image">
                                        <div class="mask-icon">
                                            {{-- <ul>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                        title="View"><i class="fas fa-eye"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                        title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            </ul> --}}
                                            <a class="cart"
                                                href="{{ route('booking', $m->id_properti) }}">Reservasi</a>
                                        </div>
                                    </div>
                                    <div class="why-text">
                                        <h4>{{ $m->nama_properti }}</h4>
                                        <h5>Rp. {{ number_format($m->harga) }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>

        </div>
    </div>
    <!-- End Products  -->
@endsection
