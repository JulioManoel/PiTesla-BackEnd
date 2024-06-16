<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Exercise;

class ExercicseObserver
{
    /**
     * Handle the Exercise "created" event.
     */
    public function created(Exercise $exercise): void
    {
        Log::create([
            'type' => 'created',
            'message' => "Exercise ID: {$exercise->id}"
        ]);
    }

    /**
     * Handle the Exercise "updated" event.
     */
    public function updated(Exercise $exercise): void
    {
        Log::create([
            'type' => 'updated',
            'message' => "Exercise ID: {$exercise->id}"
        ]);
    }

    /**
     * Handle the Exercise "deleted" event.
     */
    public function deleted(Exercise $exercise): void
    {
        Log::create([
            'type' => 'deleted',
            'message' => "Exercise ID: {$exercise->id}"
        ]);
    }
}
