<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    protected $table = 'disciplines';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description',
    ];
}
