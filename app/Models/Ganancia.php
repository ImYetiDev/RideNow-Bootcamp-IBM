<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganancia extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'monto',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
