<?php

namespace App\Models\Local;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table      = 'configuracion';
    protected $primaryKey = 'clave';
    public $timestamps    = false;
}
