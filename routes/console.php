<?php

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CargaController;
use App\Http\Controllers\EmpacadoraMedicionController;
use App\Http\Controllers\PesosController;
use App\Http\Controllers\RacimosController;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
 */

Artisan::command('migrar:pesos', function () {
    $cc  = new PesosController;
    $res = $cc->update(7);
    dd($res);
});

Artisan::command('migrar:racimos', function () {
    $cc  = new RacimosController;
    $res = $cc->update(7);
    dd($res);
});

Artisan::command('migrar:carga', function () {
    $cc  = new CargaController;
    $res = $cc->update(7);
    dd($res);
});

Artisan::command('migrar:empacadoras', function () {
    $cc  = new EmpacadoraMedicionController;
    $res = $cc->update(7);
    dd($res);
});
