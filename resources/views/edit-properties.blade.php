@extends('layout')

@section('content')
    <div class="container mt-3">
        <a href="/properties" class=""> <i class="bi bi-arrow-left-circle-fill"></i>back </a>
        <h2><b>Update Data Properti</b></h2>
        <div class="needs-validation">
            <form action="{{ route('updateProperties', $id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                @if ($errors->any())
                    @foreach ($errors->all() as $c_error)
                        <div>{{ $c_error }}</div>
                    @endforeach
                @endif
                <input type="text" class="form-control col-md-6 mb-1" name="nama_properti" placeholder="Nama Property"
                    value="{{ $property->nama_properti }}">
                <input type="text" class="form-control col-md-6 mb-1" name="harga" placeholder="Harga"
                    value="{{ $property->harga }}">
                <input type="text" class="form-control col-md-6 mb-1" name="kapasitas" placeholder="Kapasitas"
                    value="{{ $property->kapasitas }}">
                <textarea class="form-control col-md-6 mb-1" name="deskripsi" placeholder="Spesifikasi">{{ $property->deskripsi }}</textarea>
                <label class="control-label">Jenis Properti </label> <br>
                <div class="form-check form-check-inline mb-1">
                    <input type="radio" class="form-check-input" name="jenis_properti" id="cafe" value="cafe"
                        {{ $property->jenis_properti === 'cafe' ? 'checked' : '' }}>
                    <label class="form-check-label mr-4" for="cafe">
                        Cafe
                    </label>
                    <input type="radio" class="form-check-input" name="jenis_properti" id="hotel" value="hotel"
                        {{ $property->jenis_properti === 'hotel' ? 'checked' : '' }}>
                    <label class="form-check-label mr-4" for="hotel">
                        Hotel
                    </label>
                    <input type="radio" class="form-check-input" name="jenis_properti" id="restaurant" value="restaurant"
                        {{ $property->jenis_properti === 'restaurant' ? 'checked' : '' }}>
                    <label class="form-check-label" for="restaurant">
                        Restaurant
                    </label>
                </div>
                <div class="mb-1">
                    <label for="kota" class="control-label">Kota Lokasi </label><br>
                    <select name="kota" id="kota">
                        @foreach ($kota as $k)
                            {{-- <option value="{{ "{$k->id_kota}" }}" {{ $property->kota === '{{ "{$k->id_kota}" }}'
                                ? 'Selected' : '' }}>
                                {{ "{$k->nama_kota}" }}</option> --}}
                            <option value="{{ $k->id_kota }}" {{ $property->id_kota === $k->id_kota ? 'Selected' : '' }}>
                                {{ $k->nama_kota }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="single-product-details mb-1">
                    <ul class="col-md-6 mb-1">
                        <li>
                            <label class="control-label">Pilih Foto</label><br>
                            <img class="img-preview mt-1 mb-1" id="" src="{{ $property->gambar }}" alt=""
                                style="width: 150px; height: 150px;">
                            <input onchange="previewImg()" type="file" id="img" class="form-control mb-1"
                                name="gambar">
                        </li>
                    </ul>
                </div>
                <input type="submit" class="btn hvr-hover col-md-6 mb-1" style="color: white" placeholder="Kapasitas">
            </form>
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
