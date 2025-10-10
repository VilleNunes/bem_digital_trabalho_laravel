<div class="bg-white rounded-2xl p-6 shadow-sm">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Metas (%)</h3>
    <canvas id="graficoMetas"></canvas>
</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById('graficoMetas');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Atingido', 'Restante'],
            datasets: [{
                data: [75, 25],
                backgroundColor: ['#4F46E5', '#E5E7EB'],
                borderWidth: 0
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
