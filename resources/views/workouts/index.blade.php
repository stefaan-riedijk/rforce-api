<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Workouts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex row-end-1">
                        <x-wui-button href="{{route('workouts.create')}}"  right-icon="plus" label="Start creating new programs!" class="ml-auto"/>
                    </div>
                    <h2 class="text-xl font-semibold pl-4 ">My workouts</h2>
                    <div>

                    </div>
                    <h2 class="text-xl font-semibold pl-4 ">Favourited workouts</h2>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
