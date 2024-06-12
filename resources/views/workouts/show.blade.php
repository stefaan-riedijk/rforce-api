<x-guest-layout>
    <div class="mb-6 flex">
        <x-wui-button icon="chevron-left" title="Back to Workouts"  href="{{route('workouts')}}"/>
        <div class="ml-auto">
            <livewire:workouts.show.addfavorite :workout="$program"/>
        </div>
    </div>
    <div class="w-full mb-4">
        <h1 class="font-semibold text-xl text-center pb-3">
            {{$program->title}}
        </h1>
        <h3>
            Created by: {{ $program->user->name  }}
        </h3>
        <h3>
            Estimated duration: {{$program->estimated_duration}} mins.
        </h3>
        <p>
            Program description: {{$program->description}}
        </p>
        <div>

        @foreach($exercises as $exercise)
            <div class="mt-5">
                <h2 class="text-xl text-center">{{$exercise->name}}</h2>
                <image class="w-full h-18 border-gray-400 border rounded-lg" src="https://res.cloudinary.com/drsvmmwgj/image/upload/v1716072414/workout-images/imgs/image_{{$exercise->id-1}}"/>
                <div class="ml-3">
                <p>Sets: {{$exercise->pivot->num_reps}}</p>
                <p>Repetitions per set: {{$exercise->pivot->num_sets}}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</x-guest-layout>
