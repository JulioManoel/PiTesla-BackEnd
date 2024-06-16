<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Course;

class CourseObserver
{
    /**
     * Handle the Course "created" event.
     */
    public function created(Course $course): void
    {
        Log::create([
            'type' => 'created',
            'message' => "Course ID: {$course->id}"
        ]);
    }

    /**
     * Handle the Course "updated" event.
     */
    public function updated(Course $course): void
    {
        Log::create([
            'type' => 'updated',
            'message' => "Course ID: {$course->id}"
        ]);
    }

    /**
     * Handle the Course "deleted" event.
     */
    public function deleted(Course $course): void
    {
        Log::create([
            'type' => 'deleted',
            'message' => "Course ID: {$course->id}"
        ]);
    }
}
