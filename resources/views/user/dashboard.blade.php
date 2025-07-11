<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ asset('smk.png') }}" />
    <title>Dashboard Pilketos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .votcard {
            border-radius: 10px;
            transition: 0.2s ease;
        }

        .votcard:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .votcard img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .kandidat-wrapper {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .fs-7 {
            font-size: 0.9rem;
        }

        .fs-8 {
            font-size: 0.8rem;
        }

        .section-title {
            margin-top: 40px;
        }

        .alert-success {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">E-Pilketos</a>

            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item me-3">
                        <span class="nav-link">
                            Hai, {{ Auth::guard('user')->user()->nama ?? 'Siswa' }}!
                        </span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-xl big-padding py-5">
        {{-- Pesan sukses dari redirect --}}
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        @if ($sudah_memilih)
            <div class="text-center my-5">
                <h2>Terima kasih, kamu sudah memilih</h2>
                <p>Kamu Sudah Memakai Hak Suaramu.</p>
            </div>

            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-3">
                        <h5 class="card-title fw-semibold mb-3">Hasil Vote Sementara</h5>
                        <canvas id="chartVote" style="height: 160px; max-height: 160px;" class="w-100"></canvas>
                    </div>
                </div>
            </div>
        @else
            <div class="row section-title">
                <h1 align="center">Silahkan Memilih</h1>
                <p>Pemilihan Ketua dan Wakil Ketua OSIS adalah momen penting bagi kita semua.
                    Pastikan kamu memilih pasangan kandidat yang memiliki visi dan misi terbaik untuk membawa OSIS ke
                    arah yang lebih aktif, kreatif, dan bermanfaat bagi seluruh siswa.
                    Satu suara kamu sangat berarti untuk kemajuan sekolah ini!</p>
            </div>

            <div class="row mt-5 mb-3 text-center">
                <h5>Daftar Kandidat Calon Ketua OSIS</h5>
            </div>

            <div class="row">
                @foreach ($kandidats as $data)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="text-center votcard bg-white p-4 pt-5 h-100 shadow-sm">
                            <div class="kandidat-wrapper mb-3">
                                <img class="rounded-circle shadow-sm" src="{{ asset('storage/' . $data->foto_ketua) }}"
                                    alt="Foto Ketua">
                                <img class="rounded-circle shadow-sm" src="{{ asset('storage/' . $data->foto_wakil) }}"
                                    alt="Foto Wakil Ketua">
                            </div>
                            <h5 class="fw-bold mb-1">Paslon No. {{ $data->no_urut }}</h5>
                            <p class="mb-1">Ketua: <span
                                    class="text-primary fw-semibold">{{ $data->nama_ketua }}</span></p>
                            <p class="mb-1">Wakil: <span
                                    class="text-primary fw-semibold">{{ $data->nama_wakil }}</span></p>
                            <p class="mb-1">Kelas Ketua: <span class="text-dark">{{ $data->kelasKetua->nama }}</span>
                            </p>
                            <p class="mb-1">Kelas Wakil: <span class="text-dark">{{ $data->kelasWakil->nama }}</span>
                            </p>
                            <p class="mb-1">Periode: <span
                                    class="text-dark">{{ \Carbon\Carbon::parse($data->periode->mulai_vote)->format('Y') }}</span>
                            </p>

                            <button class="btn btn-sm btn-primary fw-bold fs-8 view-manifesto"
                                data-visi="{{ $data->visi }}" data-misi="{{ $data->misi }}">
                                Visi & Misi
                            </button>



                            <button type="button" class="btn btn-danger fw-bolder px-4 ms-2 fs-8 vote-confirm"
                                data-nama="Paslon No. {{ $data->no_urut }}"
                                data-form-id="form-vote-{{ $data->id }}">
                                Vote
                            </button>
                            <form id="form-vote-{{ $data->id }}" method="POST"
                                action="{{ route('user.vote', $data->id) }}" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.view-manifesto');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const visi = this.getAttribute('data-visi');
                    const misi = this.getAttribute('data-misi');

                    Swal.fire({
                        title: 'Visi & Misi',
                        html: `
                        <strong>Visi:</strong><br>
                        <p>${visi}</p>
                        <strong>Misi:</strong><br>
                        <p>${misi.replace(/\n/g, "<br>")}</p>
                    `,
                        // icon: 'info',
                        confirmButtonText: 'tutup',
                        customClass: {
                            popup: 'p-3',
                            title: 'fw-bold fs-5',
                            content: 'text-start'
                        }
                    });
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol Vote
            const voteButtons = document.querySelectorAll('.vote-confirm');

            voteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nama = this.getAttribute('data-nama');
                    const formId = this.getAttribute('data-form-id');

                    Swal.fire({

                        text: `Apakah kamu yakin ingin memilih ${nama}?`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Iya',
                        cancelButtonText: 'Batal',
                        customClass: {
                            popup: 'p-3 rounded-3',
                            title: 'fw-bold fs-5',
                            content: 'fs-6',
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(formId).submit();
                        }
                    });
                });
            });
        });
    </script>
<script>
    const ctx = document.getElementById('chartVote').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($kandidats->map(function($item) {
                return 'No. ' . $item->no_urut . ' - ' . $item->nama_ketua . ' - ' . $item->nama_wakil;
            })) !!},
            datasets: [{
                label: 'Jumlah Suara',
                data: {!! json_encode($kandidats->pluck('jumlah_suara')) !!},
                backgroundColor: '#5e72e4',
                borderRadius: 5,
                barThickness: 20
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Jumlah Suara: ' + context.parsed.y;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>



</body>

</html>
