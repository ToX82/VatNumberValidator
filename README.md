# VAT validator
## A formal VAT number validator

It's not a full validation tool, it just checks that the VAT number is formally valid: eg. 11 chars, digits only, etc.
It's built using these rules:
 * https://www.gov.uk/guidance/vat-eu-country-codes-vat-numbers-and-vat-in-other-languages
 * https://en.wikipedia.org/wiki/VAT_identification_number

It requires PHP >= 7.0.

Installation:
```shell
composer require tox82/vatnumber-validator
```

Usage
-----------

Just load the VatNumber class and execute a check, passing the country code and VAT code as parameters, 
and it will return a boolean value. True for valid VAT number, false for invalid.


```php
use Tox82\VatNumber;

...

echo VatNumber::check('FR', '12345678901'); // true
echo VatNumber::check('HU', '12345678'); // true
echo VatNumber::check('PT', '123456789'); // true
echo VatNumber::check('SE', '123456789012'); // true

echo VatNumber::check('AT', 'U123456780'); // false because of invalid number's length
echo VatNumber::check('MK', 'AA4032013544513'); // false because of  invalid characters
```

TODO
-----------

Add specific, more robust validation for each country, when available. Eg. check digits. prefixes, suffixes, etc.

Resources
---------
 * [Report issues](https://github.com/ToX82/VatNumberValidator/issues)
 * [Send Pull Requests](https://github.com/ToX82/VatNumberValidator/pulls)
 * [Check the main repository](https://github.com/ToX82/VatNumberValidator)
