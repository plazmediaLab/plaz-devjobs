<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    //

    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'skills',
        'categoria_id',
        'experiencia_id',
        'ubicacion_id',
        'salario_id',
    ];

    // Relación 1:1 --- categoria => vacante
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    // Relación 1:1 --- salario => vacante
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }
    // Relación 1:1 --- ubicacion => vacante
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
    // Relación 1:1 --- experiencia => vacante
    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }
    // Relación 1:1 --- reclutador => vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
