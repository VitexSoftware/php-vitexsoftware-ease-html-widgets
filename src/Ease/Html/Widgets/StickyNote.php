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
 * Description of StickyNote.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class StickyNote extends \Ease\Html\DivTag
{
    public function finalize(): void
    {
        $this->addCSS(<<<'EOD'

.sticky {
  right: 0;
  z-index: 150;
  transform: rotate(2deg);
  width: 250px;
  min-height: 150px;
  margin: -10px 10px 10px;
  padding: 10px;
  font-family: "Comic Sans MS", "Comic Sans", "Chalkboard SE", "Comic Neue", cursive;
  font-size: 14px;
  color: #000;
  background: rgba(255, 255, 51, 0.8);
  box-shadow: -2px 2px 2px rgba(0,0,0,0.3);
}
.sticky:before, .sticky:after {
  content: "";
  display: block;
  position: absolute;
  width: 16px;
  height: 16px;
  top: 0;
  right: 0;
}
.sticky:before {
  border-top: solid 8px #fff;
  border-right: solid 8px #fff;
  border-left: solid 8px transparent;
  border-bottom: solid 8px transparent;
}
.sticky:after {
  border-bottom: solid 8px #dddd33;
  border-left: solid 8px #dddd33;
  border-right: solid 8px transparent;
  border-top: solid 8px transparent;
}

EOD);
        $this->addTagClass('sticky');
    }
}
