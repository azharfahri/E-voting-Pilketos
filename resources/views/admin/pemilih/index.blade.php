@extends('layouts.admin')
@section('content')
    <div class="container">
        <h3>Data pemilih</h3>
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
                <a href="{{ route('admin.pemilih.create') }}" type="button" class="btn btn-primary">Tambah</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($pemilih as $item)
                            <tr>
                                <th scope="row">
                                    {{ $loop->iteration + ($pemilih->currentPage() - 1) * $pemilih->perPage() }}</th>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kelas?->nama }}</td>
                                <td>{{ $item->kelas?->jurusan->nama }}</td>
                                @if ($item->status_pemilih === 'sudah memilih')
                                <td><span class="badge bg-success-subtle text-success">Sudah Memilih</span></td>
                                @else
                                <td><span class="badge bg-danger-subtle text-danger">Belum Memilih</span></td>
                                @endif
                                <td>
                                    <form action="{{ route('admin.pemilih.destroy', $item->id) }}" method="POST">
                                        <a href="{{ route('admin.pemilih.edit', $item->id) }}" type="button"
                                            class="btn btn-success">Edit</a>
                                        {{-- <a href="#" type="button" class="btn btn-warning">Show</a> --}}

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apa kamu yakin?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                @empty
                    <tr>
                        <td align="center" colspan="6">
                            <h6>belum ada data</h6>
                        </td>
                    </tr>
                    @endforelse

                </table>
                <div class="d-flex justify-content-center mt-4">
                    {{ $pemilih->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
