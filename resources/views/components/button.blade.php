@props(['color' => 'green'])

@php
    $colors = [
        'green' => 'bg-green-500 hover:bg-green-600 text-white',
        'red' => 'bg-red-500 hover:bg-red-600 text-white',
        'blue' => 'bg-blue-500 hover:bg-blue-600 text-white',
        'yellow' => 'bg-yellow-400 hover:bg-yellow-500 text-black',
        'gray' => 'bg-gray-500 hover:bg-gray-600 text-white',
    ];

    $colorClass = $colors[$color] ?? $colors['green'];
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center px-3 py-2 font-bold rounded $colorClass"]) }}>
    {{ $slot }}
</button>
