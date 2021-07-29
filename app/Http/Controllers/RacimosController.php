<?php
namespace App\Http\Controllers;

use App\Models\Local\Configuracion;
use App\Models\Local\Racimos;
use App\Models\Veintitres\RacimosM;

class RacimosController extends Controller
{
    public function index()
    {
        $empacadora = Configuracion::where('clave', "idempacadora");

        return $this->show($empacadora, 7);
    }

    public function show($empacadora, $dias)
    {
        $racimos = Racimos::where('idempacadora', $empacadora)
            ->whereRaw("date(`fechahora`) between date_add(date(NOW()), INTERVAL -$dias DAY) AND date_add(date(NOW()), INTERVAL +1 DAY)")->get();

        return $racimos;
    }

    public function update($dias)
    {
        $empacadora = Configuracion::where('clave', "idempacadora")->first();
        $racimos    = $this->show($empacadora->valor, $dias);

        foreach ($racimos as $racimo) {

            $racimoM = RacimosM::firstOrNew([
                'idcarga'      => $racimo->idcarga,
                'correlativo'  => $racimo->correlativo,
                'idempacadora' => $racimo->idempacadora,
            ]);

            $racimoM->idcinta   = $racimo->idcinta;
            $racimoM->fechahora = $racimo->fechahora;
            $racimoM->idpeso    = $racimo->idpeso;
            $racimoM->estado    = $racimo->estado;
            $racimoM->save();
        }

        return 'Ok';
    }
}
