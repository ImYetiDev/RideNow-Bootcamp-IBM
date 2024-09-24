<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vivienda;

class Residente extends Model
{
    use HasFactory;

    protected $table = 'residentes';
    protected $fillable = [
        'nombre',
        'email',
        'password'
    ];
    }