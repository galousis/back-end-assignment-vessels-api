<?php

namespace MarineTraffic\Core\Providers;

use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale(config('app.locale'));

        #region get migrations from with in each Container
        $migrations = Cache::get('migrations', function () 
        {
            $filesystem = new Filesystem();
            $migrations = [];

            foreach ($filesystem->directories(app_path('src/Containers')) as $dir) 
            {
                $migrationsDir = $dir . '/Data/Migrations';
                if (is_dir($migrationsDir)) 
                {
                    $migrations[] = $migrationsDir;
                }
            }
            // Cache them
            Cache::put('migrations', $migrations, 60);
            // return them
            return $migrations;
        });
        #endregion

        #region load them
        $this->loadMigrationsFrom($migrations);
        #endregion
    }
}
