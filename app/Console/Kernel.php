<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\MonthlyStock;
use App\Console\Commands\MonthlySalary;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\MonthlyStock::class,
        Commands\MonthlySalary::class,
        Commands\Cashhand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
     /*   $schedule->command('backup:run --only-db')
                    ->everyMinute()
                    ->timezone('Asia/Dhaka')
                    ->withoutOverlapping();*/
       $schedule->command('monthly:stock')
           ->everyMinute()
                ->timezone('Asia/Dhaka')
                ->withoutOverlapping();

        $schedule->command('monthly:salary') ->everyMinute()
            ->timezone('Asia/Dhaka')
            ->withoutOverlapping();
        $schedule->command('cash_hand') ->everyMinute()
            ->timezone('Asia/Dhaka')
            ->withoutOverlapping();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
