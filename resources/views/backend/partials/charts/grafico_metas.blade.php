<canvas id="graficoMetas" class="w-32 h-32 md:w-40 md:h-40"></canvas>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const canvas = document.getElementById('graficoMetas');
        const ctx = canvas.getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Atingido', 'Restante'],
                datasets: [{
                    data: [75, 25],
                    backgroundColor: ['#2E7D32', '#F8FAFC'],
                    borderColor: '#E2725B',
                    borderWidth: 2
                }]
            },
            options: {
                cutout: '70%',
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