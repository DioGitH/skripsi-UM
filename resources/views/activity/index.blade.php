@extends('layouts.app')

@section('content')
        <div class="activity-container">
            <a href="{{ route('activitylist') }}" class="activity-button">
                <div class="activity-button-text">Aktivitas</div>
            </a>

            <!-- Chart tahunan -->
            <div class="chart-wrapper">
                <canvas id="chartTahunan" height="100"></canvas>
            </div>
        </div>


    <div class="px-5 mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>
    <style>
        * {
            box-sizing: border-box;
        }

        .activity-container {
            width: 80%;
            margin: 0 auto 3rem auto;
        }

        .activity-button {
            min-width: 150px;
            max-width: 300px;
            background-color: #1F304B;
            font-family: 'Inknut Antiqua', serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            margin-top: 2rem;
            text-decoration: none;
            border-radius: 0.5rem;
        }

        .activity-button-text {
            color: white;
            font-family: 'Instrument Sans', sans-serif;
            font-size: 1.5rem;
            /* responsive size */
            font-weight: 600;
            text-align: center;
            word-wrap: break-word;
            white-space: normal;
        }

        .chart-wrapper {
            margin-top: 2rem;
            background-color: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 75%;
            height: 350px;
        }

        @media (max-width: 576px) {
            .activity-button {
                width: 100%;
                padding: 1rem;
                height: auto;
            }

            .activity-button-text {
                font-size: 1.25rem;
                width: 100%;
            }

            .chart-wrapper {
                width: 100%;
                height: 350px;
                position: relative;
            }
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chartTahunan').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($years),
                datasets: [{
                    label: 'Jumlah Karya per Tahun',
                    data: @json($totals),
                    backgroundColor: '#1F304B'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // ⬅️ ini wajib jika ingin kontrol tinggi via CSS
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        title: {
                            display: true,
                            text: 'Jumlah Karya'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun'
                        }
                    }
                }
            }
        });
    </script>


@endsection
