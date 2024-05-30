<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Models\WorkoutExercise;
use Illuminate\Support\Facades\DB;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Artisan::command('import:csv {path}', function($path) {
    // Print that we're importing
    $this->comment('Importing '.$path.'..');

    // Check if exists
    $files = Storage::disk('local')->allFiles();
    $this->info('files in storage are: '.implode(' ',$files));

    // Read contents of file
    $contents = Storage::disk('local')->get($path);
    $lines = explode("\n", $contents);

    // Remove duplicates
    $lines = array_unique($lines);
    $this->info(sizeof($lines));

    // Empty database table
    DB::table('workout_exercises')->truncate();
    $this->info("Entries deleted. There are ".WorkoutExercise::count()." exercises in the db.");

    // Format data
    // 0: bodyPart
    // 1: equipment
    // 2: gifUrl
    // 3: id
    // 4: name
    // 5: target

    // Initialize array
    $values = array_fill(0,sizeof(str_getcsv($lines[0])),0);
    $this->info(implode($values));

    // Loop over the CSV rows
    for ($x = 1; $x < (sizeof($lines)-1); $x++) {
        $values = str_getcsv($lines[$x]);

        // Values from single line

        // Make call to ORM
        if (!in_array(0,$values,true)) {
            $this->info($x);
            $bodyPart = $values[0];
            $equipment = $values[1];
            $gifUrl = $values[2];
            $id = $values[3];
            $name = $values[4];
            $target = $values[5];
            WorkoutExercise::firstOrCreate([
                'body_part'=>$bodyPart,
                'equipment'=>$equipment,
                'name'=>$name,
                'target'=>$target,
            ]);
        };
        $values = array_fill(0, sizeof($values), 0);
    }

})->purpose('Import workout exercise dataset');
