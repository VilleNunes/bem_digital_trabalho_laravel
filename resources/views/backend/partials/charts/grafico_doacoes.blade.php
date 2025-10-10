<canvas id="graficoDoacoes" class="w-full h-64 md:h-80"></canvas>


@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const canvas = document.getElementById('graficoDoacoes');
        const ctx = canvas.getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                datasets: [{
                    label: 'Doações',
                    data: [120, 150, 90, 180, 220, 260],
                    backgroundColor: '#E2725B',
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#F8FAFC',
                            ticks: {
                                color: '#2E7D32'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#2E7D32'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
@endpush