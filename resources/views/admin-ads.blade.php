@extends('layout')

@section('content')
    <div class="container mt-2">
        <h2><b>Approve Ads</b></h2>
        <div>
            <table class="table table-hover text-center">
                <thead class="thead">
                    <tr>
                        <th>Poster</th>
                        <th>Nama Properti</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ads as $a)
                        <tr>
                            <td>
                                <img src="{{ $a->poster }}" alt=""
                                    style="width: 200px; height: 100px; object-fit: cover;">
                            </td>
                            <td>
                                @foreach ($property as $p)
                                    @if ($p->id_properti == $a->id_properti)
                                        {{ $p->nama_properti }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if ($a->status == 'pending')
                                    <a href="{{ route('approvingAds', $a->id_iklan) }}"
                                        class="badge badge-success">Approve</a>
                                    <a href="{{ route('rejectingAds', $a->id_iklan) }}" class="badge badge-danger">Reject</a>
                                @elseif ($a->status == 'approve')
                                    <div class="badge badge-success">{{ $a->status }}</div>
                                @elseif ($a->status == 'reject')
                                    <div class="badge badge-danger">{{ $a->status }}</div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('hapusAds', $a->id_iklan) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
