<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'dateBirth',
        'email',
        'password',
        'school_id',
    ];

    protected $hidden = [
        'school_id'
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
