@props(['value','required'=>null])

<div class="flex gap-1 items-center">
    <label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-900 dark:text-gray-500']) }}>
        {{ $value ?? $slot }}
    </label>

    @if($required)
    <span class="text-red-600">*</span>
    @endif
</div>