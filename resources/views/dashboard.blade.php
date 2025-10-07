@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Judul dengan latar kuning -->
        <h1 class="title-highlight">Dashboard</h1>

        <div class="card mt-3">
            <div class="card-body">
                <canvas id="dosenChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Pastikan controller mengirim $labels dan $counts
            const labels = @json($labels ?? []);
            const counts = @json($counts ?? []);

            const ctx = document.getElementById('dosenChart').getContext('2d');
            if (ctx && labels.length) {
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Mata Kuliah per Dosen',
                            data: counts,
                            backgroundColor: 'rgba(255, 235, 59, 0.8)', // kuning
                            borderColor: 'rgba(255, 193, 7, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { precision:0 }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
