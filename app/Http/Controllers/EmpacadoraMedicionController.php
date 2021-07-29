<?php
namespace App\Http\Controllers;

use App\Models\Local\Configuracion;
use App\Models\Local\EmpacadoraMedicion;
use App\Models\Veintitres\EmpacadoraMedicionM;

class EmpacadoraMedicionController extends Controller
{
    public function index()
    {
        $empacadora = Configuracion::where('clave', "idempacadora");

        return $this->show($empacadora, 7);
    }

    public function show($empacadora, $dias)
    {
        EmpacadoraMedicionM::where('idempacadora', $empacadora)
            ->whereRaw("date(`digitado`) between date_add(date(NOW()), INTERVAL -$dias DAY)  AND date_add(date(NOW()), INTERVAL +1 DAY)")->delete();

        $empmedis = EmpacadoraMedicion::where('idempacadora', $empacadora)
            ->whereRaw("date(`digitado`) between date_add(date(NOW()), INTERVAL -$dias DAY)  AND date_add(date(NOW()), INTERVAL +1 DAY)")->get();

        return $empmedis;
    }

    public function update($dias)
    {
        $empacadora = Configuracion::where('clave', "idempacadora")->first();
        $empmedis   = $this->show($empacadora->valor, $dias);

        foreach ($empmedis as $empmedi) {

            $empmediM                = new EmpacadoraMedicionM;
            $empmediM->idmedicion    = $empmedi->idmedicion;
            $empmediM->idcable       = $empmedi->idcable;
            $empmediM->idvalvula     = $empmedi->idvalvula;
            $empmediM->idempacadora  = $empmedi->idempacadora;
            $empmediM->fecha         = $empmedi->fecha;
            $empmediM->usuario       = $empmedi->usuario;
            $empmediM->observaciones = $empmedi->observaciones;
            $empmediM->valor         = $empmedi->valor;
            $empmediM->idcinta       = $empmedi->idcinta;
            $empmediM->idcuadrilla   = $empmedi->idcuadrilla;
            $empmediM->idcontenedor  = $empmedi->idcontenedor;
            $empmediM->estado        = $empmedi->estado;
            $empmediM->semana        = $empmedi->semana;
            $empmediM->digitado      = $empmedi->digitado;
            $empmediM->anio          = $empmedi->anio;
            $empmediM->idmotivo      = $empmedi->idmotivo;
            $empmediM->peso_neto     = $empmedi->peso_neto;
            $empmediM->save();
        }

        return 'Ok';
    }
}
