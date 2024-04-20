@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm text-sm bg-white
        disabled:text-gray-400 disabled:bg-gray-200 disabled:cursor-not-allowed',
]) !!}>{{ $slot }}</textarea>
