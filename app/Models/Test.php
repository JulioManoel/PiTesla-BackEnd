<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Test extends Model
{
    use HasFactory;
    protected $table = 'tests';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description',
        'activity_id',
    ];
    
    protected $hidden = [
        'activity_id'
    ];

    public function activitie(): BelongsTo
    {
        return $this->belongsTo(Activitie::class);
    }

    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }
}

