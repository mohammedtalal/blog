<?php

namespace App\Console;

use App\Console\Commands\NotifyEmails;
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
        \App\Console\Commands\NotifyEmails::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    // * * * * * php //media/mohammedtalal/F/Sites/blog/artisan schedule:run >> /dev/null 2>&1
    // artisan notify:emails > '/dev/null' 2>&1
    protected function schedule(Schedule $schedule)
    {
        $schedule->exec('php artisan notify:emails');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
