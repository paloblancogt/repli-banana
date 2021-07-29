<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\PesosController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PesosJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   
    /**
     * Create a new job instance.
     *
     * @return void
     */

    
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cc    = new PesosController;
        $res   = $cc->update(7);
        $texto = "[" . date("Y-m-d H:i:s") . "] Pesos: " . $res . "\n";
        Storage::append("archivo.txt", $texto);
    }
}
