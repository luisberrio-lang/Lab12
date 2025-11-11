<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Nota extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'titulo', 'contenido'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recordatorio()
    {
        return $this->hasOne(Recordatorio::class);
    }
}
