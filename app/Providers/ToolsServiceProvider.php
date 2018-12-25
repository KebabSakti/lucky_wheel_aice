<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tools\ActivityLogClass;

class ToolsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('ActivityLogClass', function () {
            return new ActivityLogClass;
        });
    }
}