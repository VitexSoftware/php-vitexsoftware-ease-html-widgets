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
 * Description of LangSelect.
 *
 * @author vitex
 */
class LangSelect extends \Ease\Html\SelectTag
{
    public function __construct($name = 'lang', $properties = [])
    {
        parent::__construct($name, $properties);
        $locale = \Ease\Locale::singleton();

        foreach ($locale->availble() as $code => $name) {
            $name = substr($name, 0, strpos($name, ' ('));

            if (\Ease\Locale::$localeUsed === $code) {
                $this->addItemSmart(new \Ease\Html\StrongTag(new \Ease\Html\ATag(
                    '?locale='.$code,
                    $name,
                )));
            } else {
                $this->addItemSmart(new \Ease\Html\ATag('?locale='.$code, $name));
            }
        }
    }
}
