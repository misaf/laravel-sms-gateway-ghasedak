<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayGhasedak\Drivers;

use Misaf\LaravelSmsGateway\SmsGatewayDriver;

final class GhasedakDriver extends SmsGatewayDriver
{
    protected function driverName(): string
    {
        return 'ghasedak';
    }

    protected function defaultGateway(): string
    {
        return 'https://api.ghasedak.me/v2/sms/send/simple';
    }

    protected function apiKeyHeader(): string
    {
        return 'apikey';
    }
}
