<?php

namespace TechnoCelebes\BasicController\Providers;

use Illuminate\Support\ServiceProvider;

class MasterViewProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/views/master.blade.php' => resource_path('views/master/master.blade.php'),
        ], 'my-package-views');
    }
}