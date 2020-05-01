<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;
    protected $fillable = [ 'cedula_identidad', 'numero_registro', 'numero_cama',
                            'nombre', 'direccion', 'fecha_nacimiento', 'sexo'];
}
