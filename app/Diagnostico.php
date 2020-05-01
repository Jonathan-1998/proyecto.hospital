<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Diagnostico extends Model
{
    use SoftDeletes;
    protected $fillable = [ 'tipo', 'complicaciones'];

}
