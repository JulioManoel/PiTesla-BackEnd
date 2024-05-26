<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discipline extends Model
{
    use HasFactory;
    protected $table = 'disciplines';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description',
        'school_id',
    ];
    protected $hidden = [
        'school_id'
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
