<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\AddProjetJob;
use App\Jobs\SendEmailJob;
use App\Console\Commands\Delete;
use App\Console\Commands\DeleteProjets;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // app/Console/Kernel.php

    protected $commands = [
        \App\Console\Commands\SendEmailCommand::class,
    ];



    protected function schedule(Schedule $schedule): void
    {
        // $schedule->call(function () {
        //     DB::table('projets')->delete(); 
        // })->everyMinute(); 
        $schedule->call(new Delete())->everyMinute();
        //$schedule->command(DeleteProjets::class)->everyMinute();

       //$schedule->command('creer:projet')->everyMinute();
        // $schedule->command('email:send')->everyMinute();
        $schedule->job(new SendEmailJob)->everyTwoMinutes();
       
        
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
