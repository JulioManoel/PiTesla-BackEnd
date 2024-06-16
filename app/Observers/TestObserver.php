<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Test;

class TestObserver
{
    /**
     * Handle the Test "created" event.
     */
    public function created(Test $test): void
    {
        Log::create([
            'type' => 'created',
            'message' => "Test ID: {$test->id}"
        ]);
    }

    /**
     * Handle the Test "updated" event.
     */
    public function updated(Test $test): void
    {
        Log::create([
            'type' => 'updated',
            'message' => "Test ID: {$test->id}"
        ]);
    }

    /**
     * Handle the Test "deleted" event.
     */
    public function deleted(Test $test): void
    {
        Log::create([
            'type' => 'deleted',
            'message' => "Test ID: {$test->id}"
        ]);
    }
}
