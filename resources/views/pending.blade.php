@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2><b>Approve Properties</b></h2>
        <div class="row mt-2">
            <div class="col">
                <div class="table-main table-hover table-responsive">
                    <table class="table border-0" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama Tempat</th>
                                <th>Kapasitas </th>
                                <th>Jenis Properti </th>
                                <th>Deskripsi </th>
                                <th>Harga </th>
                                <th colspan="2">Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $m)
                                <tr>
                                    <td class="thumbnail-img">
                                        <img class="img-fluid" src="{{ $m->gambar }}" alt="" width="100px" />
                                    </td>
                                    <td>
                                        {{ $m->nama_properti }}
                                    </td>
                                    <td>
                                        {{ $m->kapasitas }}
                                    </td>
                                    <td>
                                        {{ $m->jenis_properti }}
                                    </td>
                                    <td>
                                        {{ $m->deskripsi }}
                                    </td>
                                    <td>
                                        {{ $m->harga }}
                                    </td>
                                    @if ($m->status == 'approved')
                                        <td colspan="2">
                                            <span class="badge badge-success">{{ $m->status }}</span>
                                        </td>
                                    @elseif ($m->status == 'reject')
                                        <td colspan="2">
                                            <span class="badge badge-danger">{{ $m->status }}</span>
                                        </td>
                                    @elseif ($m->status == 'pending')
                                        <td>
                                            <a class="badge badge-success" href="{{ route('approve', $m->id_properti) }}"><i
                                                    class="bi bi-check2-square"></i></a>
                                        </td>
                                        <td>
                                            <a class="badge badge-danger" href="{{ route('reject', $m->id_properti) }}">
                                                <i class='bi bi-x-lg'></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
