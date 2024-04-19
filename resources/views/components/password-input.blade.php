@props(['disabled' => false])

<div class="relative" x-data="{ show: false }">
    <input x-bind:type="show ? 'text' : 'password'" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm text-sm',
    ]) !!}>

    <button type="button" x-on:click="show = !show"
        class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
            class="text-gray-400" x-show="!show">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
            class="text-gray-400" x-show="show">
            <path
                d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z" />
            <path
                d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z" />
        </svg>
    </button>
</div>
