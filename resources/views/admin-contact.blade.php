@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2><b>Admin Cek Order</b></h2>
        <div class="table-main table-responsive">
            <table class="table text-center table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Contact</th>
                        <th>Email</th>
                        <th>Nama User</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contact as $m)
                        <tr>
                            <td>{{ $m->created_at }}</td>
                            @foreach ($user as $u)
                                @if ($u->id == $m->id_user)
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->username }}</td>
                                @endif
                            @endforeach
                            <td>{{ $m->pesan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
