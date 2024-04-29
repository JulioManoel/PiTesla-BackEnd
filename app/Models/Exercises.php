<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $table = 'exercises';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description',
    ];
    protected $hidden = [
        'activity_id'
    ];

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
}
