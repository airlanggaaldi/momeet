@extends('layout')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <div class="container">
        <div class="table-main table-responsive">
            <table class="table table-responsive-md table-hover mt-3 text-center">
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Tempat</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ads</th>
                        <th scope="col">Data Order</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $m)
                        <tr>
                            <td>
                                <img src="{{ $m->gambar }}" alt="Image" width="100px">
                            </td>
                            <td>{{ "{$m->nama_properti}" }}</td>
                            <td>Rp. {{ "{$m->harga}" }}</td>
                            <td>
                                @for ($i = 0; $i < $m->rating; $i++)
                                    <i class="bi bi-star-fill" style="color: rgb(255, 217, 0)"></i>
                                @endfor
                            </td>
                            <td>
                                @if ($m->status == 'approved')
                                    <span class="badge badge-success">{{ $m->status }}</span>
                                @elseif ($m->status == 'pending')
                                    <span class="badge badge-warning">{{ $m->status }}</span>
                                @elseif ($m->status == 'reject')
                                    <span class="badge badge-danger">{{ $m->status }}</span>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($m->status == 'approved')
                                    {{-- @php
                                        $cek = true;
                                    @endphp
                                    @foreach ($iklan as $i)
                                        @if ($i->id_properti == $m->id_properti)
                                            <button type="button" class="btn btn-primary border-0"
                                                style="background-color: #8C52FF" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"> Ads </button>
                                            @php
                                                $cek = false;
                                                $id_properti = $m->id_properti;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if ($cek) --}}
                                    <a class="btn btn-primary border-0" style="background-color: #8C52FF"
                                        href="{{ route('ads', $m->id_properti) }} ">Ads</a>
                                    {{-- @endif --}}
                                @else
                                    <button class="btn btn-primary border-0" style="background-color: #8C52FF"
                                        disabled>Ads</button>
                                @endif
                            </td>
                            <td>
                                @if ($m->status == 'approved')
                                    <a class="btn btn-primary border-0" style="background-color: #8C52FF"
                                        href="{{ route('propertiOrder', $m->id_properti) }}">Order</a>
                                @else
                                    <button class="btn btn-primary border-0" style="background-color: #8C52FF"
                                        disabled>Order</button>
                                @endif
                            </td>
                            <td>
                                <a class="badge badge-warning" href="{{ route('updateForm', $m->id_properti) }}"><i
                                        class="bi bi-pencil-square"></i></a>
                            </td>
                            <td>
                                {{-- <a href="{{ route('destroy', $m->id_properti) }}"><i class="bi bi-x-lg"></i></a> --}}
                                <a class="badge badge-danger" href="{{ route('hapus', $m->id_properti) }}">
                                    <i class='bi bi-x-lg'></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-primary" style="background-color: #8C52FF" href="/add-properties">Add Property</a>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ads Sudah Ada!</h1>
                    <button type="button" class="btn-close border-0" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x"></i></button>
                </div>
                <div class="modal-body">
                    Ingin update ads atau menghapus?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-danger" style="color: white" href="">Hapus</a>
                    <a class="btn btn-warning" style="color: white" href="{{ route('hapusAds', $id_properti) }}">Edit</a>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
