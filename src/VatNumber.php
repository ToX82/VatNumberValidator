<?php

declare(strict_types=1);

namespace Tox82;

/**
 * A simple, no dependency formal VAT number validator 
 *
 * @category VAT_Number_Validation
 * @package  Tox82\VatNumber
 * @author   Emanuele "ToX" Toscano <toss82@gmail.com>
 * @license  GNU General Public License; <https://www.gnu.org/licenses/gpl-3.0.en.html>
 * @link     https://www.gov.uk/guidance/vat-eu-country-codes-vat-numbers-and-vat-in-other-languages
 * @link     https://en.wikipedia.org/wiki/VAT_identification_number
 */
class VatNumber
{
    /**
     * Public method that executes a formal validation of a VAT number
     *
     * @param string $country Country code
     * @param string $code    VAT number
     *
     * @return bool
     */
    public static function check(string $country, string $code): bool
    {
        switch ($country) {
        case "AL":
            // 10 characters, the first position following the prefix is "J" or "K" or "L", 
            // and the last character is a letter
            return self::_checkLength($code, 10, 10) && self::_checkAlbania($code);
        case "AT":
            // 9 characters. The first character is always ‘U’.
            return self::_checkLength($code, 9, 9) && self::_checkAustria($code);
        case "AU":
            // 11 digit number formed from a 9 digit unique identifier and two suffix check digits.
            return self::_checkLength($code, 11, 11) && self::_numbersOnly($code);
        case "BE":
            // 10 digits.
            return self::_checkLength($code, 10, 10) && self::_numbersOnly($code);
        case "BG":
            // 9 or 10 digits.
            return self::_checkLength($code, 9, 10) && self::_numbersOnly($code);
        case "BY":
            // 9 digits.
            return self::_checkLength($code, 9, 9) && self::_numbersOnly($code);
        case "CA":
            // 9 characters.
            return self::_checkLength($code, 9, 9);
        case "HR":
            // 11 digits.
            return self::_checkLength($code, 11, 11) && self::_numbersOnly($code);
        case "CH":
            // 11 characters. 3 segments of 3 digits, seperated by ".",
            return self::_checkLength($code, 11, 11) && self::_checkSwitzerland($code);
        case "CY":
            // 9 characters. The last character must always be a letter.
            return self::_checkLength($code, 9, 9) && self::_checkCyprus($code);
        case "CZ":
            // 8, 9 or 10 digitss
            return self::_checkLength($code, 8, 10) && self::_numbersOnly($code);
        case "DK":
            // 8 digits.
            return self::_checkLength($code, 8, 8) && self::_numbersOnly($code);
        case "EE":
            // 9 digits.
            return self::_checkLength($code, 9, 9) && self::_numbersOnly($code);
        case "FI":
            // 8 digits.
            return self::_checkLength($code, 8, 8) && self::_numbersOnly($code);
        case "FR":
            // 11 characters. May include alphabetical characters (any except O or I) as first or second or first and second characters.
            return self::_checkLength($code, 11, 11) && self::_checkFrance($code);
        case "DE":
            // 9 or 10 digits.
            return self::_checkLength($code, 9, 9) && self::_numbersOnly($code);
        case "EL":
            // 9 digits.
            return self::_checkLength($code, 9, 9) && self::_numbersOnly($code);
        case "ES":
            // 9 characters. Includes one or two alphabetical characters (first or last or first and last).
            return self::_checkLength($code, 9, 9) && self::_checkSpain($code);
        case "GB":
            // 9 digits.
            return self::_checkLength($code, 9, 9) && self::_numbersOnly($code);
        case "HU":
            // 8 or 9 digits.
            return self::_checkLength($code, 8, 8) && self::_numbersOnly($code);
        case "ID":
            // 15 digits.
            return self::_checkLength($code, 15, 15) && self::_numbersOnly($code);
        case "IE":
            // 8 or 9 characters. Includes one or two alphabetical characters (last, or second and last, or last 2).
            return self::_checkLength($code, 8, 9) && self::_checkIreland($code);
        case "IL":
            // 9 digits.
            return self::_checkLength($code, 9, 9) && self::_numbersOnly($code);
        case "IN":
            // 15 digits.
            return self::_checkLength($code, 15, 15) && self::_numbersOnly($code);
        case "IS":
            // 5 or 6 characters.
            return self::_checkLength($code, 5, 6);
        case 'IT':
            // 11 characters.
            return self::_checkLength($code, 11, 11) && self::_checkItaly($code);
        case "LV":
            // 11 digits.
            return self::_checkLength($code, 11, 11) && self::_numbersOnly($code);
        case "LT":
            // 9 or 12 digits.
            return self::_checkLength($code, 9, 12) && self::_numbersOnly($code);
        case "LU":
            // 8 digits.
            return self::_checkLength($code, 8, 8) && self::_numbersOnly($code);
        case "KZ":
            // 12 digits.
            return self::_checkLength($code, 12, 12) && self::_numbersOnly($code);
        case "MK":
            // 15 characters, the first two positions are for the prefix "MK", followed by 13 numbers
            return self::_checkLength($code, 15, 15) && self::_checkNorthMacedonia($code);
        case "MT":
            // 8 digits.
            return self::_checkLength($code, 8, 8) && self::_numbersOnly($code);
        case "NG":
            // 12 digits and 1 dash, in the format 01012345-0001
            return self::_checkLength($code, 13, 13) && self::_checkNigeria($code);
        case "NL":
            // 12 characters. The tenth character is always B
            return self::_checkLength($code, 12, 12) && self::_checkNetherlands($code);
        case "NO":
            // 9 characters. 12 when it contains the letters MVA
            return self::_checkLength($code, 9, 12) && self::_checkNorway($code);
        case "NZ":
            // 9 digits.
            return self::_checkLength($code, 9, 9) && self::_numbersOnly($code);
        case "PL":
            // 10 digits.
            return self::_checkLength($code, 10, 10) && self::_numbersOnly($code);
        case "PT":
            // 9 digits.
            return self::_checkLength($code, 9, 9) && self::_numbersOnly($code);
        case "RO":
            // From 2 to 10 digits.
            return self::_checkLength($code, 2, 10) && self::_numbersOnly($code);
        case "RS":
            // 9 digits.
            return self::_checkLength($code, 9, 9) && self::_numbersOnly($code);
        case "RU":
            // 10, 12 or 13 characters
            return self::_checkLength($code, 10, 13) && self::_checkRussia($code);
        case "SA":
            // 15 digits.
            return self::_checkLength($code, 15, 15) && self::_numbersOnly($code);
        case "SK":
            // 10 digits.
            return self::_checkLength($code, 10, 10) && self::_numbersOnly($code);
        case "SI":
            // 8 digits.
            return self::_checkLength($code, 8, 8) && self::_numbersOnly($code);
        case "SM":
            // 5 digits.
            return self::_checkLength($code, 5, 5) && self::_numbersOnly($code);
        case "SE":
            // 12 digits.
            return self::_checkLength($code, 12, 12) && self::_numbersOnly($code);
        case "TR":
            // 10 digits.
            return self::_checkLength($code, 10, 10) && self::_numbersOnly($code);
        case "UA":
            // 12 digits.
            return self::_checkLength($code, 12, 12) && self::_numbersOnly($code);
        case "UZ":
            // 9 digits.
            return self::_checkLength($code, 9, 9) && self::_numbersOnly($code);
        }

        return true;
    }

    /**
     * Checks that a string is within a certain length.
     *
     * @param string $code VAT number
     * @param int    $min  Min length
     * @param int    $max  Max length
     *
     * @return bool
     */
    private static function _checkLength(string $code, int $min, int $max): bool
    {
        return strlen($code) >= $min && strlen($code) <= $max;
    }

    /**
     * Checks that a string is only numbers.
     *
     * @param string $code VAT number
     *
     * @return bool
     */
    private static function _numbersOnly(string $code): bool
    {
        return is_numeric($code);
    }

    /**
     * Additional validations for Albania
     * Eg. K99999999L or L99999999G
     *
     * @param string $code VAT number
     *
     * @return bool
     */
    private static function _checkAlbania(string $code): bool
    {
        if (!preg_match('/^[JKL]{1}[0-9]{8}[A-Z]{1}$/', $code)) {
            return false;
        }

        return true;
    }

    /**
     * Additional validations for Austria
     * Eg. U12345678
     *
     * @param string $code VAT number
     *
     * @return bool
     */
    private static function _checkAustria(string $code): bool
    {
        // The first character must be U
        if (!preg_match('/^[U]{1}[0-9]{8}$/i', $code)) {
            return false;
        }

        return true;
    }

    /**
     * Additional validations for Switzerland
     * Eg. 123.456.789
     *
     * @param string $code VAT number
     *
     * @return bool
     */
    private static function _checkSwitzerland(string $code): bool
    {
        // The last character must be a letter
        if (!preg_match('/^[0-9]{3}[\.]{1}[0-9]{3}[\.]{1}[0-9]{3}$/i', $code)) {
            return false;
        }

        return true;
    }

    /**
     * Additional validations for Cyprus
     * Eg. 12345678X
     *
     * @param string $code VAT number
     *
     * @return bool
     */
    private static function _checkCyprus(string $code): bool
    {
        // The last character must be a letter
        if (!preg_match('/^[0-9]{8}[A-Z]{1}$/i', $code)) {
            return false;
        }

        return true;
    }

    /**
     * Additional validations for France
     * Eg. 12345678901 - X1234567890 - 1X123456789 - XX123456789
     *
     * @param string $code VAT number
     *
     * @return bool
     */
    private static function _checkFrance(string $code): bool
    {
        // check that $code does not contain "O" or "I"
        if (strpos($code, 'O') !== false || strpos($code, 'I') !== false) {
            return false;
        }

        // after the first two characters, only digits are allowed
        if (!preg_match('/^[0-9A-Z]{2}[0-9]{9}$/i', $code)) {
            return false;
        }

        return true;
    }

    /**
     * Additional validations for Ireland
     *
     * @param string $code Regional VAT code
     *
     * @return bool
     */
    private static function _checkIreland(string $code): bool
    {
        $return = false;

        if (preg_match('/^[0-9]{7,8}[A-Z]{1,2}$/i', $code)) {
            $return = true;
        } elseif (preg_match('/^[0-9]{1}[A-Z]{1}[0-9]{5,6}[A-Z]{1}$/i', $code)) {
            $return = true;
        }

        return $return;
    }

    /**
     * Additional validations for Italy
     *
     * @param string $code Regional VAT code
     *
     * @return bool
     */
    private static function _checkItaly(string $code): bool
    {
        $return = true;

        $first = 0;
        for ($i = 0; $i <= 9; $i += 2) {
            $first += ord($code[$i]) - ord('0');
        }

        for ($i = 1; $i <= 9; $i += 2) {
            $second = 2 * (ord($code[$i]) - ord('0'));

            if ($second > 9) {
                $second = $second - 9;
            }
            $first += $second;
        }
        if ((10 - $first % 10) % 10 != ord($code[10]) - ord('0')) {
            $return = false;
        }

        return $return;
    }

    /**
     * Additional validations for NorthMacedonia
     * Eg. MK4032013544513
     *
     * @param string $code Regional VAT code
     *
     * @return bool
     */
    private static function _checkNorthMacedonia(string $code): bool
    {
        if (!preg_match('/^[M]{1}[K]{1}[0-9]{13}$/i', $code)) {
            return false;
        }

        return true;
    }

    /**
     * Additional validations for Nigeria
     * Eg. 01012345-0001
     *
     * @param string $code Regional VAT code
     *
     * @return bool
     */
    private static function _checkNigeria(string $code): bool
    {
        if (!preg_match('/^[0-9]{8}[-]{1}[0-9]{4}$/i', $code)) {
            return false;
        }

        return true;
    }

    /**
     * Additional validations for Netherlands
     *
     * @param string $code Regional VAT code
     *
     * @return bool
     */
    private static function _checkNetherlands(string $code): bool
    {
        // the tenth character is always B
        if (!preg_match('/^[0-9]{9}[B]{1}[0-9]{2}$/i', $code)) {
            return false;
        }

        return true;
    }

    /**
     * Additional validations for Norway
     *
     * @param string $code Regional VAT code
     *
     * @return bool
     */
    private static function _checkNorway(string $code): bool
    {
        $return = false;

        // the string must be 9 digits, or 9 digits followed by MVA
        if (preg_match('/^[0-9]{9}$/i', $code)) {
            $return = true;
        } elseif (preg_match('/^[0-9]{9}[MVA]{3}$/i', $code)) {
            $return = true;
        }
        
        return $return;
    }

    /**
     * Additional validations for Russia
     *
     * @param string $code Regional VAT code
     *
     * @return bool
     */
    private static function _checkRussia(string $code): bool
    {
        if (strlen($code) !== 10 && strlen($code) !== 12 && strlen($code) !== 13) {
            return false;
        }

        return true;
    }

    /**
     * Additional validations for Spain
     *
     * @param string $code Regional VAT code
     *
     * @return bool
     */
    private static function _checkSpain(string $code): bool
    {
        // The first and last character might be letters
        if (!preg_match('/^[0-9A-Z]{1}[0-9]{7}[0-9A-Z]{1}$/i', $code)) {
            return false;
        }

        return true;
    }
}
