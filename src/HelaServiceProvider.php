<?php

namespace Rascan\Hela;

use Illuminate\Http\Client\Events\ConnectionFailed;
use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Rascan\Hela\Facades\Hela;
use Rascan\Hela\Hela as HelaService;
use Rascan\Hela\Listeners\LogConnectionFailed;
use Rascan\Hela\Listeners\LogResponseReceived;

class HelaServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'rascan');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rascan');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        Http::macro('mpesa', function ($service) {
            return Http::withToken(Hela::authorize())
                ->withHeaders(compact('service'))
                ->baseUrl(Hela::baseUrl());
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/hela.php', 'hela');

        $this->app->singleton('hela', \Rascan\Hela\Hela::class);

        Event::listen(ResponseReceived::class, LogResponseReceived::class);

        Event::listen(ConnectionFailed::class, LogConnectionFailed::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['hela'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/hela.php' => config_path('hela.php'),
        ], 'hela.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/rascan'),
        ], 'hela.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/rascan'),
        ], 'hela.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/rascan'),
        ], 'hela.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
