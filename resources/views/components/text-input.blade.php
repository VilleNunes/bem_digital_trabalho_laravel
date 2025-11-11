@props(['disabled' => false])

<input 
    @if(!$attributes->has('x-bind:disabled') && !$attributes->has(':disabled'))
        @disabled($disabled)
    @endif
    {{ $attributes->merge(['class' => 'border-gray-300 p-2 focus:border-indigo-200
focus:ring-indigo-500 placeholder-gray-400 placeholder:font-normal rounded-md shadow-sm']) }}>