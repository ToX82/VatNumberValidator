<?php
/**
 * @author  Emanuele "ToX" Toscano <toss82@gmail.com>
 * @license GNU General Public License; <https://www.gnu.org/licenses/gpl-3.0.en.html>
 */

declare(strict_types=1);

namespace Tox82\Tests\Validator;

use PHPUnit_Framework_TestCase;
use Tox82\VatNumber\Validate;

/**
 * Tests!
 */
class VatTest extends PHPUnit_Framework_TestCase
{
    /**
     * Valid VAT numbers should be valid!
     *
     * @return void
     */
    public function testCheckValids()
    {
        $this->assertTrue(Validate::check('AT', 'U12345678'));
        $this->assertTrue(Validate::check('BE', '1234567890'));
        $this->assertTrue(Validate::check('BG', '123456789'));
        $this->assertTrue(Validate::check('BG', '1234567890'));
        $this->assertTrue(Validate::check('HR', '12345678901'));
        $this->assertTrue(Validate::check('CH', '123.456.789'));
        $this->assertTrue(Validate::check('CY', '12345678X'));
        $this->assertTrue(Validate::check('CZ', '12345678'));
        $this->assertTrue(Validate::check('CZ', '123456789'));
        $this->assertTrue(Validate::check('CZ', '1234567890'));
        $this->assertTrue(Validate::check('DK', '12345678'));
        $this->assertTrue(Validate::check('EE', '123456789'));
        $this->assertTrue(Validate::check('FI', '12345678'));
        $this->assertTrue(Validate::check('FR', '12345678901'));
        $this->assertTrue(Validate::check('FR', '12345678901'));
        $this->assertTrue(Validate::check('FR', 'X1234567890'));
        $this->assertTrue(Validate::check('FR', '1X123456789'));
        $this->assertTrue(Validate::check('FR', 'XX123456789'));
        $this->assertTrue(Validate::check('DE', '123456789'));
        $this->assertTrue(Validate::check('EL', '123456789'));
        $this->assertTrue(Validate::check('GB', '123456789'));
        $this->assertTrue(Validate::check('HU', '12345678'));
        $this->assertTrue(Validate::check('IE', '1234567X'));
        $this->assertTrue(Validate::check('IE', '1X23456X'));
        $this->assertTrue(Validate::check('IE', '1234567XX'));
        $this->assertTrue(Validate::check('IT', '00154189997'));
        $this->assertTrue(Validate::check('LV', '12345678901'));
        $this->assertTrue(Validate::check('LT', '123456789'));
        $this->assertTrue(Validate::check('LT', '123456789012'));
        $this->assertTrue(Validate::check('LU', '12345678'));
        $this->assertTrue(Validate::check('MT', '12345678'));
        $this->assertTrue(Validate::check('NL', '123456789B01'));
        $this->assertTrue(Validate::check('PL', '1234567890'));
        $this->assertTrue(Validate::check('PT', '123456789'));
        $this->assertTrue(Validate::check('RO', '12'));
        $this->assertTrue(Validate::check('RO', '123'));
        $this->assertTrue(Validate::check('RO', '1234'));
        $this->assertTrue(Validate::check('RO', '12345'));
        $this->assertTrue(Validate::check('RO', '123456'));
        $this->assertTrue(Validate::check('RO', '1234567'));
        $this->assertTrue(Validate::check('RO', '12345678'));
        $this->assertTrue(Validate::check('RO', '123456789'));
        $this->assertTrue(Validate::check('RO', '1234567890'));
        $this->assertTrue(Validate::check('SK', '1234567890'));
        $this->assertTrue(Validate::check('SI', '12345678'));
        $this->assertTrue(Validate::check('ES', 'X12345678'));
        $this->assertTrue(Validate::check('ES', '12345678X'));
        $this->assertTrue(Validate::check('ES', 'X1234567X'));
        $this->assertTrue(Validate::check('SE', '123456789012'));
    }

    /**
     * Unexpected country codes should be valid
     *
     * @return void
     */
    public function testCheckWithUnexpectedCountry()
    {
        $this->assertTrue(Validate::check('XX', '123456789'));
    }

    /**
     * VAT numbers with invalid lengths should be invalid
     *
     * @return void
     */
    public function testCheckWithInvalidLength()
    {
        $this->assertFalse(Validate::check('AT', 'U123456780'));
        $this->assertFalse(Validate::check('IT', '001541899970'));
    }

    /**
     * VAT numbers with invalid characters should be invalid
     *
     * @return void
     */
    public function testCheckWithInvalidCharacters()
    {
        $this->assertFalse(Validate::check('AT', 'A12345678'));
        $this->assertFalse(Validate::check('IT', 'IT00154189997'));
    }
}