@extends('layouts.admin')
@section('content')
    <h3>Tambah Kandidat</h3>
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

            <form action="{{ route('admin.kandidat.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{-- No Urut --}}
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="no_urut" value="{{ old('no_urut') }}" required>
                            <label>No Urut</label>
                        </div>
                    </div>

                    {{-- Data Ketua & Wakil --}}
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nama_ketua" value="{{ old('nama_ketua') }}"
                                required>
                            <label>Nama Ketua</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="id_kelas_ketua" required>
                                <option disabled selected>Pilih Kelas Ketua</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <label>Kelas Ketua</label>
                        </div>
                        <div class="mb-3">
                            <label>Foto Ketua</label>
                            <input type="file" class="form-control" name="foto_ketua" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nama_wakil" value="{{ old('nama_wakil') }}"
                                required>
                            <label>Nama Wakil</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="id_kelas_wakil" required>
                                <option disabled selected>Pilih Kelas Wakil</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <label>Kelas Wakil</label>
                        </div>
                        <div class="mb-3">
                            <label>Foto Wakil</label>
                            <input type="file" class="form-control" name="foto_wakil" required>
                        </div>
                    </div>

                    {{-- Periode, Visi, Misi --}}
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="id_periode" required>
                                <option disabled selected>Pilih Periode</option>
                                @foreach ($periode as $item)
                                    <option value="{{ $item->id }}">{{ $item->mulai_vote }}</option>
                                @endforeach
                            </select>
                            <label>Periode</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="visi" style="height: 100px" required>{{ old('visi') }}</textarea>
                            <label>Visi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="misi" style="height: 100px" required>{{ old('misi') }}</textarea>
                            <label>Misi</label>
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">
                            Simpan Kandidat
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
