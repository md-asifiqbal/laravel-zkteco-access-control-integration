<?php

namespace Asif160627\ZktecoAccessControl;

use Asif160627\ZktecoAccessControl\Services\AccessControlService;
use Illuminate\Support\ServiceProvider;

class AccessControlServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/access_control.php' => config_path('access_control.php'),
        ], 'zkteco-access-control');
    }

    public function register()
    {
        $this->app->bind(AccessServiceInterface::class, AccessControlService::class);
        $this->mergeConfigFrom(__DIR__ . '/../config/access_control.php', 'access_control');

        $this->app->bind('access-control', function () {
            return new AccessControlService();
        });
    }
}
