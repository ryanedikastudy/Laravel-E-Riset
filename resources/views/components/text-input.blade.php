@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm text-sm bg-white
        disabled:text-gray-400 disabled:bg-gray-100 disabled:cursor-not-allowed',
]) !!}>
