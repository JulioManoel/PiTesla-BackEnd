<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer_Option extends Model
{
    use HasFactory;
    protected $table = 'answers_options';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'correct',
        'exercise_id',
    ];
    protected $hidden = [
        'exercise_id'
    ];

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }
}