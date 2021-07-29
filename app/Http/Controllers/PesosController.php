<?php
namespace App\Http\Controllers;

use App\Models\Local\Pesos;
use App\Models\Veintitres\PesosM;
use App\Models\Local\Configuracion;

class PesosController extends Controller
{
    public function index()
    {
        $empacadora = Configuracion::where('clave', "idempacadora");

        return $this->show($empacadora, 7);
    }

    public function show($empacadora, $dias)
    {
        $pesos = Pesos::where('idempacadora', $empacadora)
            ->whereRaw("date(`fechahora_registro`) between date_add(date(NOW()), INTERVAL -$dias DAY) AND date_add(date(NOW()), INTERVAL +1 DAY)")->get();

        return $pesos;
    }

    public function update($dias)
    {
        $empacadora = Configuracion::where('clave', "idempacadora")->first();
        $pesos      = $this->show($empacadora->valor, $dias);

        foreach ($pesos as $peso) {

            $pesoM = PesosM::firstOrNew([
                'idpeso'       => $peso->idpeso,
                'idempacadora' => $peso->idempacadora,
            ]);

            $pesoM->idcarga               = $peso->idcarga;
            $pesoM->ajuste                = $peso->ajuste;
            $pesoM->tara                  = $peso->tara;
            $pesoM->estado                = $peso->estado;
            $pesoM->idtipo_suelo          = $peso->idtipo_suelo;
            $pesoM->porcentaje_contenedor = $peso->porcentaje_contenedor;
            $pesoM->peso_neto             = $peso->peso_neto;
            $pesoM->peso_bruto            = $peso->peso_bruto;
            $pesoM->fechahora_registro    = $peso->fechahora_registro;
            $pesoM->correlativo           = $peso->correlativo;
            $pesoM->datos_procesados      = $peso->datos_procesados;
            $pesoM->save();
        }

        return 'Ok';
    }
}
