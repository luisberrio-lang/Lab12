<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota_id',
        'fecha_inicio',
        'fecha_fin',
        'completado',
    ];
    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'completado' => 'boolean', 
    ];
    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

    public function actividades()
{
    return $this->hasMany(Actividad::class);
}
}
