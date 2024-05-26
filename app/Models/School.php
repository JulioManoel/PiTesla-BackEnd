<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;
    protected $table = 'schools';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class); 
    }

    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function disciplines(): HasMany
    {
        return $this->hasMany(Discipline::class);
    }
}
