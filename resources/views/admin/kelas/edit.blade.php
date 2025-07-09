@extends('layouts.admin')
@section('content')
<h3>Ubah kelas</h3>

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12"><br>
                        <div class="form-floating mb-3">
                            <input type="text" value="{{ $kelas->nama }}" class="form-control" name="nama"
                                value="{{ old('nama') }}" required>
                                <label for="tb-name">Nama Kelas</label>
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="id_jurusan">
                                <option disabled selected>Pilih Jurusan</option>
                                @foreach ($jurusan as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $kelas->id_jurusan == $data->id ? 'selected' : '' }}>
                                        {{ $data->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="tb-name">Jurusan</label>
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
