@extends('layouts.admin')
@section('content')
    <div class="container">
        <h3>Data pemilih</h3>
        <div class="card">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="{{ route('admin.pemilih.create') }}" type="button" class="btn btn-primary">Tambah</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama pemilih</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                            @forelse ($pemilih as $item)
                            <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->kelas?->nama }}</td>
                            <td>
                                <form action="{{ route('admin.pemilih.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('admin.pemilih.edit', $item->id) }}" type="button" class="btn btn-success">Edit</a>
                                {{-- <a href="#" type="button" class="btn btn-warning">Show</a> --}}

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apa kamu yakin?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <h1>belum ada data</h1>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection

