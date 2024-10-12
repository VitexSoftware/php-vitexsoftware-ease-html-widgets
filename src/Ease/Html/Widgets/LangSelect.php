<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ease\Html\Widgets;

/**
 * Description of LangSelect
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
            if (\Ease\Locale::$localeUsed == $code) {
                $this->addItemSmart(new \Ease\Html\StrongTag(new \Ease\Html\ATag(
                    '?locale=' . $code,
                    $name
                )));
            } else {
                $this->addItemSmart(new \Ease\Html\ATag('?locale=' . $code, $name));
            }
        }
    }
}
