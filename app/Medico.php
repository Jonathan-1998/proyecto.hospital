<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class Medico extends Model
{
    use SoftDeletes;
    protected $fillable = [ 'cedula_identidad', 'nombre', 'especialdad', 'idHospital'];
}
