<?php

namespace Greenplugin\EmailBlackList;

use Illuminate\Support\ServiceProvider;

class EmailBlackListServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/emailBlackList.php', 'email-black-list');

        $this->app->singleton(EmailBlackListInterface::class, EmailBlackList::class);
    }


    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        $this->publishes([
            __DIR__ . '/../config/emailBlackList.php' => config_path('emailBlackList.php'),
        ], 'emailBlackList.config');
    }
}
