@props([
'icon' => null,
'label' => null,
'routeBase' => null,
'items' => [],
])

@php
$isOpen = collect($items)->contains(function($i) {
return isset($i['route']) && request()->routeIs($i['route']);
});
@endphp

<li x-data="{ openSub: {{ $isOpen ? 'true' : 'false' }} }">
    <button @click="openSub = !openSub"
        class="w-full flex justify-between items-center p-2 rounded transition {{ $isOpen ? 'bg-verde-claro text-white' : 'hover:bg-gray-700 hover:text-white' }}">
        <div class="flex items-center gap-2">
            @if($icon)
            <i class="fa-solid {{ $icon }}"></i>
            @endif
            <span>{{ $label }}</span>
        </div>
        <i :class="openSub ? 'fa-chevron-up' : 'fa-chevron-down'" class="fa-solid text-sm"></i>
    </button>

    <ul x-show="openSub" x-transition class="ml-4 mt-1 space-y-1 text-sm">
        @foreach($items as $item)
        @php
        $itemRoute = $item['route'] ?? null;
        $itemHref = $item['href'] ?? null;
        $itemParams = $item['routeParams'] ?? [];
        $url = '#';

        if ($itemHref) {
        $url = $itemHref;
        } elseif ($itemRoute) {
        // Try to safely build route URL only when parameters are satisfied
        $namedRoute = \Illuminate\Support\Facades\Route::getRoutes()->getByName($itemRoute);
        if ($namedRoute) {
        $requiredParams = $namedRoute->parameterNames();
        if (empty($requiredParams)) {
        $url = route($itemRoute);
        } elseif (!empty($itemParams)) {
        $url = route($itemRoute, $itemParams);
        } else {
        // route requires params but none provided; fallback to '#'
        $url = '#';
        }
        } else {
        // route not found: fallback
        $url = '#';
        }
        }
        @endphp

        {{-- Se o item só deve aparecer quando estivermos na rota indicada, pule se não for o caso --}}
        @if(isset($item['show_on_current_route']) && $item['show_on_current_route'] && !request()->routeIs($itemRoute ??
        ''))
        @continue
        @endif

        <li>
            <a href="{{ $url }}"
                class="block p-1 rounded flex items-center gap-2 {{ request()->routeIs($itemRoute ?? '') ? 'bg-gray-700 text-white' : 'hover:underline' }}">
                @if(isset($item['icon']))
                <i class="fa-solid {{ $item['icon'] }}"></i>
                @endif
                <span>{{ $item['label'] }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</li>