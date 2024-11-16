<?php

declare(strict_types=1);

/**
 * This file is part of the EaseHtmlWidgets package
 *
 * https://github.com/VitexSoftware/php-vitexsoftware-ease-html-widgets
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ease\Html\Widgets;

/**
 * Description of OpenClipart.
 *
 * @author vitex
 */
class OpenClipart extends \Ease\Html\ATag
{
    /**
     * OpenClipart Image.
     *
     * @param string                $directory  Directory with images
     * @param string                $alt        Image Alt
     * @param array<string, string> $properties Additional properties
     */
    public function __construct($directory, $alt, $properties = [])
    {
        $randomImage = self::randomImage($directory);

        if (\array_key_exists('title', $properties) === false) {
            $properties['title'] = _('Visit OpenClipart.org - the source of most of our images');
        }

        parent::__construct('https://openclipart.org/detail/'.str_replace('.svg', '', $randomImage), new \Ease\Html\ImgTag($directory.'/'.$randomImage, $alt, $properties));
    }

    /**
     * Get Random Image from Directory.
     *
     * @param string $dir Directory with images
     */
    public static function randomImage(string $dir): string
    {
        $files = scandir($dir);

        if (($key = array_search('.', $files, true)) !== false) {
            unset($files[$key]);
        }

        if (($key = array_search('..', $files, true)) !== false) {
            unset($files[$key]);
        }

        $file = array_rand($files);

        return $files[$file];
    }
}
