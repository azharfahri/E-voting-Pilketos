@extends('layouts.admin')
@section('content')
    <h3>Tambah Akun Pemilih</h3>
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
            <form action="{{ route('admin.pemilih.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                            <label for="tb-name">Masukan Nama pemilih</label>
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="nis" value="{{ old('nis') }}" required>
                            <label for="tb-name">Masukan nis</label>
                            @error('nis')
                                {{ $message }}
                            @enderror
                        </div>

                        {{-- <div class="form-floating mb-3">
                            <select class="form-select" name="id_kelas">
                                    <option disabled selected>Pilih Jurusan</option>

                                @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}">{{ $data->jurusan->nama }}</option>
                                @endforeach
                            </select>
                            <label for="tb-name">Jurusan</label>
                        </div> --}}
                        <div class="form-floating mb-3">
                            <select class="form-select" name="id_kelas">
                                @if ($kelas->count() == 0)
                                    <option disabled selected>Kelas belum ada, Tambah kelas terlebih dahulu</option>
                                @else
                                    <option disabled selected>Pilih Kelas</option>
                                @endif
                                @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            <label for="tb-name">Kelas</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="password" value="{{ old('password') }}"
                                required>
                            <label for="tb-name">Atur password</label>
                            @error('password')
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
