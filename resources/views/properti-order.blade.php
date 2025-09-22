@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2><b>{{ $getProperti->nama_properti }} Order</b></h2>
        <div class="table-main table-responsive">
            <table class="table text-center table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Booking</th>
                        <th>Jam</th>
                        <th>Nama User</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($propertiOrder as $m)
                        <tr>
                            <td>{{ $m->tanggal }}</td>
                            <td>{{ $m->jam }}</td>
                            <td>
                                @foreach ($userOrder as $u)
                                    @if ($u->id == $m->id_user)
                                        {{ $u->username }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $m->created_at }}</td>
                            <td>{{ $m->status }}</td>
                            @if ($m->status == 'pending')
                                <td>
                                    <a class="badge badge-success" href="{{ route('acc', $m->id_order) }}">Acc</a>
                                </td>
                                <td>
                                    <a class="badge badge-danger" href="{{ route('cancel', $m->id_order) }}">Cancel</a>
                                </td>
                            @else
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
