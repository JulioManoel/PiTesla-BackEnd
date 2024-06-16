<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Activitie;

class ActivitieObserver
{
    /**
     * Handle the Activitie "created" event.
     */
    public function created(Activitie $activitie): void
    {
        Log::create([
            'type' => 'created',
            'message' => "Activitie ID: {$activitie->id}"
        ]);
    }

    /**
     * Handle the Activitie "updated" event.
     */
    public function updated(Activitie $activitie): void
    {
        Log::create([
            'type' => 'updated',
            'message' => "Activitie ID: {$activitie->id}"
        ]);
    }

    /**
     * Handle the Activitie "deleted" event.
     */
    public function deleted(Activitie $activitie): void
    {
        Log::create([
            'type' => 'deleted',
            'message' => "Activitie ID: {$activitie->id}"
        ]);
    }
}
