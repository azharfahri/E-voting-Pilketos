@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Data</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Halaman</a></li>
                            <li class="breadcrumb-item active">Tambah kelas</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Tambah kelas</h4>
            <form action="{{ route('admin.kelas.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12"><br>
                        <div class="form-floating mb-3">
                            <input type="text" placeholder="Masukan Nama kelas" class="form-control" name="nama"
                                value="{{ old('nama') }}" required>

                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="id_jurusan">
                                <option disabled selected>Pilih Jurusan</option>
                                @foreach ($jurusan as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-md-flex align-items-center">
                            <div class="ms-auto mt-3 mt-md-0">
                                <button type="submit" class="btn btn-primary">
                                    <i></i>
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
