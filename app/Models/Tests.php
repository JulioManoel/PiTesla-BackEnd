<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tests extends Model
{
    use HasFactory;
    protected $table = 'Tests';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description text',
        'activity_id',
    ];
    protected $hidden = [
        'activity_id'
    ];

    public function activitie(): BelongsTo
    {
        return $this->belongsTo(Activitie::class);
    }
}

