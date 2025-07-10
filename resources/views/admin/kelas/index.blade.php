@extends('layouts.admin')
@section('content')
    <div class="container">
        <h3>Data Kelas</h3>
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
                <a href="{{ route('admin.kelas.create') }}" type="button" class="btn btn-primary">Tambah</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($kelas as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jurusan->nama }}</td>
                                <td>
                                    <form action="{{ route('admin.kelas.destroy', $item->id) }}" method="POST">
                                        <a href="{{ route('admin.kelas.edit', $item->id) }}" type="button"
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
                        <td align="center" colspan="4">
                            <h6>belum ada data</h6>
                        </td>
                    </tr>
                    @endforelse

                </table>
            </div>
        </div>
    </div>
@endsection
