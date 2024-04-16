<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'dateBirth',
        'scholasticsm',
        'experience',
        'coins',
        'email',
        'passwor',
    ];
}
