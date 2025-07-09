@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Analytics</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dastyle</a></li>
                            <li class="breadcrumb-item active">Kelas</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kelas</h4>
                    </div>


                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert icon-custom-alert alert-outline-success" role="alert">
                                <i class="mdi mdi-check-all alert-icon"></i>
                                <div class="alert-text">
                                    {{ session('success') }}
                                </div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="mdi mdi-close text-success font-16"></i></span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <a href="{{ route('admin.kelas.create') }}" type="button" class="btn btn-primary">Tambah</a>
                        <table class="table">

                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            @forelse ($kelas as $data)
                            <tbody>

                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->jurusan->nama }}</td>
                                        <td>
                                            <form action="{{ route('admin.kelas.destroy', $data->id) }}" method="POST">
                                                <a href="{{ route('admin.kelas.edit', $data->id) }}" type="button"
                                                    class="btn btn-success">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td>
                                        <h6>Data masih kosong</h6>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
