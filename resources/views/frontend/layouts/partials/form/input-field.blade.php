@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'required' => false,
    'placeholder' => '',
])

<div>
  <label for="{{ $name }}" class="block text-sm font-medium text-green-800 mb-1">
    {{ $label }} @if($required)*@endif
  </label>

  <input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $name }}"
    placeholder="{{ $placeholder }}"
    {{ $required ? 'required' : '' }}
    {{ $attributes->merge([
      'class' => 'w-full border border-green-300 rounded-md p-3 focus:ring-2 focus:ring-green-500 outline-none',
    ]) }}
  >
</div>
