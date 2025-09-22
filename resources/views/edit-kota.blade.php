@extends('layout')

@section('content')
    <div class="wishlist-box-main">
        <div class="container">
            <div class="row">
                <div class="table-main table-responsive">
                    <a href="/kota" class=""> <i class="bi bi-arrow-left-circle-fill"></i>back </a>
                    <h2><b>Update Nama Kota</b></h2>
                </div>
                <div class="container mt-2 mb-1">
                    <form action="{{ route('doEditKota', $id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="input-group flex-nowrap mb-1">
                            <input type="text" class="form-control col-md-6 mb-1" placeholder="Nama Kota"
                                aria-label="Nama Kota" aria-describedby="addon-wrapping" name="nama_kota"
                                value="{{ $all->nama_kota }}">
                        </div>
                        <button type="submit" class="btn hvr-hover" style="color: #ffff">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
