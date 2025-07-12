@extends('layouts.admin')
@section('content')
    <div class="row gx-3">
        <h1>Beranda</h1>
        <div class="col-lg-4 col-xxl-2 col-6">
            <div class="card text-white text-bg-success">
                <div class="card-body p-4">
                    <span>
                        <i class="ti ti-archive fs-8"></i>
                    </span>
                    <h3 class="card-title mt-3 mb-0 text-white">{{ number_format($jumlahpemilih) }}</h3>
                    <p class="card-text text-white-50 fs-3 fw-normal">
                        Jumlah Pemilih
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-2 col-6">
            <div class="card text-white text-bg-danger">
                <div class="card-body p-4">
                    <span>
                        <i class="ti ti-gift fs-8"></i>
                    </span>
                    <h3 class="card-title mt-3 mb-0 text-white">{{ number_format($belummemilih) }}</h3>
                    <p class="card-text text-white-50 fs-3 fw-normal">
                        Jumlah yang belum memilih
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-2 col-6">
            <div class="card text-white text-bg-danger">
                <div class="card-body p-4">
                    <span>
                        <i class="ti ti-gift fs-8"></i>
                    </span>
                    <h3 class="card-title mt-3 mb-0 text-white">{{ number_format($sudahmemilih) }}</h3>
                    <p class="card-text text-white-50 fs-3 fw-normal">
                        Jumlah yang sudah Memilih
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-2 col-6">
            <div class="card text-white text-bg-warning">
                <div class="card-body p-4">
                    <span>
                        <i class="ti ti-users fs-8"></i>
                    </span>
                    <h3 class="card-title mt-3 mb-0 text-white">{{ number_format($jumlahkandidat) }}</h3>
                    <p class="card-text text-white-50 fs-3 fw-normal">
                        Jumlah Kandidat
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-2 col-6">
            <div class="card text-white text-bg-danger">
                <div class="card-body p-4">
                    <span>
                        <i class="ti ti-gift fs-8"></i>
                    </span>
                    <h3 class="card-title mt-3 mb-0 text-white">{{ number_format($suaramasuk) }}</h3>
                    <p class="card-text text-white-50 fs-3 fw-normal">
                        Suara Masuk
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <div>
                    <h5 class="card-title fw-semibold mb-1">
                        Hasil Vote Sementara
                    </h5>
                    {{-- <p class="card-subtitle mb-0">Every month</p> --}}
                    <canvas id="salary" class="mb-7 pb-8 mx-n4"></canvas>
                    <div class="d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salary').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($kandidat->map(function($item) {
                return $item->nama_ketua . ' & ' . $item->nama_wakil;
            })) !!},
            datasets: [{
                label: 'Jumlah Suara',
                data: {!! json_encode($kandidat->pluck('jumlah_suara')) !!},
                backgroundColor: '#5e72e4',
                borderRadius: 5,
                barThickness: 40, // <<< Ubah ini biar bar-nya kecil
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
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
@endpush


