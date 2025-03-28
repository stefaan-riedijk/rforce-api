<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Workouts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-3 min-h-80 bg-blue-300  border-2 dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex row-end-1">
                        <x-wui-button secondary light href="{{route('workouts.create')}}" right-icon="plus"
                                      label="Start creating new programs!" class="ml-auto"/>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold pl-4 ">My workouts</h2>
                        <div>
                            @if($myWorkouts->isEmpty())
                                <p class="text-center">You haven't added any workouts yet. Start planning them
                                    today!</p>
                            @else
                                @livewire('workouts.index', ['workouts' => $myWorkouts])
                            @endif
                        </div>
                    </div>
                    <div class="mt-8">

                        <h2 class="text-xl font-semibold pl-4 ">Favorited workouts</h2>
                        <div>
                            @if($favWorkouts->isEmpty())
                                <p class="text-center">To add to your favorited workouts, visit another user's workout
                                    plan
                                    and give them a heart!</p>
                            @else
                                @livewire('workouts.index.favorites', ['workouts' => $favWorkouts])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
