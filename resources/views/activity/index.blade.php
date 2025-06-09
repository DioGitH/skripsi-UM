@extends('layouts.app')

@section('content')
    <div class="m-auto" style="width: 80%">
        <a href="{{route('activitylist')}}">
            <div class="d-flex align-items-center mt-5" style="width:15%; height:50px; background-color: #1F304B; font-family: 'Inknut Antiqua', serif;">
                <div class="d-flex justify-content-center align-items-center text-white mx-auto" style="font-size: 40px; width: 50%; height: 50%;">
                    Aktifitas
                </div>
            </div>
        </a>        
        <!-- Chart tahunan -->
<div class="p-6 mt-5 bg-white rounded shadow w-75">
    <canvas id="chartTahunan" height="100"></canvas>
</div>


    </div>
    
    <div class="px-5">
        <a class="px-2" href="">Kembali</a>
    </div>
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
