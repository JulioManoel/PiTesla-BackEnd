<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercise extends Model
{
    use HasFactory;
    protected $table = 'exercises';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description',
        'activity_id',
    ];
    protected $hidden = [
        'activity_id'
    ];

    public function test(): BelongsTo
    {
        return $this->belongsTo(Exercise::class);
    }
}
