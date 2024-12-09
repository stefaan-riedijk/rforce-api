<div>
    @php
        $targetOptions = [
        0 => "abs",
        1 => "quads",
        2 => "lats",
        3 => "calves",
        4 => "pectorals",
        5 => "glutes",
        6 => "hamstrings",
        7 => "adductors",
        8 => "triceps",
        9 => "cardiovascular system",
        10 => "spine",
        11 => "upper back",
        12 => "biceps",
        13 => "delts",
        14 => "forearms",
        15 => "traps",
        16 => "serratus anterior",
        17 => "abductors",
        18 => "levator scapulae"
      ];
    $equipmentOptions =
    [0 => "body weight",
    1 => "cable",
    2 => "leverage machine",
    3 => "assisted",
    4 => "medicine ball",
    5 => "stability ball",
    6 => "band",
    7 => "barbell",
    8 => "rope",
    9 => "dumbbell",
    10 => "ez barbell",
    11 => "sled machine",
    12 => "upper body ergometer",
    13 => "kettlebell",
    14 => "olympic barbell",
    15 => "weighted",
    16 => "bosu ball",
    17 => "resistance band",
    18 => "roller",
    19 => "skierg machine",
    20 => "hammer",
    21 => "smith machine",
    22 => "wheel roller",
    23 => "stationary bike",
    24 => "tire",
    25 => "trap bar",
    26 => "elliptical machine",
    27 => "stepmill machine"];
    $bodyPartOptions = [
    0 => "waist",
    1 => "upper legs",
    2 => "back",
    3 => "lower legs",
    4 => "chest",
    5 => "upper arms",
    6 => "cardio",
    7 => "shoulders",
    8 => "lower arms",
    9 => "neck",
  ]

    @endphp
    <section class="mt-10 min-h-screen">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="dark:bg-gray-800 overflow-hidden min-h-screen rounded-lg shadow-lg">
                <div class="flex mb-6 p-4">
                    <x-input wire:model.live="search" right-icon="search" label="Search:"
                             placeholder="Search for exercises"
                             class="text-black w-60"/>
                    <div class="ml-auto flex flex-row space-x-2">
                        <x-select label="Target muscle" :options="$targetOptions" wire:model.live="target"/>
                        <x-select label="Equipment" :options="$equipmentOptions" wire:model.live="equipment"/>
                        <x-select label="Body part" :options="$bodyPartOptions" wire:model.live="bodyPart"/>
                    </div>
                </div>
                @if($exercises->total()==0)
                    <div><p class="text-xl mt-6 text-center">
                            No results match your search.
                        </p></div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full bg-white dark:bg-gray-700 rounded-lg overflow-hidden">
                            <thead>
                                <tr class="bg-blue-500 text-white">
                                    <th class="px-4 py-3 text-left">Name</th>
                                    <th class="px-4 py-3 text-left">Target</th>
                                    <th class="px-4 py-3 text-left">Equipment</th>
                                    <th class="px-4 py-3 text-left">Body Part</th>
                                    <th class="px-4 py-3 text-left">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exercises as $exercise)
                                    <tr class="border-b border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="px-4 py-3">
                                            <a href="{{route('exercises.show',$exercise->id)}}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200">
                                                {{ucfirst($exercise->name)}}
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">{{ucfirst($exercise->target)}}</td>
                                        <td class="px-4 py-3">{{ucfirst($exercise->equipment)}}</td>
                                        <td class="px-4 py-3">{{ucfirst($exercise->body_part)}}</td>
                                        <td class="px-4 py-3">
                                            <img src="https://res.cloudinary.com/drsvmmwgj/image/upload/v1716072414/workout-images/imgs/image_{{$exercise->id-1}}"
                                                 class="w-12 h-12 rounded-md object-cover" alt="Exercise image">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-auto mt-5 p-4">
                        {{ $exercises->links() }}
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
