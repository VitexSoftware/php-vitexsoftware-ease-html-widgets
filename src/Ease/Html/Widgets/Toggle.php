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
 * Description of Toggle.
 *
 * @author vitex
 */
class Toggle extends \Ease\Html\LabelTag implements \Ease\Html\Input
{
    protected \Ease\Html\CheckboxTag $checkbox;

    /**
     * Toggle Switch.
     *
     * @param string                $name       Input Name
     * @param string                $value      Input Value
     * @param array<string, string> $properties Additional properties
     */
    public function __construct(string $name, string $value = '', $properties = [])
    {
        $properties['id'] = 'toggle'.$name;
        parent::__construct($properties['id'], '', ['class' => 'switch']);
        $this->checkbox = $this->addItem(new \Ease\Html\CheckboxTag($name, !empty($value), $value, $properties));
        $this->addItem(new \Ease\Html\SpanTag('', ['class' => 'slider']));
    }

    public function finalize(): void
    {
        $this->addCss(<<<'EOD'

/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

EOD);
        parent::finalize();
    }

    public function getValue(): string
    {
        return $this->checkbox->getValue();
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function setValue($value)
    {
        return $this->checkbox->setValue($value);
    }
}
