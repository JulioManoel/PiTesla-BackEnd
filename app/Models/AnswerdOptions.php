<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerdOptions extends Model
{
    use HasFactory;
    protected $table = 'answers_options';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'correct',
    ];
}