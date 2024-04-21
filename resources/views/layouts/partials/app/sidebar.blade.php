<div x-data="{ open: $persist(false).as('sidebar') }" x-bind:class="{ 'lg:w-72': open }"
    class="relative flex-none font-medium text-gray-500 bg-white border-r border-gray-200 lg:w-72">

    <div class="flex flex-col px-4 py-20 space-y-4 leading-tight">
        <div class="flex">
            <div class="p-3 rounded-md cursor-pointer hover:bg-gray-100" x-on:click="open=! open">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 transition duration-150 ease-in-out " x-bind:class="{ 'rotate-180': open }">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </div>
        </div>

        <a href="{{ route('researcher.dashboard.index') }}"
            class="flex items-center p-3 space-x-4 rounded-md cursor-pointer hover:bg-gray-100
            @if (request()->routeIs('researcher.dashboard.*')) bg-gray-100 @endif">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
            </svg>

            <span x-bind:class="{ 'hidden': !open }">
                {{ __('Dashboard') }}
            </span>
        </a>

        <a href="{{ route('researcher.research.index') }}"
            class="flex items-center p-3 space-x-4 rounded-md cursor-pointer hover:bg-gray-100 @if (request()->routeIs('researcher.research.*')) bg-gray-100 @endif">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                <path d="M6 18h8" />
                <path d="M3 22h18" />
                <path d="M14 22a7 7 0 1 0 0-14h-1" />
                <path d="M9 14h2" />
                <path d="M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Z" />
                <path d="M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3" />
            </svg>

            <span x-bind:class="{ 'hidden': !open }">
                {{ __('Kelola Riset') }}
            </span>
        </a>

        <a href="{{ route('researcher.publication.index') }}"
            class="flex items-center p-3 space-x-4 rounded-md cursor-pointer hover:bg-gray-100 @if (request()->routeIs('researcher.publication.*')) bg-gray-100 @endif">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20" />
                <path d="m8 13 4-7 4 7" />
                <path d="M9.1 11h5.7" />
            </svg>

            <span x-bind:class="{ 'hidden': !open }">
                {{ __('Kelola Publikasi') }}
            </span>
        </a>

        <a href="{{ route('researcher.patent.index') }}"
            class="flex items-center p-3 space-x-4 rounded-md cursor-pointer hover:bg-gray-100 @if (request()->routeIs('researcher.patent.*')) bg-gray-100 @endif">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                <path
                    d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z" />
                <path d="m3.3 7 8.7 5 8.7-5" />
                <path d="M12 22V12" />
            </svg>

            <span x-bind:class="{ 'hidden': !open }">
                {{ __('Kelola Paten') }}
            </span>
        </a>
    </div>
</div>
