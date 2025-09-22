@extends('layout')

@section('content')
    <!-- Start Gallery  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Pilihan Reservasi</h1>
                        <p>Tentukan properti terbaik anda dengan mudah, untuk pengalaman yang tak terlupakan.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".cafe">Cafe</button>
                            <button data-filter=".hotel">Hotel</button>
                            <button data-filter=".restaurant">Restaurant</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @foreach ($all as $m)
                    {{-- <li><a href="{{ route('show', $m->id) }}">{{ "{$m->nama_properti}" }}</a></li> --}}
                    <div class="col-lg-3 col-md-6 special-grid {{ "{$m->jenis_properti}" }}">
                        <div class="products-single fix ">
                            <div class="type-lb">
                                <p class="new">{{ $m->nama_properti }}</p>
                            </div>
                            <div class="box-img-hover">
                                <img src="{{ $m->gambar }}" class="img-fluid"
                                    style="width: 100%; height: 100%; object-fit: cover;" alt="Image">
                                <div class="mask-icon">
                                    {{-- <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                                    class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul> --}}
                                    <a class="cart" href="{{ route('booking', $m->id_properti) }}">Reservasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Gallery  -->
@endsection
