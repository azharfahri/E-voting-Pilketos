@extends('layouts.admin')
@section('content')
<h3>Edit Jurusan</h3>
    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nama" value="{{ $jurusan->nama }}" required>
                            <label for="tb-name">Nama jurusan</label>
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
                                    submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
