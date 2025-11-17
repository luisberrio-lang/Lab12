<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = [
        'recordatorio_id',
        'descripcion',
        'completado',
    ];

    protected $casts = [
        'completado' => 'boolean',
    ];

    public function recordatorio()
    {
        return $this->belongsTo(Recordatorio::class);
    }
}
