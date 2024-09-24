<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regionales extends Model
{
    use HasFactory;

    protected $table = 'regionales';
    
    protected $fillable = [
        'id',
        'nombre'
    ];
    }