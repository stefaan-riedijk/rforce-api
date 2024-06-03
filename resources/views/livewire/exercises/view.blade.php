<?php

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\WorkoutExercise;


class ExercisesView extends Component {

    use WithPagination;

    public $exercises;

    public function render()
    {
        $exercises=WorkoutExercise::all();
        return view('exercises.index',[
            'exercises'=>$exercises
        ]);
    }
    
}; ?>

<div>
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
           <td><image src="https://res.cloudinary.com/drsvmmwgj/image/upload/v1716072414/workout-images/imgs/image_{{$exercise->id-1}}" class="w-12 h-12"/></td>
       </tr>
    @endforeach
    </table>
    {{ $exercises->links() }}
</div>
