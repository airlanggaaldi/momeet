@extends('layout')

@section('content')
    <div class="wishlist-box-main">
        <div class="container">
            <h2><b>Data Kota</b></h2>
            <div class="row mt-2">
                <div class="table-main table-responsive">
                    <table class="table text-center table-hover" style="justify-content: space-between; text-align: center;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kota</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach ($all as $m)
                                <tr>
                                    <td>
                                        {{ $no++ }}
                                    </td>
                                    <td>
                                        {{ $m->nama_kota }}
                                    </td>
                                    <td>
                                        <a class="badge badge-warning" href="{{ route('editKota', $m->id_kota) }}"><i
                                                class="bi bi-pencil-square"></i></a>
                                    </td>
                                    <td>
                                        <a class="badge badge-danger" href="{{ route('hapusKota', $m->id_kota) }}">
                                            <i class='bi bi-x-lg'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a class="btn hvr-hover" style="color: #ffffff" href="/add-kota">Tambah Kota</a>
        </div>
    </div>
@endsection
