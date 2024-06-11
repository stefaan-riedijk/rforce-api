<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Workouts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-100 border-2 border-gray-300 dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-wui-button class="" icon="arrow-left" href="{{ route('workouts') }}">Back to workout overview
                    </x-wui-button>
                </div>
                <div class="px-6 mx-auto max-w-7xl">
                    <livewire:workouts.create/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
