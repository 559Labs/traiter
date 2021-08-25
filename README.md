# Laravel Traiter - Generate traits for models

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ffnlabs/traiter.svg?style=flat-square)](https://packagist.org/packages/ffnlabs/traiter)
[![Total Downloads](https://img.shields.io/packagist/dt/ffnlabs/traiter.svg?style=flat-square)](https://packagist.org/packages/ffnlabs/traiter)
![GitHub Actions](https://github.com/ffnlabs/traiter/actions/workflows/main.yml/badge.svg)

## Installation

You can install the package via composer:

```bash
composer require ffnlabs/traiter --dev
```

## Usage

```php
php artisan make:traiter App\\Models\\ModelName
```

...or, within PHP or Tinker:

```php
$stubber = new FFNLabs\Traiter\ModelStubber(App\Models\ModelName::class);
$stubber->generate();
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hello@559labs.com instead of using the issue tracker.

## Credits

-   [559 Labs](https://github.com/ffnlabs)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
