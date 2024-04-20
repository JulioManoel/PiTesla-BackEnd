<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    use HasFactory;
    protected $table = 'Tests';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'description text',
    ];
}
