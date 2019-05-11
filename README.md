# Omnipay: Euplatesc

**Euplatesc driver for the Omnipay PHP payment processing library**

[![travis][ico-travis]][link-travis]
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE)

[Omnipay](https://github.com/thephpleague/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements Euplatesc support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "bytic/euplatesc": "^1.0"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

## Basic Usage

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

# Supported Methods

The supported gateway methods are:

* `purchase()` - redirect customer to payment form
* `completePurchase()` - for reading messages on redirect URL from gateway
* `serverCompletePurchase()` - for reading messages on IPN URL from gateway

[ico-version]: https://img.shields.io/packagist/v/bytic/omnipay-euplatesc.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-travis]: https://img.shields.io/travis/bytic/omnipay-euplatesc/master.svg
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/bytic/omnipay-euplatesc.svg
[ico-code-quality]: https://img.shields.io/scrutinizer/g/bytic/omnipay-euplatesc.svg
[ico-downloads]: https://img.shields.io/packagist/dt/bytic/omnipay-euplatesc.svg

[link-packagist]: https://packagist.org/packages/bytic/omnipay-euplatesc
[link-travis]: https://travis-ci.org/bytic/omnipay-euplatesc
[link-scrutinizer]: https://scrutinizer-ci.com/g/bytic/omnipay-euplatesc/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/bytic/omnipay-euplatesc
[link-downloads]: https://packagist.org/packages/bytic/omnipay-euplatesc
[link-author]: https://github.com/bytic