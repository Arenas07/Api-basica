<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Camper extends Model{

    protected $table = 'campers'; // Nombre  de la tabla
    protected $primaryKey = 'id'; // Llave primaria 
    public $timestamps = true; // Habilita el uso del created_at y updated_at
    protected $fillable = ['nombre', 'edad', 'documento', 'tipo_documento', 'nivel_ingles', 'nivel_programacion']; // Columnas habilitas para la insercion


}