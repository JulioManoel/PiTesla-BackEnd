<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Observers\TeacherObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([TeacherObserver::class])]
class Teacher extends Authenticatable
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
        'school_id',
        'password',
        'remember_token',
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
