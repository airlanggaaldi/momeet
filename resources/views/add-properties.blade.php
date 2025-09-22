@extends('layout')

@section('content')
    <div class="container mt-3">
        <a href="/properties" class=""> <i class="bi bi-arrow-left-circle-fill"></i>back </a>
        <h2><b>Tambah Data Properti</b></h2>
        <div class="needs-validation">
            <form action="{{ route('doAddProperties') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    @foreach ($errors->all() as $c_error)
                        <div>{{ $c_error }}</div>
                    @endforeach
                @endif
                <input type="text" class="form-control col-md-6 mb-1" name="nama_properti" placeholder="Nama Property">
                <input type="text" class="form-control col-md-6 mb-1" name="harga" placeholder="Harga">
                <input type="text" class="form-control col-md-6 mb-1" name="kapasitas" placeholder="Kapasitas">
                <textarea class="form-control col-md-6 mb-1" name="deskripsi" placeholder="Spesifikasi"></textarea>
                <label class="control-label">Jenis Properti </label> <br>
                <div class="form-check form-check-inline mb-1">
                    <input type="radio" class="form-check-input" name="jenis_properti" id="cafe" value="cafe">
                    <label class="form-check-label mr-4" for="cafe">
                        Cafe
                    </label>
                    <input type="radio" class="form-check-input" name="jenis_properti" id="hotel" value="hotel">
                    <label class="form-check-label mr-4" for="hotel">
                        Hotel
                    </label>
                    <input type="radio" class="form-check-input" name="jenis_properti" id="restaurant" value="restaurant">
                    <label class="form-check-label" for="restaurant">
                        Restaurant
                    </label>
                </div>
                <div class="mb-1">
                    <label for="kota" class="control-label">Kota Lokasi </label><br>
                    <select name="kota" id="kota">
                        @foreach ($kota as $k)
                            <option value="{{ "{$k->id_kota}" }}">{{ "{$k->nama_kota}" }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="single-product-details mb-1">
                    <ul class="col-md-6 mb-1">
                        <li>
                            <label class="control-label">Pilih Foto</label><br>
                            <img class="img-preview mt-1 mb-1" alt="" style="width: 150px; height: 150px;">
                            <input onchange="previewImg()" id="img" type="file" class="form-control mb-1"
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
