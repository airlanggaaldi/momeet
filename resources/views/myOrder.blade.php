@extends('layout')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <div class="container">
        <h2>My Order</h2>
        <div class="table-main table-responsive">
            <table class="table text-center table-hover">
                <thead>
                    <tr>
                        <th>Tanggal Booking</th>
                        <th>Jam</th>
                        <th>Nama Properti</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myOrder as $m)
                        <tr>
                            <td>{{ $m->tanggal }}</td>
                            <td>{{ $m->jam }}</td>
                            <td>{{ $m->properties->first()->nama_properti }}</td>
                            <td>{{ $m->created_at }}</td>
                            <td>{{ $m->status }}</td>
                            <td>
                                @if ($m->status == 'accepted')
                                    <a class="btn btn-success" href="{{ route('review', $m->id_order) }}">End</a>
                                @elseif ($m->status == 'pending')
                                    {{-- button modal --}}
                                    <button type="button" class="btn btn-primary border-0" style="background-color: #8C52FF"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"> Payment </button>
                                    {{-- modal --}}
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi
                                                        Pembayaran</h1>
                                                    <button type="button" class="btn-close border-0"
                                                        data-bs-dismiss="modal" aria-label="Close"><i
                                                            class="bi bi-x"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach ($users as $u)
                                                        @if ($m->properties->first()->id_user == $u->id)
                                                            <a href="https://wa.me/{{ $u->nomor_telp }}"
                                                                target="_blank">KONFIRMASI
                                                                PEMBAYARAN ANDA</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    {{-- <a class="btn btn-danger" style="color: white" href="">Hapus</a> --}}
                                                    {{-- <a class="btn btn-warning" style="color: white"
                                                        href="{{ route('hapusAds', $id_properti) }}">Edit</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
