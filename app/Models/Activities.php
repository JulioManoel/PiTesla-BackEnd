<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    protected $table = 'Activities';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'video',
        'description text',
    ];
}
