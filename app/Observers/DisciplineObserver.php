<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Discipline;

class DisciplineObserver
{
    /**
     * Handle the Discipline "created" event.
     */
    public function created(Discipline $discipline): void
    {
        Log::create([
            'type' => 'created',
            'message' => "Discipline ID: {$discipline->id}"
        ]);
    }

    /**
     * Handle the Discipline "updated" event.
     */
    public function updated(Discipline $discipline): void
    {
        Log::create([
            'type' => 'updated',
            'message' => "Discipline ID: {$discipline->id}"
        ]);
    }

    /**
     * Handle the Discipline "deleted" event.
     */
    public function deleted(Discipline $discipline): void
    {
        Log::create([
            'type' => 'deleted',
            'message' => "Discipline ID: {$discipline->id}"
        ]);
    }
}
