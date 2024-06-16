<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Observers\ExercicseObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([ExercicseObserver::class])]
class Exercise extends Model
{
    use HasFactory;
    protected $table = 'exercises';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description',
        'test_id',
    ];
    
    protected $hidden = [
        'test_id'
    ];

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    public function answersOptions(): HasMany
    {
        return $this->hasMany(Answer_Option::class);
    }
}
