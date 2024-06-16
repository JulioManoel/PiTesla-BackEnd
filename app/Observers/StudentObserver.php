<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Student;

class StudentObserver
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        Log::create([
            'type' => 'created',
            'message' => "Student ID: {$student->id}"
        ]);
    }

    /**
     * Handle the Student "updated" event.
     */
    public function updated(Student $student): void
    {
        Log::create([
            'type' => 'updated',
            'message' => "Student ID: {$student->id}"
        ]);
    }

    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        Log::create([
            'type' => 'deleted',
            'message' => "Student ID: {$student->id}"
        ]);
    }
}
