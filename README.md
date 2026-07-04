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
    'base_url' => env('SMS_GATEWAY_GHASEDAK_BASE_URL', 'https://api.ghasedak.me/v2/'),
],
```

## Driver Behavior

| Option | Value |
| --- | --- |
| Driver name | `ghasedak` |
| Default base URL | `https://api.ghasedak.me/v2/` |
| `send()` endpoint | `POST sms/send/simple` |
| Authentication | `apikey` header when `services.ghasedak.api_key` is configured |
| Payload | Sent directly to Ghasedak |

## Usage

```php
use Misaf\LaravelSmsGateway\Facade\SmsGateway;

$response = SmsGateway::driver('ghasedak')->send([
    'message'  => 'Here is a test message.',
    'receptor' => '+989119632587',
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
