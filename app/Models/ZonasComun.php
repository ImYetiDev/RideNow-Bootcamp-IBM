<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZonasComun extends Model
{
    use HasFactory;

    protected $table = 'zonas_comunes';
    protected $fillable = ['nombre','estado'];

   
}
