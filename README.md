# Laravel SMS Gateway Ghasedak Driver

Ghasedak SMS gateway driver for [`misaf/laravel-sms-gateway`](https://github.com/misaf/laravel-sms-gateway).

## Installation

```bash
composer require misaf/laravel-sms-gateway-ghasedak
```

Laravel package discovery registers the driver service provider automatically.

## Configuration

```env
SMS_GATEWAY_DRIVER=ghasedak
SMS_GATEWAY_GHASEDAK_APIKEY=your-api-key
```

```php
// config/services.php
'ghasedak' => [
    'api_key' => env('SMS_GATEWAY_GHASEDAK_APIKEY'),
],
```

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('ghasedak')->send([
    'receptor' => '09123456789',
    'message'  => 'Hello',
]);
```

The payload is passed directly to Ghasedak, so use the fields expected by the Ghasedak API.

Use `request()` when you need direct access to Laravel's HTTP client:

```php
$request = SmsGateway::driver('ghasedak')->request();
```

## Testing

```bash
composer test
composer analyse
```

## License

MIT
