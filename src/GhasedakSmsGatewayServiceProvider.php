<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayGhasedak;

use Illuminate\Contracts\Foundation\Application;
use Misaf\LaravelSmsGateway\SmsGatewayManager;
use Misaf\LaravelSmsGatewayGhasedak\Drivers\GhasedakDriver;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class GhasedakSmsGatewayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-sms-gateway-ghasedak');
    }

    public function packageRegistered(): void
    {
        $this->app->afterResolving(SmsGatewayManager::class, function (SmsGatewayManager $manager, Application $app): void {
            $manager->extend('ghasedak', fn(): GhasedakDriver => $app->make(GhasedakDriver::class));
        });

        if ($this->app->bound(SmsGatewayManager::class)) {
            $this->app->make(SmsGatewayManager::class)->extend('ghasedak', fn(Application $app): GhasedakDriver => $app->make(GhasedakDriver::class));
        }
    }
}
