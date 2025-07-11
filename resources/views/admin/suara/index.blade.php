@extends('layouts.admin')
@section('content')
    <h1>Rekapan Suara</h1>
    {{-- Form Filter --}}
    <form method="GET" action="{{ route('admin.suara.index') }}" class="mb-4 d-flex gap-3 align-items-end">
        <div class="form-group">
            <label for="jurusan">Pilih Jurusan</label>
            <select name="jurusan" class="form-control">
                <option value="">Semua Jurusan</option>
                @foreach ($allJurusan as $j)
                    <option value="{{ $j->id }}" {{ $selectedJurusan == $j->id ? 'selected' : '' }}>
                        {{ $j->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kelas">Pilih Kelas</label>
            <select name="kelas" class="form-control">
                <option value="">Semua Kelas</option>
                @foreach ($allKelas as $k)
                    <option value="{{ $k->id }}" {{ $selectedKelas == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button class="btn btn-primary">Filter</button>
            <a href="{{ route('admin.suara.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>


    <div class="row mt-4">
        @foreach ($kandidat as $data)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <img src="{{ asset('storage/' . $data->foto_ketua) }}" alt="Foto Ketua"
                                class="rounded-circle me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <img src="{{ asset('storage/' . $data->foto_wakil) }}" alt="Foto Wakil Ketua"
                                class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
                        </div>
                        <h5 class="fw-bold mb-1">Paslon No. {{ $data->no_urut }}</h5>
                        <p class="mb-1">Ketua: <span class="text-primary fw-semibold">{{ $data->nama_ketua }}</span></p>
                        <p class="mb-1">Wakil: <span class="text-primary fw-semibold">{{ $data->nama_wakil }}</span></p>
                        <p class="mb-1">Kelas Ketua: <span class="text-dark">{{ $data->kelasKetua->nama }}</span></p>
                        <p class="mb-1">Kelas Wakil: <span class="text-dark">{{ $data->kelasWakil->nama }}</span></p>
                        <p class="mb-1">Periode: <span
                                class="text-dark">{{ \Carbon\Carbon::parse($data->periode->mulai_vote)->format('Y') }}</span>
                        </p>
                        <p class="mb-0">Jumlah Suara: <span class="fw-bold">{{ $data->jumlah_suara }}</span></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>





    <div class="row">
        {{-- KIRI: Rekap Jurusan --}}
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white fw-bold">
                    Rekap Voting Berdasarkan Jurusan
                </div>
                <div class="card-body">
                    @forelse ($jurusan as $jrs)
                        <h5 class="mt-3">Jurusan: {{ $jrs->nama }}</h5>

                        <p class="fw-bold text-success mb-0"> Sudah Memilih:</p>
                        @php $i = 1; @endphp
                        <ul>
                            @forelse ($jrs->kelas as $kls)
                                @foreach ($kls->user->where('status_pemilih', 'sudah memilih') as $user)
                                    <li>{{ $i++ }}. {{ $user->nama }} - {{ $kls->nama }}</li>
                                @endforeach
                            @empty
                                <li>Tidak ada data kelas</li>
                            @endforelse
                            @if ($i === 1)
                                <li>Belum ada yang memilih</li>
                            @endif
                        </ul>

                        <p class="fw-bold text-danger mb-0"> Belum Memilih:</p>
                        @php $j = 1; @endphp
                        <ul>
                            @forelse ($jrs->kelas as $kls)
                                @foreach ($kls->user->where('status_pemilih', 'belum memilih') as $user)
                                    <li>{{ $j++ }}. {{ $user->nama }} - {{ $kls->nama }}</li>
                                @endforeach
                            @empty
                                <li>Tidak ada data kelas</li>
                            @endforelse
                            @if ($j === 1)
                                <li>Belum ada data</li>
                            @endif
                        </ul>
                        <hr>
                    @empty
                        <p class="text-muted">Belum ada data jurusan.</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- KANAN: Rekap Kelas --}}
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white fw-bold">
                    Rekap Voting Berdasarkan Kelas
                </div>
                <div class="card-body">
                    @forelse ($kelas as $kls)
                        <h5 class="mt-3">Kelas: {{ $kls->nama }}</h5>

                        <p class="fw-bold text-success mb-0"> Sudah Memilih:</p>
                        @php $x = 1; @endphp
                        <ul>
                            @forelse ($kls->user->where('status_pemilih', 'sudah memilih') as $user)
                                <li>{{ $x++ }}. {{ $user->nama }}</li>
                            @empty
                                <li>Belum ada yang memilih</li>
                            @endforelse
                        </ul>

                        <p class="fw-bold text-danger mb-0"> Belum Memilih:</p>
                        @php $y = 1; @endphp
                        <ul>
                            @forelse ($kls->user->where('status_pemilih', 'belum memilih') as $user)
                                <li>{{ $y++ }}. {{ $user->nama }}</li>
                            @empty
                                <li>Belum ada data</li>
                            @endforelse
                        </ul>
                        <hr>
                    @empty
                        <p class="text-muted">Belum ada data kelas.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
