# VAT validator
## A formal VAT number validator

It's not a full validation tool, it just checks that the VAT number is formally valid: eg. 11 chars, digits only, etc.
It's built using these rules: https://www.gov.uk/guidance/vat-eu-country-codes-vat-numbers-and-vat-in-other-languages

It requires PHP >= 7.0.

Installation:
```shell
`composer require tox82/vatvalidator`
```

Usage
-----------

Just load the Validate class and execute a check, passing the country code and VAT code as parameters:

```php
$validator = new Tox82\Validate\ValidateVat;
echo Validate::check('FR', '12345678901'); // true
echo Validate::check('HU', '12345678'); // true
echo Validate::check('PT', '123456789'); // true
echo Validate::check('SE', '123456789012'); // true

echo Validate::check('AT', 'U123456780'); // false because of invalid number's length
```

Resources
---------
 * [Report issues](https://github.com/tox82/vatvalidator/issues)
 * [Send Pull Requests](https://github.com/tox82/vatvalidator/pulls)
 * [Check the main repository](https://github.com/tox82/vatvalidator)