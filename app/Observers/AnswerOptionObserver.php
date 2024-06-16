<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Answer_Option;

class AnswerOptionObserver
{
    /**
     * Handle the Answer_Option "created" event.
     */
    public function created(Answer_Option $answer_Option): void
    {
        Log::create([
            'type' => 'created',
            'message' => "AnswerOption ID: {$answer_Option->id}"
        ]);
    }

    /**
     * Handle the Answer_Option "updated" event.
     */
    public function updated(Answer_Option $answer_Option): void
    {
        Log::create([
            'type' => 'updated',
            'message' => "AnswerOption ID: {$answer_Option->id}"
        ]);
    }

    /**
     * Handle the Answer_Option "deleted" event.
     */
    public function deleted(Answer_Option $answer_Option): void
    {
        Log::create([
            'type' => 'deleted',
            'message' => "AnswerOption ID: {$answer_Option->id}"
        ]);
    }
}
