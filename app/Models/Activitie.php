<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activitie extends Model
{
    use HasFactory;
    protected $table = 'activities';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'video',
        'description text',
    ];
    protected $hidden = [
        'course_id'
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
