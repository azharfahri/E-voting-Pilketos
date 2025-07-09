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
                            <li class="breadcrumb-item active">Periode</li>
                        </ol>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>

    <div class="card">
        <div class="card-body">
            <h4>Tambah Waktu</h4>
            <form action="{{ route('admin.periode.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12"><br>
                        <div class="form-floating mb-3">
                            <label for="tb-name">Masukan Waktu Mulai Vote</label>
                            <input type="date" placeholder="Masukan Waktu Mulai Vote" class="form-control" name="mulai_vote"
                                value="{{ old('mulai_vote') }}" required>

                            @error('mulai_vote')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12"><br>
                        <div class="form-floating mb-3">
                            <label for="tb-name">Masukan Waktu Berakhir Vote</label>
                            <input type="date" placeholder="Masukan Waktu Selesai Vote" class="form-control" name="selesai_vote"
                                value="{{ old('selesai_vote') }}" required>

                            @error('selesai_vote')
                                {{ $message }}
                            @enderror
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
