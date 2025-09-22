@extends('layout')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Bookmark</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="bookmark">Bookmark</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        @if (\Session::has('msgHapus'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('msgHapus') !!}</li>
                </ul>
            </div>
        @endif
        <div class="table-main table-responsive">
            <table class="table table-responsive-md table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Tempat</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookmark as $m)
                        @foreach ($property as $p)
                            @if ($m->id_properti == $p->id_properti)
                                <tr>
                                    <td>
                                        <img src="{{ $p->gambar }}" alt=""
                                            style="width: 200px; height: 100px; object-fit: cover;">
                                    </td>
                                    <td>{{ $p->nama_properti }}</td>
                                    <td>
                                        <a href="{{ route('hapusBookmark', $p->id_properti) }}"><i
                                                class="bi bi-x-lg"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            {{-- <a class="btn btn-primary" style="background-color: #8C52FF" href="/add-properties">Add Property</a> --}}
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
