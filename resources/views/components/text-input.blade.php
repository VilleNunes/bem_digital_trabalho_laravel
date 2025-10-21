@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 p-2 focus:border-indigo-200
focus:ring-indigo-500 placeholder-gray-400 placeholder:font-normal rounded-md shadow-sm']) }}>