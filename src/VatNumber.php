<?php
declare(strict_types=1);

/**
 * Licensed under The GNU General Public License v3.0
 */

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
     * Performs a formal validation of a VAT number, using these rules:
     * https://www.gov.uk/guidance/vat-eu-country-codes-vat-numbers-and-vat-in-other-languages
     *
     * @param string $country Country code
     * @param string $code    VAT number
     *
     * @return bool
     */
    public static function check(string $country, string $code): bool
    {
        switch ($country) {
        case "AT":
            // 9 characters. The first character is always ‘U’.
            return self::checkLength($code, 9, 9) && self::checkAustria($code);
        case "BE":
            // 10 characters
            return self::checkLength($code, 10, 10) && self::numbersOnly($code);
        case "BG":
            // 9 or 10 characters.
            return self::checkLength($code, 9, 10) && self::numbersOnly($code);
        case "HR":
            // 11 characters.
            return self::checkLength($code, 11, 11) && self::numbersOnly($code);
        case "CH":
            // 11 characters. 3 segments of 3 digits, seperated by ".",
            return self::checkLength($code, 11, 11) && self::checkSwitzerland($code);
        case "CY":
            // 9 characters. The last character must always be a letter.
            return self::checkLength($code, 9, 9) && self::checkCyprus($code);
        case "CZ":
            // 8, 9 or 10 characters
            return self::checkLength($code, 8, 10) && self::numbersOnly($code);
        case "DK":
            // 8 characters.
            return self::checkLength($code, 8, 8) && self::numbersOnly($code);
        case "EE":
            // 9 characters.
            return self::checkLength($code, 9, 9) && self::numbersOnly($code);
        case "FI":
            // 8 characters.
            return self::checkLength($code, 8, 8) && self::numbersOnly($code);
        case "FR":
            // 11 characters. May include alphabetical characters (any except O or I) as first or second or first and second characters.
            return self::checkLength($code, 11, 11) && self::checkFrance($code);
        case "DE":
            // 9 or 10 characters.
            return self::checkLength($code, 9, 9) && self::numbersOnly($code);
        case "EL":
            // 9 characters.
            return self::checkLength($code, 9, 9) && self::numbersOnly($code);
        case "GB":
            // 9 characters.
            return self::checkLength($code, 9, 9) && self::numbersOnly($code);
        case "HU":
            // 8 or 9 characters.
            return self::checkLength($code, 8, 8) && self::numbersOnly($code);
        case "IE":
            // 8 or 9 characters. Includes one or two alphabetical characters (last, or second and last, or last 2).
            return self::checkLength($code, 8, 9) && self::checkIreland($code);
        case 'IT':
            // 11 characters.
            return self::checkLength($code, 11, 11) && self::numbersOnly($code) && self::checkItaly($code);
        case "LV":
            // 11 characters.
            return self::checkLength($code, 11, 11) && self::numbersOnly($code);
        case "LT":
            // 9 or 12 characters.
            return self::checkLength($code, 9, 12) && self::numbersOnly($code);
        case "LU":
            // 8 characters.
            return self::checkLength($code, 8, 8) && self::numbersOnly($code);
        case "MT":
            // 8 characters.
            return self::checkLength($code, 8, 8) && self::numbersOnly($code);
        case "NL":
            // 12 characters. The tenth character is always B
            return self::checkLength($code, 12, 12) && self::checkNetherlands($code);
        case "NO":
            // 9 characters. 12 when it contains the letters MVA
            return self::checkLength($code, 9, 12) && self::checkNorway($code);
        case "PL":
            // 10 characters.
            return self::checkLength($code, 10, 10) && self::numbersOnly($code);
        case "PT":
            // 9 characters.
            return self::checkLength($code, 9, 9) && self::numbersOnly($code);
        case "RO":
            // From 2 to 10 characters.
            return self::checkLength($code, 2, 10) && self::numbersOnly($code);
        case "SK":
            // 10 characters.
            return self::checkLength($code, 10, 10) && self::numbersOnly($code);
        case "SI":
            // 8 characters.
            return self::checkLength($code, 8, 8) && self::numbersOnly($code);
        case "ES":
            // 9 characters. Includes one or two alphabetical characters (first or last or first and last).
            return self::checkLength($code, 9, 9) && self::checkSpain($code);
        case "SE":
            // 12 characters.
            return self::checkLength($code, 12, 12) && self::numbersOnly($code);
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
    public static function checkLength(string $code, int $min, int $max): bool
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
    public static function numbersOnly(string $code): bool
    {
        return is_numeric($code);
    }

    /**
     * Additional validations for Austria
     * Eg. U12345678
     *
     * @param string $code VAT number
     *
     * @return bool
     */
    public static function checkAustria(string $code): bool
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
    public static function checkSwitzerland(string $code): bool
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
    public static function checkCyprus(string $code): bool
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
    public static function checkFrance(string $code): bool
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
    public static function checkIreland(string $code): bool
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
    public static function checkItaly(string $code): bool
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
     * Additional validations for Netherlands
     *
     * @param string $code Regional VAT code
     *
     * @return bool
     */
    public static function checkNetherlands(string $code): bool
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
    public static function checkNorway(string $code): bool
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
     * Additional validations for Spain
     *
     * @param string $code Regional VAT code
     *
     * @return bool
     */
    public static function checkSpain(string $code): bool
    {
        // The first and last character might be letters
        if (!preg_match('/^[0-9A-Z]{1}[0-9]{7}[0-9A-Z]{1}$/i', $code)) {
            return false;
        }

        return true;
    }
}
