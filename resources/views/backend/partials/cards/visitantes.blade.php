<div class="bg-white rounded-2xl p-6 shadow-sm text-center">
    <h3 class="text-lg font-semibold text-gray-700 mb-2">Visitantes</h3>
    <p id="contadorVisitantes" class="text-4xl font-bold text-indigo-600">0</p>
</div>

@push('scripts')
<script>
let count = 0;
const contador = document.getElementById('contadorVisitantes');
setInterval(() => {
    if (count < 237) { // valor estático simulado
        count += 1;
        contador.textContent = count;
    }
}, 15);
</script>
@endpush
