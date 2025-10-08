@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-200   focus:border-indigo-200  focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
