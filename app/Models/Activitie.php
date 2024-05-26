<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activitie extends Model
{
    use HasFactory;
    protected $table = 'activities';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'video',
        'description',
        'course_id',
    ];

    protected $hidden = [
        'course_id'
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function tests(): HasMany
    {
        return $this->hasMany(Test::class);
    }
}
