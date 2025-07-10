@extends('layouts.admin')
@section('content')
<h3>Ubah kelas</h3>

    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12"><br>
                        <div class="form-floating mb-3">
                            <input type="text" value="{{ $kelas->nama }}" class="form-control" name="nama"
                                value="{{ old('nama') }}" required>
                                <label for="tb-name">Nama Kelas</label>
                            
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
