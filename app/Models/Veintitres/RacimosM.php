<?php

namespace App\Models\Veintitres;

use Illuminate\Database\Eloquent\Model;

class RacimosM extends Model
{
    protected $connection = 'veintitres';
    protected $table      = 'racimos';
    protected $primaryKey = 'id';
    protected $guarded    = [];   
    public $timestamps    = false;
}
