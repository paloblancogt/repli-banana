<?php
namespace App\Http\Controllers;

use App\Models\Local\Carga;
use App\Models\Local\Configuracion;
use App\Models\Veintitres\CargaM;


class CargaController extends Controller
{
    public function index()
    {
        $empacadora = Configuracion::where('clave', "idempacadora");

        return $this->show($empacadora, 7);
    }

    public function show($empacadora, $dias)
    {
        $racimos = Carga::where('idempacadora', $empacadora)
            ->whereRaw("date(`fechahora`) between date_add(date(NOW()), INTERVAL -$dias DAY)  AND date_add(date(NOW()), INTERVAL +1 DAY)")->get();

        return $racimos;
    }

    public function update($dias)
    {
        $empacadora = Configuracion::where('clave', "idempacadora")->first();
        $cargas     = $this->show($empacadora->valor, $dias);

        foreach ($cargas as $carga) {

            $cargaM = CargaM::firstOrNew([
                'idcarga'      => $carga->idcarga,
                'idempacadora' => $carga->idempacadora,
            ]);

            $cargaM->idcable      = $carga->idcable;
            $cargaM->semana       = $carga->semana;
            $cargaM->idcc         = $carga->idcc;
            $cargaM->idvalvula    = $carga->idvalvula;
            $cargaM->cuadrilla    = $carga->cuadrilla;
            $cargaM->fechahora    = $carga->fechahora;
            $cargaM->idcontenedor = $carga->idcontenedor;
            $cargaM->estado       = $carga->estado;
            $cargaM->idcarrero    = $carga->idcarrero;
            $cargaM->carrero      = $carga->carrero;
            $cargaM->save();
        }

        return 'Ok';
    }
}
