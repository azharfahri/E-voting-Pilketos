@extends('layouts.admin')
@section('content')
    <h3>Edit Kandidat</h3>
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

            <form action="{{ route('admin.kandidat.update', $kandidat->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    {{-- No Urut --}}
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="no_urut" value="{{ $kandidat->no_urut }}" required>
                            <label>No Urut</label>
                        </div>
                    </div>

                    {{-- Ketua --}}
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nama_ketua" value="{{ $kandidat->nama_ketua }}" required>
                            <label>Nama Ketua</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="id_kelas_ketua" required>
                                <option disabled>Pilih Kelas Ketua</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}" {{ $kandidat->id_kelas_ketua == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Kelas Ketua</label>
                        </div>
                        <div class="mb-3">
                            <label>Foto Ketua (Kosongkan jika tidak diubah)</label>
                            <input type="file" class="form-control" name="foto_ketua">
                            @if ($kandidat->foto_ketua)
                                <img src="{{ asset('storage/' . $kandidat->foto_ketua) }}" width="100" class="mt-2 rounded">
                            @endif
                        </div>
                    </div>

                    {{-- Wakil --}}
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nama_wakil" value="{{ $kandidat->nama_wakil }}" required>
                            <label>Nama Wakil</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="id_kelas_wakil" required>
                                <option disabled>Pilih Kelas Wakil</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}" {{ $kandidat->id_kelas_wakil == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Kelas Wakil</label>
                        </div>
                        <div class="mb-3">
                            <label>Foto Wakil (Kosongkan jika tidak diubah)</label>
                            <input type="file" class="form-control" name="foto_wakil">
                            @if ($kandidat->foto_wakil)
                                <img src="{{ asset('storage/' . $kandidat->foto_wakil) }}" width="100" class="mt-2 rounded">
                            @endif
                        </div>
                    </div>

                    {{--  Visi, Misi --}}
                    <div class="col-md-12">

                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="visi" style="height: 100px" required>{{ $kandidat->visi }}</textarea>
                            <label>Visi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="misi" style="height: 100px" required>{{ $kandidat->misi }}</textarea>
                            <label>Misi</label>
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
