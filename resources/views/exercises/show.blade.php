<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Exercises') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-300 rounded-2xl dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-wui-button icon="chevron-left" label="Back to table" href="{{route('exercises')}}"/>
                    <div class="text-xl text-center m-5">
                        <h1 class=" mx-auto text-3xl font-semibold leading-tight">
                            {{ucfirst($exercise->name)}}
                        </h1>
                    </div>
                    <div class="max-w-xl mx-auto">
                        <div>
                            <h2 class="font-semibold text-xl">Details:</h2>
                            <ul class='pl-6 mt-3 font-semibold'>
                                <li>- Target muscle: {{ucfirst($exercise->target)}}</li>
                                <li>- Body part used: {{ucfirst($exercise->body_part)}}</li>
                                <li>- Equipment used: {{ucfirst($exercise->equipment)}}</li>
                                <li></li>
                            </ul>
                        </div>

                        <image
                            src="https://res.cloudinary.com/drsvmmwgj/image/upload/v1716072414/workout-images/imgs/image_{{$exercise->id-1}}"
                            class="mx-auto w-2/3 my-7 rounded-xl shadow-md"></image>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
