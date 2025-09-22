@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2><b>Admin Cek Order</b></h2>
        <div class="table-main table-responsive">
            <table class="table text-center table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Booking</th>
                        <th>Jam</th>
                        <th>Nama User</th>
                        <th>Nama Properti</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status</th>
                        <th>Action</th>
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
                            <td>{{ $m->properties->first()->nama_properti }}</td>
                            <td>{{ $m->created_at }}</td>
                            <td>{{ $m->status }}</td>
                            <td>
                                <a class="badge badge-danger" href="{{ route('cancel', $m->id_order) }}">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
