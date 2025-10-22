@props([
'icon' => null,
'label',
'route' => null,
'href' => null,
])

@php
$url = $href ?? ($route ? route($route) : '#');
$isActive = $route ? request()->routeIs($route) : false;
$baseClasses = 'flex items-center gap-2 p-2 rounded transition';
$activeClasses = $isActive ? 'bg-verde-claro text-white' : 'hover:bg-gray-700 hover:text-white';
@endphp

<a href="{{ $url }}" class="{{ $baseClasses }} {{ $activeClasses }}">
    @if($icon)
    <i class="fa-solid {{ $icon }}"></i>
    @endif
    <span>{{ $label }}</span>
</a>