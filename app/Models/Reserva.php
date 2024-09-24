<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ZonasComun;
use App\Models\Residente;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'zona comun id',
        'fecha reserva',
        'hora reserva',
        'estado',];

        public function Zonas_comun()
        {
            return $this->belongsTo(ZonasComun::class);
        }
        
        public function residente()
        {
            return $this->belongsTo(Residente::class);
        }
}
