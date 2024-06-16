<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\School;

class SchoolObserver
{
    /**
     * Handle the School "created" event.
     */
    public function created(School $school): void
    {
        Log::create([
            'type' => 'created',
            'message' => "School ID: {$school->id}"
        ]);
    }

    /**
     * Handle the School "updated" event.
     */
    public function updated(School $school): void
    {
        Log::create([
            'type' => 'updated',
            'message' => "School: {$school->id}"
        ]);
    }

    /**
     * Handle the School "deleted" event.
     */
    public function deleted(School $school): void
    {
        Log::create([
            'type' => 'deleted',
            'message' => "School: {$school->id}"
        ]);
    }
}
