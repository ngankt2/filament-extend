<?php

namespace Wiz\VNLocation;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WizVnLocationProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('wiz-filament-vn-location');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

    }
}
