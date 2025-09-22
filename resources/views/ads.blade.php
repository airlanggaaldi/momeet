@extends('layout')

@section('content')
    <div class="container mt-3">
        <a href="/properties" class=""> <i class="bi bi-arrow-left-circle-fill"></i>back </a>
        <h2><b>Ads Properti</b></h2>
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="image" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"> <img class="d-block w-100" src="{{ $property->gambar }}"
                                alt="First slide"> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="needs-validation">
                    <input type="text" class="form-control col-md-6 mb-1" name="nama_properti"
                        placeholder="Nama Property" value="{{ $property->nama_properti }}" disabled>
                    <input type="text" class="form-control col-md-6 mb-1" name="harga" placeholder="Harga"
                        value="{{ $property->harga }}" disabled>
                    <input type="text" class="form-control col-md-6 mb-1" name="kapasitas" placeholder="Kapasitas"
                        value="{{ $property->kapasitas }}" disabled>
                    <textarea class="form-control col-md-6 mb-1" name="deskripsi" placeholder="Spesifikasi" disabled>{{ $property->deskripsi }}</textarea>
                    <label class="control-label">Jenis Properti </label> <br>
                    <div class="form-check form-check-inline mb-1">
                        <input type="radio" class="form-check-input" name="jenis_properti" id="cafe" value="cafe"
                            {{ $property->jenis_properti === 'cafe' ? 'checked' : '' }} disabled>
                        <label class="form-check-label mr-4" for="cafe">
                            Cafe
                        </label>
                        <input type="radio" class="form-check-input" name="jenis_properti" id="hotel" value="hotel"
                            {{ $property->jenis_properti === 'hotel' ? 'checked' : '' }} disabled>
                        <label class="form-check-label mr-4" for="hotel">
                            Hotel
                        </label>
                        <input type="radio" class="form-check-input" name="jenis_properti" id="restaurant"
                            value="restaurant" {{ $property->jenis_properti === 'restaurant' ? 'checked' : '' }} disabled>
                        <label class="form-check-label" for="restaurant">
                            Restaurant
                        </label>
                    </div>
                    <div class="mb-1">
                        <label for="kota" class="control-label">Kota Lokasi </label><br>
                        <select name="kota" id="kota" disabled>
                            @foreach ($kota as $k)
                                {{-- <option value="{{ "{$k->id_kota}" }}" {{ $property->kota === '{{ "{$k->id_kota}" }}'
                                ? 'Selected' : '' }}>
                                {{ "{$k->nama_kota}" }}</option> --}}
                                <option value="{{ $k->id_kota }}"
                                    {{ $property->id_kota === $k->id_kota ? 'Selected' : '' }}>
                                    {{ $k->nama_kota }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-3">
            <div class="col-xl-9 col-lg-9 col-md-6">
                <form action="{{ route('addAds', $property->id_properti) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        @foreach ($errors->all() as $c_error)
                            <div>{{ $c_error }}</div>
                        @endforeach
                    @endif
                    <div class="single-product-details mb-1">
                        <ul class="mb-1">
                            <li>
                                <label class="control-label mb-0">Upload Poster Iklan</label><br>
                                <div class="form-check-inline mb-2 ">
                                    <input onchange="previewImg()" id="img" type="file"
                                        class="form-control-sm mb-1 mr-3" name="poster">
                                    <img class="img-preview mt-1 mb-1" src=""
                                        style="width: 350px; height: 200px; object-fit: cover; display: none;">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div style="color: red">
                        Harga Ads 500.000/bulan:
                        <a href="https://wa.me/082335958933" target="_blank">
                            <u>KONFIRMASI PEMBAYARAN ANDA</u>
                        </a>
                    </div>
                    <input type="submit" class="btn hvr-hover col-md-12 mb-1" style="color: white" placeholder="Kapasitas">
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewImg() {
            const image = document.querySelector('#img');
            const imgPreview = document.querySelector('.img-preview')

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
