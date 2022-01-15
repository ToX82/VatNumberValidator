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
$isValid = $validator->check('GB', '731331179');

// $isValid can be true or false
```

Resources
---------
 * [Report issues](https://github.com/tox82/vatvalidator/issues)
 * [Send Pull Requests](https://github.com/tox82/vatvalidator/pulls)
 * [Check the main repository](https://github.com/tox82/vatvalidator)
