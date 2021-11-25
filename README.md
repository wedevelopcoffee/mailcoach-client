# Provides a simple-to-use client to communicate with Mailcoach.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wedevelopcoffee/mailcoach-client.svg?style=flat-square)](https://packagist.org/packages/wedevelopcoffee/mailcoach-client)
[![Tests](https://github.com/wedevelopcoffee/mailcoach-client/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/wedevelopcoffee/mailcoach-client/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/wedevelopcoffee/mailcoach-client.svg?style=flat-square)](https://packagist.org/packages/wedevelopcoffee/mailcoach-client)

## Todo
- [ ] Handle error responses
- [ ] Subscribe a user
- [ ] Resend the confirmation
- [ ] Confirm a subscriber
- [ ] Update a subscriber
- [ ] Unsubscribe
- [ ] Delete a subscriber
- [ ] Create examples
- [ ] Write tests


## Installation

You can install the package via composer:

```bash
composer require wedevelopcoffee/mailcoach-client
```

## Usage

```php
$skeleton = new WeDevelopCoffee\MailcoachClient();
echo $skeleton->echoPhrase('Hello, WeDevelopCoffee!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Daniel Koop](https://github.com/mrkoopie)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
