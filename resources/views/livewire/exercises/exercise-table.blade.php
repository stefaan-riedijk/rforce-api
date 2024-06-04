<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <x-input wire:model.live="search" type="text" label="Search" placeholder="Search for exercises" class="mt-3 text-black"/>
                    <div class="flex">
                        <div class="relative w-full">
                            <input type="text" class="bg-gray-50 border border-gray-300" placeholder="Search" required="">
                        </div>

                    </div>
                </div>

                <table class="border w-full">
                    <tr class="border-2">
                        <th>Name</th>
                        <th>Target</th>
                        <th>Equipment</th>
                        <th>Body Part</th>
                        <th>Image</th>
                    </tr>
                    @foreach ($exercises as $exercise)
                        <tr class="border border-black ml-4 py-1">
                            <td>{{ucfirst($exercise->name)}}</td>
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
                <div class="mx-auto mt-3">
                    {{ $exercises->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
