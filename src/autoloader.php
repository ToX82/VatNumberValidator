<?php
/**
 * Manual Autoloader File (if composer isn't installed)
 *
 * @author  Emanuele "ToX" Toscano <toss82@gmail.com>
 * @license GNU General Public License; <https://www.gnu.org/licenses/gpl-3.0.en.html>
 */

namespace Tox82\VatNumChecker;

// Autoloading Classes Files
spl_autoload_register(
    function ($sClass) {
        // Hack to remove namespace and backslash
        $sClass = str_replace([__NAMESPACE__ . '\\', '\\'], DIRECTORY_SEPARATOR, $sClass);

        // Get library classes
        if (is_file(__DIR__ . $sClass . '.php')) {
            include_once __DIR__ . $sClass . '.php';
        }
    }
);
