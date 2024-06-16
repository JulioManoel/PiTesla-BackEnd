<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Teacher;

class TeacherObserver
{
    /**
     * Handle the Teacher "created" event.
     */
    public function created(Teacher $teacher): void
    {
        Log::create([
            'type' => 'created',
            'message' => "Teacher ID: {$teacher->id}"
        ]);
    }

    /**
     * Handle the Teacher "updated" event.
     */
    public function updated(Teacher $teacher): void
    {
        Log::create([
            'type' => 'updated',
            'message' => "Teacher ID: {$teacher->id}"
        ]);
    }

    /**
     * Handle the Teacher "deleted" event.
     */
    public function deleted(Teacher $teacher): void
    {
        Log::create([
            'type' => 'deleted',
            'message' => "Teacher ID: {$teacher->id}"
        ]);
    }
}
