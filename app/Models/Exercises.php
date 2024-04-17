<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercises extends Model
{
    use HasFactory;
    protected $table = 'Exercises';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description text',
    ];
}
