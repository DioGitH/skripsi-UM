@extends('layouts.admin')

@section('admin')
    @include('components.headerAdmin')
    <div class="px-5 py-4 fw-bold w-100" style="font-size: 28px; background-color: #fff">
        SELAMAT DATANG DI  DASHBOARD ADMIN e Skill-Lib Repository 
    </div>
    <div class="card-container px-5 py-4" style="background-color: #fff;">
        {{-- Keanggotaan --}}
        <div class="dashboard-card">
            <div class="fw-bold fs-4">Keanggotaan</div>
            <div class="d-flex align-items-center gap-3">
                <div style="width: 54px;">
                    <img src="{{ asset('assets/img/anggota.png') }}" alt="Keanggotaan" class="img-fluid">
                </div>
                <div style="font-size: 48px;">{{ $totalUsers }}</div>
            </div>
        </div>

        {{-- Jumlah Pengunjung --}}
        <div class="dashboard-card">
            <div class="fw-bold fs-4">Jumlah Pengunjung</div>
            <div class="d-flex align-items-center gap-3">
                <div style="width: 54px;">
                    <img src="{{ asset('assets/img/jumlah.png') }}" alt="Jumlah Pengunjung" class="img-fluid">
                </div>
                <div style="font-size: 48px;">-</div> {{-- Kosong dulu --}}
            </div>
        </div>

        {{-- Total Karya --}}
        <div class="dashboard-card">
            <div class="fw-bold fs-4">Total Karya</div>
            <div class="d-flex align-items-center gap-3">
                <div style="width: 54px;">
                    <img src="{{ asset('assets/img/totalkarya.png') }}" alt="Total Karya" class="img-fluid">
                </div>
                <div style="font-size: 48px;">{{ $totalKarya }}</div>
            </div>
        </div>

        {{-- Menunggu Verifikasi --}}
        <div class="dashboard-card">
            <div class="fw-bold fs-4">Menunggu Verifikasi</div>
            <div class="d-flex align-items-center gap-3">
                <div style="width: 54px;">
                    <img src="{{ asset('assets/img/verifikasi.png') }}" alt="Menunggu Verifikasi" class="img-fluid">
                </div>
                <div style="font-size: 48px;">{{ $menungguVerifikasi }}</div>
            </div>
        </div>
    </div>

    {{-- Chart Karya --}}
    <div class="my-4 m-auto mb-5 p-4 bg-white shadow rounded" style="width: 100%; max-width: 800px;">
        <h4 class="mb-3">Grafik Karya (Guru vs Siswa)</h4>
        <canvas id="karyaChart"></canvas>
    </div>

    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: space-between;
        }

        .dashboard-card {
            background-color: #fff;
            border-radius: 18px;
            border: 1px solid #ccc;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 23%; /* 4 cards per row */
            min-width: 200px;
        }

        @media (max-width: 992px) {
            .dashboard-card {
                width: 48%; /* 2 cards per row on tablets */
            }
        }

        @media (max-width: 576px) {
            .dashboard-card {
                width: 100%; /* 1 card per row on mobile */
            }
        }
    </style>

    {{-- Tambah CDN Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('karyaChart').getContext('2d');
        const karyaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($years),
                datasets: [
                    {
                        label: 'Guru',
                        backgroundColor: 'rgba(255, 99, 132, 0.8)', // Merah
                        data: @json($guruData)
                    },
                    {
                        label: 'Siswa',
                        backgroundColor: 'rgba(30, 64, 175, 0.8)', // Biru tua
                        data: @json($siswaData)
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: {
                        display: true,
                        text: 'Jumlah Karya per Tahun (Guru vs Siswa)'
                    }
                }
            }
        });
    </script>

@endsection
