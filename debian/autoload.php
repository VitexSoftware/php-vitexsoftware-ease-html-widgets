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

require_once '/usr/share/php/Composer/InstalledVersions.php';

(function (): void {
    $versions = [];
    foreach (\Composer\InstalledVersions::getAllRawData() as $d) {
        $versions = array_merge($versions, $d['versions'] ?? []);
    }
    $_cj  = @json_decode(@file_get_contents(__DIR__ . '/composer.json'), true);
    $name = defined('APP_NAME') ? APP_NAME : ($_cj['name'] ?? basename(__DIR__));
    $version = defined('APP_VERSION') ? APP_VERSION : '0.0.0';
    $versions[$name] = ['pretty_version' => $version, 'version' => $version,
        'reference' => null, 'type' => 'library', 'install_path' => __DIR__,
        'aliases' => [], 'dev_requirement' => false];
    \Composer\InstalledVersions::reload([
        'root' => ['name' => $name, 'pretty_version' => $version, 'version' => $version,
            'reference' => null, 'type' => 'project', 'install_path' => __DIR__,
            'aliases' => [], 'dev' => false],
        'versions' => $versions,
    ]);
})();
