<?php


namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table = 'usuarios'; // Nombre  de la tabla
    protected $primaryKey = 'id'; // Llave primaria 
    public $timestamps = false; // Habilita el uso del created_at y updated_at
    protected $fillable = ['nombre', 'email', 'password', 'rol']; // Columnas habilitas para la insercion
    protected $hidden = ['password'];

}