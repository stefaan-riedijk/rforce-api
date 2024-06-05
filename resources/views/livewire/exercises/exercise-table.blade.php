<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden">
                <div class="flex mb-6">
                    <x-input wire:model.live="search" right-icon="search" label="Search:" placeholder="Search for exercises"
                             class="text-black w-60"/>
                </div>

                <table class="border w-full">
                    <tr class="border-2">
                        <th class="capitalize bg-gray-600">Name</th>
                        <th class="capitalize bg-gray-600">Target</th>
                        <th class="capitalize bg-gray-600">Equipment</th>
                        <th class="capitalize bg-gray-600">Body Part</th>
                        <th class="capitalize bg-gray-600">Image</th>
                    </tr>
                    @foreach ($exercises as $exercise)

                        <tr class="border border-black ml-4 py-1">
                            <td>
                                <a href="{{route('exercises.show',$exercise->id)}}">
                                    <p class="ml-2">
                                        {{ucfirst($exercise->name)}}
                                    </p>
                                </a>
                            </td>
                            <td>{{ucfirst($exercise->target)}}</td>
                            <td>{{ucfirst($exercise->equipment)}}</td>
                            <td>{{ucfirst($exercise->body_part)}}</td>
                            <td>
                                <image
                                    src="https://res.cloudinary.com/drsvmmwgj/image/upload/v1716072414/workout-images/imgs/image_{{$exercise->id-1}}"
                                    class="w-12 h-12"/>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="mx-auto mt-5">
                    {{ $exercises->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
