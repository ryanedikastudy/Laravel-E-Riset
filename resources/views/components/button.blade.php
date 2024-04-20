@props(['variant' => 'primary', 'size' => 'md', 'type' => 'submit'])

@php
    switch ($variant) {
        case 'primary':
            $variantClass =
                'text-white bg-primary-500 hover:bg-primary-600 focus:bg-primary-600 active:bg-primary-600 border-transparent';
            break;

        case 'invert':
            $variantClass =
                'text-primary-500 bg-white hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-100 border-transparent';
            break;

        case 'ghost':
            $variantClass =
                'text-gray-900 bg-gray-200 hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 border-transparent';
            break;

        case 'danger':
            $variantClass =
                'text-white bg-red-500 hover:bg-red-600 focus:bg-red-600 active:bg-red-600 border-transparent';
            break;

        case 'link':
            $variantClass =
                'text-gray-900 bg-transparent hover:underline focus:underline active:undeline border-transparent';
            break;

        case 'outline':
            $variantClass =
                'text-primary-500 bg-transparent hover:bg-primary-500 hover:text-white focus:bg-primary-500 focus:text-white active:bg-primary-500 active:text-white border border-primary-500';
    }

    switch ($size) {
        case 'sm':
            $sizeClass = 'px-3 py-1.5';
            break;

        case 'md':
            $sizeClass = 'px-4 py-2';
            break;

        case 'lg':
            $sizeClass = 'px-6 py-3';
            break;

        case 'icon':
            $sizeClass =
                'h-8 w-8 relative [&>svg]:absolute [&>svg]:top-1/2 [&>svg]:left-1/2 [&>svg]:h-5 [&>svg]:w-5 [&>svg]:transform [&>svg]:-translate-y-1/2 [&>svg]:-translate-x-1/2';
            break;
    }
@endphp

<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => "inline-flex items-center text-sm font-medium space-x-2 {$sizeClass} {$variantClass} border rounded-md focus:outline-none transition ease-in-out duration-150 whitespace-nowrap",
    ]) }}>
    {{ $slot }}
</button>
