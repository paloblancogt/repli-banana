<?php

namespace App\Models\Veintitres;

use Illuminate\Database\Eloquent\Model;

class CargaM extends Model
{
    protected $connection = 'veintitres';
    protected $table      = 'carga';
    protected $primaryKey = 'id';
    protected $guarded    = [];   
    public $timestamps    = false;
}
