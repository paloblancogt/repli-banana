<?php

namespace App\Models\Veintitres;

use Illuminate\Database\Eloquent\Model;

class PesosM extends Model
{
    protected $connection = 'veintitres';
    protected $table      = 'pesos';
    protected $primaryKey = 'id';
    protected $guarded    = [];   
    public $timestamps    = false;
}
