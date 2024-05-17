<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('import:csv {path}', function($path) {
    // Print that we're importing
    $this->comment('Importing '.$path.'..');

    // Read contents of file
    $contents = File::get($path);

    //Parse CSV lines
    $lines = explode('\n', $contents);

    // Format data
    // 0:
    // 1:
    // 2:
    // 3:
    // 4:

    // Display data
    $i =0;
    foreach ($lines as $line) {
        if ($i > 0) {
            $values = str_getcsv($line);
            $this->info($values[1].'  '.$values[2]);
        }
        $i++;
    }

    // Store data on the database

})->purpose('Import workout exercise dataset');
