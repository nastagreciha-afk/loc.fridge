<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

{{--    <div id="app">--}}
{{--        <user-fridges :fridges='@json($fridges)'></user-fridges>--}}
{{--    </div>--}}
    <div class="py-12" id="app">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <user-fridges
                :fridges='@json($fridges)'
                :products='@json($products)'>
            </user-fridges>
        </div>
    </div>
</x-app-layout>
