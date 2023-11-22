# Hela

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
<!-- [![StyleCI][ico-styleci]][link-styleci] -->

Hela is a package that provides an elegant interface to interact with Safaricom's Daraja APIs. 
<!-- This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list. -->

## Requirements

### PHP >= 8.2
Hela uses modern PHP features that are only supported in PHP 8.2 and above.

### Laravel >= 10
Hela is a Laravel specific application and will only run inside of a laravel application. 

## Installation

In order to get started with Hela, you will need to pull the package using composer.

```bash
composer require rascan/hela
```
php artisan vendor:publish --provider="Rascan\Hela\HelaServiceProvider" --tag=config

## Configuration

### Publishing
Publishing the configuration file

### Defaults

## Usage

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

```bash
composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author@email.com instead of using the issue tracker.

## Credits

- [Author Name][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/rascan/hela.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/rascan/hela.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/rascan/hela/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/rascan/hela
[link-downloads]: https://packagist.org/packages/rascan/hela
[link-travis]: https://travis-ci.org/rascan/hela
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/rascan
[link-contributors]: ../../contributors
