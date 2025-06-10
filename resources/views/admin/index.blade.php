@extends('layouts.admin')

@section('admin')
    <div class=" p-3 d-flex justify-content-between w-100">
        <div class="fw-bold mx-2" style="font-size: 32px">Beranda</div>

        <div class="d-flex gap-5 mx-5">
@auth('admin')
    @php $admin = auth('admin')->user(); @endphp
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
        🔔 Notifikasi ({{ $admin->unreadNotifications->count() }})
        </a>
        <ul class="dropdown-menu">
        @forelse($admin->unreadNotifications as $notification)
            <li>
            <a href="{{ route('karya.show', $notification->data['karya_id']) }}" class="dropdown-item">
                {{ $notification->data['message'] }}
            </a>
            </li>
        @empty
            <li><span class="dropdown-item">Tidak ada notifikasi</span></li>
        @endforelse
        </ul>
    </li>
@endauth

            <button style="width: 44px"><img src="{{ asset('assets/img/setting.png') }}" alt=""></button>
        </div>
    </div>
    <div class="" style="height: 10px; width: 100%; background-color: #1F304B;"></div>
    <div class="px-5 py-4 fw-bold" style="font-size: 32px; background-color: #fff">
        SELAMAT DATANG DI  DASHBOARD ADMIN e Skill-Lib Repository 
    </div>
    <div class="d-flex px-5 py-4 flex-row justify-content-between gap-3" style="background-color: #fff;">
        {{-- Keanggotaan --}}
        <div class="bg-white mx-3 mb-4 shadow border p-4 d-flex flex-column justify-content-between" style="width: 20%; border-radius:18px; min-width: 200px; border: 1px solid #ccc;">
            <div class="fw-bold fs-4">Keanggotaan</div>
            <div class="d-flex align-items-center gap-3">
                <div style="width: 54px;">
                    <img src="{{ asset('assets/img/anggota.png') }}" alt="Keanggotaan" class="img-fluid">
                </div>
                <div style="font-size: 48px;">{{ $totalUsers }}</div>
            </div>
        </div>

        {{-- Jumlah Pengunjung --}}
        <div class="bg-white mx-3 mb-4 shadow border p-4 d-flex flex-column justify-content-between" style="width: 20%; border-radius:18px; min-width: 200px; border: 1px solid #ccc;">
            <div class="fw-bold fs-4">Jumlah Pengunjung</div>
            <div class="d-flex align-items-center gap-3">
                <div style="width: 54px;">
                    <img src="{{ asset('assets/img/jumlah.png') }}" alt="Jumlah Pengunjung" class="img-fluid">
                </div>
                <div style="font-size: 48px;">-</div> {{-- Kosong dulu --}}
            </div>
        </div>

        {{-- Total Karya --}}
        <div class="bg-white mx-3 mb-4 shadow border p-4 d-flex flex-column justify-content-between" style="width: 20%; border-radius:18px; min-width: 200px; border: 1px solid #ccc;">
            <div class="fw-bold fs-4">Total Karya</div>
            <div class="d-flex align-items-center gap-3">
                <div style="width: 54px;">
                    <img src="{{ asset('assets/img/totalkarya.png') }}" alt="Total Karya" class="img-fluid">
                </div>
                <div style="font-size: 48px;">{{ $totalKarya }}</div>
            </div>
        </div>

        {{-- Menunggu Verifikasi --}}
        <div class="bg-white mx-3 mb-4 shadow border p-4 d-flex flex-column justify-content-between" style="width: 20%; border-radius:18px; min-width: 200px; border: 1px solid #ccc;">
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
    <div class="my-4 p-4 bg-white shadow rounded" style="width: 100%; max-width: 800px;">
        <h4 class="mb-3">Grafik Karya (Guru vs Siswa)</h4>
        <canvas id="karyaChart"></canvas>
    </div>

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
