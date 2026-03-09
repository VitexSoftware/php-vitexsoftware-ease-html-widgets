<?php
/**
 * Autoloader for Debian package context (EaseHtml Widgets).
 *
 * This file is intended for use in the Debian package build or test environment.
 * It loads classes from /usr/share/php/EaseHtml/Widgets/ and subdirectories.
 */

declare(strict_types=1);

// PSR-4 autoloader for 'Ease\\Html\\Widgets' namespace in /usr/share/php/EaseHtml/Widgets/
spl_autoload_register(function ($class) {
    if (str_starts_with($class, 'Ease\\Html\\Widgets\\')) {
        $path = __DIR__ . '/Widgets/' . substr(str_replace('\\', '/', $class), strlen('Ease\\Html\\Widgets\\')) . '.php';
        if (file_exists($path)) {
            require_once $path;
        }
    }
});
