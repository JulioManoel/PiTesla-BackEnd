<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answerd_options extends Model
{
    use HasFactory;
    protected $table = 'Answers_Options';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'correct boolean',
    ];
}