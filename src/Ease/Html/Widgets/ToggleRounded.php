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
 * Description of ToggleRounded.
 *
 * @author vitex
 */
class ToggleRounded extends Toggle
{
    public function __construct($name, $value = '', $properties = [])
    {
        parent::__construct($name, $value, $properties);
        $this->lastItem()->addTagClass('rounded');
    }

    public function finalize(): void
    {
        $this->addCss(<<<'EOD'

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

EOD);
        parent::finalize();
    }
}
