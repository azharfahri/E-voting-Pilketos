@extends('layouts.admin')
@section('content')
    <div class="container">
        <h3>Suara</h3>
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Memilih</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @forelse ($suara as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kelas?->nama }}</td>
                                <td>{{ $item->kelas?->jurusan->nama }}</td>
                                <td>{{ $item->status_pemilih }}</td>
                            </tr>
                    </tbody>
                @empty
                    <tr>
                        <td align="center" colspan="6">
                            <h6>belum ada data</h6>
                        </td>
                    </tr>
                    @endforelse --}}

                </table>
            </div>
        </div>
    </div>
@endsection
