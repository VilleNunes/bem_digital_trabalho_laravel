@props([
'color' => 'blue',
'value' => 0,
'label' => 'Título',
'icon' => 'fa-users',
])

@php
// Paleta clean com mais contraste
$colors = [
'blue' => 'from-blue-100 to-blue-200 text-blue-800',
'green' => 'from-emerald-100 to-emerald-200 text-emerald-800',
'red' => 'from-rose-100 to-rose-200 text-rose-800',
'yellow' => 'from-amber-100 to-amber-200 text-amber-800',
'purple' => 'from-violet-100 to-violet-200 text-violet-800',
'gray' => 'from-gray-200 to-gray-300 text-gray-800',
'black' => 'from-neutral-300 to-neutral-400 text-neutral-900',
];

$classes = $colors[$color] ?? $colors['blue'];
@endphp

<div class="relative flex items-center justify-between p-6 rounded shadow-md 
           bg-gradient-to-br {{ $classes }}
           hover:shadow-lg hover:scale-[1.02] transition-all duration-300 ease-out overflow-hidden">
    <div class="z-10">
        <p class="text-sm uppercase tracking-wide opacity-90 font-medium">{{ $label }}</p>
        <h3 class="text-3xl font-extrabold mt-1">{{ $value }}</h3>
    </div>

    <div class="absolute right-5 top-5 opacity-25 text-6xl z-0">
        <i class="fa-solid {{ $icon }}"></i>
    </div>
</div>