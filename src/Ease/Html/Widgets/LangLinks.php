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
class LangLinks extends \Ease\Html\UlTag
{
    /**
     * Language Selector.
     *
     * @param array<string, string> $properties
     */
    public function __construct(array $properties = [])
    {
        parent::__construct(null, $properties);
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
