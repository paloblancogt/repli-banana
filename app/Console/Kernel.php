<?php
namespace App\Console;

use App\Jobs\PesosJob;
use App\Jobs\CargasJob;
use App\Jobs\RacimosJob;
use App\Jobs\EmpacadorasJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(PesosJob::class)->everyFifteenMinutes();
        $schedule->job(RacimosJob::class)->everyTenMinutes();
        $schedule->job(CargasJob::class)->everyFiveMinutes();
        $schedule->job(EmpacadorasJob::class)->everyThirtyMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
