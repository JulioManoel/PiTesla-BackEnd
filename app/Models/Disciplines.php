<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplines extends Model
{
    use HasFactory;
    protected $table = 'Disciplines';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description text',
    ];
}
