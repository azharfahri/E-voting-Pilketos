@extends('layouts.admin')
@section('content')
    <div class="container">
        <h3>Data Kandidat</h3>
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
                <a href="{{ route('admin.kandidat.create') }}" type="button" class="btn btn-primary">Tambah</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nomor Urut</th>
                            <th scope="col">Nama Ketua</th>
                            <th scope="col">Nama Wakil</th>
                            <th scope="col">Kelas Ketua</th>
                            <th scope="col">Kelas Wakil</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Visi</th>
                            <th scope="col">Misi</th>
                            <th scope="col">Foto Ketua</th>
                            <th scope="col">Foto Wakil</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($kandidat as $item)
                            <tr>
                                {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                <td>{{ $item->no_urut }}</td>
                                <td>{{ $item->nama_ketua }}</td>
                                <td>{{ $item->nama_wakil }}</td>
                                <td>{{ $item->kelasKetua->nama ?? '-' }}</td>
                                <td>{{ $item->kelasWakil->nama ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->periode->mulai_vote)->format('Y') ?? '-' }}</td>
                                <td title="{{ $item->visi }}">
                                    {{ \Illuminate\Support\Str::limit($item->visi, 50) }}
                                </td>
                                <td title="{{ $item->misi }}">
                                    {{ \Illuminate\Support\Str::limit($item->misi, 50) }}
                                </td>

                                <td>
                                    @if ($item->foto_ketua)
                                        <img src="{{ asset('storage/' . $item->foto_ketua) }}" width="60"
                                            height="60" style="object-fit: cover;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($item->foto_wakil)
                                        <img src="{{ asset('storage/' . $item->foto_wakil) }}" width="60"
                                            height="60" style="object-fit: cover;">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.kandidat.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Apa kamu yakin?')">
                                        <a href="{{ route('admin.kandidat.edit', $item->id) }}"
                                            class="btn btn-success btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                    </tbody>
                @empty
                    <tr>
                        <td align="center" colspan="12">
                            <h6>belum ada data</h6>
                        </td>
                    </tr>
                    @endforelse

                </table>
            </div>
        </div>
    </div>
@endsection
