# xixisys/xixisys-php-sdk
sdk for xixisys api


## Installing

```shell
$ composer require xixisys/xixisys-php-sdk -vvv
```

## Usage

```php
use XiXisys/Sdk

$sdk = new Sdk('api key');
$url = $sdk->sdsHtmlUrl('50-00-0');

```

## API
```
string $sdk->sdsHtmlUrl('50-00-0', 'ghs')
string $sdk->sdsHtml('50-00-0', 'ghs')
string $sdk->complianceHtmlUrl('50-00-0')
string $sdk->complianceHtml('50-00-0')
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com//ixisys/xixisys-php-sdk/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com//ixisys/xixisys-php-sdk/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT