<?php

namespace DenisKisel\DBConfig;

use Illuminate\Support\ServiceProvider;

class DBConfigServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['constructor'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/dbconfig.php' => config_path('dbconfig.php'),
        ], 'dbconfig.config');

        // Registering package commands.
         $this->commands([
             DBConfigShowCommand::class,
             DBConfigInstallCommand::class
         ]);
    }
}
