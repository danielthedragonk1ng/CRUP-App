@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="card mt-3">
        <div class="card-body">
            <canvas id="dosenChart" height="100"></canvas>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('dosenChart').getContext('2d');
        const labels = {!! json_encode($labels) !!};
        const data = {!! json_encode($counts) !!};

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Mata Kuliah per Dosen',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true, precision:0 }
                }
            }
        });
    </script>
@endsection
