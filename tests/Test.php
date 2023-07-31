<?php
/**
 * @author  Emanuele "ToX" Toscano <toss82@gmail.com>
 * @license GNU General Public License; <https://www.gnu.org/licenses/gpl-3.0.en.html>
 */

declare(strict_types=1);

namespace Tox82\Tests\Validator;

use PHPUnit\Framework\TestCase;
use Tox82\VatNumber;

/**
 * Tests!
 */
class VatTest extends TestCase
{
    /**
     * Valid VAT numbers should be valid!
     *
     * @return void
     */
    public function testCheckValids()
    {
        $this->assertTrue(VatNumber::check('AL', 'K99999999L'));
        $this->assertTrue(VatNumber::check('AL', 'L99999999G'));
        $this->assertTrue(VatNumber::check('AT', 'U12345678'));
        $this->assertTrue(VatNumber::check('AU', '12345678901'));
        $this->assertTrue(VatNumber::check('BE', '1234567894'));
        $this->assertTrue(VatNumber::check('BG', '123456789'));
        $this->assertTrue(VatNumber::check('BG', '1234567890'));
        $this->assertTrue(VatNumber::check('BY', '190190190'));
        $this->assertTrue(VatNumber::check('CA', '1234567AB'));
        $this->assertTrue(VatNumber::check('CH', '123.456.789'));
        $this->assertTrue(VatNumber::check('CY', '12345678X'));
        $this->assertTrue(VatNumber::check('CZ', '12345678'));
        $this->assertTrue(VatNumber::check('CZ', '123456789'));
        $this->assertTrue(VatNumber::check('CZ', '1234567890'));
        $this->assertTrue(VatNumber::check('DE', '122265872'));
        $this->assertTrue(VatNumber::check('DK', '12345678'));
        $this->assertTrue(VatNumber::check('EE', '123456789'));
        $this->assertTrue(VatNumber::check('EL', '123456789'));
        $this->assertTrue(VatNumber::check('ES', '12345678X'));
        $this->assertTrue(VatNumber::check('ES', 'X12345678'));
        $this->assertTrue(VatNumber::check('ES', 'X1234567X'));
        $this->assertTrue(VatNumber::check('FI', '12345678'));
        $this->assertTrue(VatNumber::check('FR', '12345678901'));
        $this->assertTrue(VatNumber::check('FR', '12345678901'));
        $this->assertTrue(VatNumber::check('FR', '1X123456789'));
        $this->assertTrue(VatNumber::check('FR', 'X1234567890'));
        $this->assertTrue(VatNumber::check('FR', 'XX123456789'));
        $this->assertTrue(VatNumber::check('GB', '123456789'));
        $this->assertTrue(VatNumber::check('HR', '12345678901'));
        $this->assertTrue(VatNumber::check('HU', '12345678'));
        $this->assertTrue(VatNumber::check('IE', '1234567X'));
        $this->assertTrue(VatNumber::check('IE', '1234567XX'));
        $this->assertTrue(VatNumber::check('IE', '1X23456X'));
        $this->assertTrue(VatNumber::check('IT', '00154189997'));
        $this->assertTrue(VatNumber::check('IT', '01573850516'));
        $this->assertTrue(VatNumber::check('LT', '123456789'));
        $this->assertTrue(VatNumber::check('LT', '123456789012'));
        $this->assertTrue(VatNumber::check('LU', '12345678'));
        $this->assertTrue(VatNumber::check('LV', '12345678901'));
        $this->assertTrue(VatNumber::check('MK', 'MK4032013544513'));
        $this->assertTrue(VatNumber::check('MT', '12345678'));
        $this->assertTrue(VatNumber::check('NG', '01012345-0001'));
        $this->assertTrue(VatNumber::check('NL', '123456789B01'));
        $this->assertTrue(VatNumber::check('NO', '123456789'));
        $this->assertTrue(VatNumber::check('NO', '123456789MVA'));
        $this->assertTrue(VatNumber::check('PL', '1234567890'));
        $this->assertTrue(VatNumber::check('PT', '123456789'));
        $this->assertTrue(VatNumber::check('RO', '12'));
        $this->assertTrue(VatNumber::check('RO', '123'));
        $this->assertTrue(VatNumber::check('RO', '1234'));
        $this->assertTrue(VatNumber::check('RO', '12345'));
        $this->assertTrue(VatNumber::check('RO', '123456'));
        $this->assertTrue(VatNumber::check('RO', '1234567'));
        $this->assertTrue(VatNumber::check('RO', '12345678'));
        $this->assertTrue(VatNumber::check('RO', '123456789'));
        $this->assertTrue(VatNumber::check('RO', '1234567890'));
        $this->assertTrue(VatNumber::check('RU', '9999999999'));
        $this->assertTrue(VatNumber::check('RU', '999999999999'));
        $this->assertTrue(VatNumber::check('RU', '9999999999999'));
        $this->assertTrue(VatNumber::check('SE', '123456789012'));
        $this->assertTrue(VatNumber::check('SI', '12345678'));
        $this->assertTrue(VatNumber::check('SK', '1234567890'));
    }

    /**
     * Unexpected country codes should be valid
     *
     * @return void
     */
    public function testCheckWithUnexpectedCountry()
    {
        $this->assertTrue(VatNumber::check('XX', '123456789'));
    }

    /**
     * VAT numbers with invalid lengths should be invalid
     *
     * @return void
     */
    public function testCheckWithInvalidLength()
    {
        $this->assertFalse(VatNumber::check('AL', 'A999999999G'));
        $this->assertFalse(VatNumber::check('AT', 'U123456780'));
        $this->assertFalse(VatNumber::check('AU', '123456789012'));
        $this->assertFalse(VatNumber::check('CA', '1234567ABC'));
        $this->assertFalse(VatNumber::check('DE', '12226587'));
        $this->assertFalse(VatNumber::check('IT', '001541899970'));
        $this->assertFalse(VatNumber::check('MK', 'MK40320135445131'));
        $this->assertFalse(VatNumber::check('RU', '99999999999999'));
    }

    /**
     * VAT numbers with invalid characters should be invalid
     *
     * @return void
     */
    public function testCheckWithInvalidCharacters()
    {
        $this->assertFalse(VatNumber::check('AL', 'A99999999G'));
        $this->assertFalse(VatNumber::check('AL', 'K999999999'));
        $this->assertFalse(VatNumber::check('AT', 'A12345678'));
        $this->assertFalse(VatNumber::check('AU', 'A2345678901'));
        $this->assertFalse(VatNumber::check('DE', '122265873'));
        $this->assertFalse(VatNumber::check('IT', '01573850514'));
        $this->assertFalse(VatNumber::check('MK', 'AA4032013544513'));
        $this->assertFalse(VatNumber::check('NO', '123456789MV'));
    }
}
