@extends('layout')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main ">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="image" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{ $property->gambar }}"
                                    alt="First slide"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    @if (\Session::has('msg'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{!! \Session::get('msg') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @if (\Session::has('msgAdd'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('msgAdd') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="single-product-details">
                        <h2>{{ $property->nama_properti }}</h2>
                        <h5>
                            {{-- <del>Rp. 200.000</del> --}}
                            Rp. {{ number_format($property->harga) }}
                        </h5>
                        <p class="available-stock"><span> Kapasitas: {{ $property->kapasitas }}</span>
                        <p>
                        <h4>Spesifikasi:</h4>
                        <p>
                            {{ $property->deskripsi }}
                        </p>
                        <form class="newsletter-box" method="post"
                            action="{{ route('orderProperties', $property->id_properti) }}">
                            @csrf
                            <ul style="width: 350px">
                                <li>
                                    <label class="control-label">Jadwal Booking</label>
                                    <div class="form-group quantity-box form-check-inline">
                                        <input class="form-control mr-1" value="0" min="0" max="20"
                                            type="date" name="tanggal" style="width: 180px">
                                        <select class="form-control" style="width: 130px"
                                            aria-label="Default select example" name="jam">
                                            <option selected>Jam Booking</option>
                                            @for ($i = 8; $i <= 21; $i++)
                                                @if ($i < 10)
                                                    <option value="0{{ $i }}:00">0{{ $i }}:00</option>
                                                @else
                                                    <option value="{{ $i }}:00">{{ $i }}:00</option>
                                                @endif
                                            @endfor
                                        </select>
                                        {{-- <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input " type="radio" value="08:00"
                                                    name="jam">
                                                <label class="form-check-label">
                                                    08.00
                                                </label>
                                            </div>
                                        </td> --}}
                                    </div>
                                </li>
                            </ul>
                            <button class="btn hvr-hover" style="color: #ffff" type="submit">Order</button>
                        </form>
                        <a class="btn hvr-hover mt-1" style="color: #ffff;" data-fancybox-close=""
                            href="{{ route('addBookmark', $property->id_properti) }}"><i class="fas fa-heart"></i>Add to
                            bookmark</a>
                        <div class="price-box-bar mt-2">
                            <div class="cart-and-bay-btn">
                                {{-- <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i>
                                    Add to bookmark</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <table>
                        <thead>
                            <tr>
                                <th>

                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row my-5">
                <div class="card card-outline-secondary my-4">
                    <div style="width: 1140px" class="card-header">
                        <h2>Property Reviews</h2>
                    </div>
                    @foreach ($order as $p)
                        @if ($p->review != null || $p->review != '')
                            <div class="card-body" style="width: 1200px" back>
                                <div class="media">
                                    <div class="media-body mb-0">
                                        <p>
                                            @for ($i = 0; $i < $p->rating; $i++)
                                                <i class="bi bi-star-fill" style="color: rgb(255, 217, 0)"></i>
                                            @endfor
                                        </p>
                                        <p>
                                            {{ $p->review }}
                                        </p>
                                        <small class="text-muted mb-0">
                                            Posted by
                                            @foreach ($userOrder as $u)
                                                @if ($u->id == $p->id_user)
                                                    {{ $u->username }}
                                                @endif
                                            @endforeach
                                            on {{ $p->updated_at }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection
