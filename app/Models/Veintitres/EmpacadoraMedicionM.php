<?php

namespace App\Models\Veintitres;

use Illuminate\Database\Eloquent\Model;

class EmpacadoraMedicionM extends Model
{
    protected $connection = 'veintitres';
    protected $table      = 'empacadora_medicion';
    protected $guarded    = [];   
    public $timestamps    = false;
}
