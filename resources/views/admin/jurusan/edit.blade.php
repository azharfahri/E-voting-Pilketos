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
                            <li class="breadcrumb-item active">Ubah Jurusan</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Ubah Jurusan</h4>
            <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12"><br>
                        <div class="form-floating mb-3">
                            <input type="text" value="{{ $jurusan->nama }}" class="form-control" name="nama"
                                value="{{ old('nama') }}" required>

                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-md-flex align-items-center">
                            <div class="ms-auto mt-3 mt-md-0">
                                <button type="submit" class="btn btn-primary">
                                    <i></i>
                                    Ubah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
