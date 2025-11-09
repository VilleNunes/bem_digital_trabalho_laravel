@props(['color' => 'green'])

@php
$colors = [
'green' => 'bg-green-600 hover:bg-green-600 text-white',
'red' => 'bg-red-500 hover:bg-red-600 text-white',
'blue' => 'bg-blue-500 hover:bg-blue-600 text-white',
'yellow' => 'bg-yellow-400 hover:bg-yellow-500 text-black',
'gray' => 'bg-gray-500 hover:bg-gray-600 text-white',
'link'=>'bg-white border border-gray-700'
];

$colorClass = $colors[$color] ?? $colors['green'];
@endphp

<a {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex items-center px-2 py-2 text-xs rounded
    $colorClass"]) }}>
    {{ $slot }}
</a>