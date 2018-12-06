<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SendLeadsCommand::class
        ,Commands\SendEmktCpaCommand::class
        ,Commands\CreateServiceCommand::class
        ,Commands\ServiceEnableCommand::class
        ,Commands\ServiceDisableCommand::class
    ];


    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('run:selenium');
    }
}