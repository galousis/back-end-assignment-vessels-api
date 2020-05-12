<?php

namespace MarineTraffic\Core\Kernels;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Kernel as BaseConsoleKernel;
use Illuminate\Support\Facades\Cache;

class ConsoleKernel extends BaseConsoleKernel
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
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $commands = Cache::get('commands', function () 
        {
            $filesystem = new Filesystem();
            $commands = [];

            foreach ($filesystem->directories(app_path('src/Containers')) as $directory) {
                $commandsDir = $directory . '/Commands';
                if (is_dir($commandsDir)) {
                    $commands[] = $commandsDir;
                }
            }

            Cache::put('commands', $commands, 60);
            return $commands;
        });

        $this->load($commands);
    }
}
