<?php

namespace PHPTelexAPM\ErrorMonitor;

use Illuminate\Support\ServiceProvider;

class ErrorMonitorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/errormonitor.php' => config_path('errormonitor.php'),
        ], 'config');

        $this->app->singleton('errorhandler', function () {
            return new ErrorHandler();
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/errormonitor.php', 'errormonitor'
        );
    }
}
