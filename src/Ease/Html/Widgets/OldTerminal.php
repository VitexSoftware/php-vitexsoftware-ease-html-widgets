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
 * Description of OldTerminal.
 *
 * @author vitex
 */
class OldTerminal extends \Ease\Html\DivTag
{
    /**
     * @var int background red color
     */
    public int $red = 0;

    /**
     * @var int background green color
     */
    public int $green = 150;

    /**
     * @var int background blue color
     */
    public int $blue = 0;

    /**
     * @var string font color
     */
    public string $color = 'white';

    /**
     * Old Style Terminal Div.
     *
     * @param mixed $content
     * @param array $properties
     */
    public function __construct($content = null, $properties = [])
    {
        parent::__construct(null, $properties);
        $this->addItem(new \Ease\Html\DivTag(new \Ease\Html\PreTag(new \Ease\Html\PairTag('output', [], $content), ['class' => 'console']), ['class' => 'faint', 'style' => 'z-index: 9']));

        if (empty($this->getTagID())) {
            $this->setTagID();
        }
    }

    /**
     * Prepare CSS.
     */
    public function finalize(): void
    {
        $this->addTagClass('OldTerminal');
        $this->addCSS(<<<'EOD'


#
EOD.$this->getTagID().<<<'EOD'
 {
  background-color: black;
  background-image: radial-gradient(rgba(
EOD.$this->red.', '.$this->green.', '.$this->blue.<<<'EOD'
, 0.75), black 120%);
  margin: 0;
  padding: 0;
  overflow: hidden;
  color:
EOD.$this->color.<<<'EOD'
;
  font: 1.3rem Inconsolata, monospace;
  text-shadow: 0 0 5px #C8C8C8;
}
#
EOD.$this->getTagID().<<<'EOD'
 .faint {
  margin: 0;
  paddig: 0;
  display: block;
  height: 100%;
  width: 100%;
  background: repeating-linear-gradient(0deg, rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.15) 1px, transparent 1px, transparent 2px);
  pointer-events: none;
}

#
EOD.$this->getTagID().<<<'EOD'
::selection {
  background: #0080FF;
  text-shadow: none;
}

#
EOD.$this->getTagID().<<<'EOD'
 pre {
  margin: 0;
}

EOD);
        parent::finalize();
    }

    /**
     * Set Background Red Color Value.
     *
     * @param int $color 0-255
     *
     * @return self
     */
    public function setBackRed(int $color)
    {
        $this->red = $color;

        return $this;
    }

    /**
     * Set Background Green Color Value.
     *
     * @param int $color 0-255
     *
     * @return self
     */
    public function setBackGreen(int $color)
    {
        $this->green = $color;

        return $this;
    }

    /**
     * Set Background Blue Color Value.
     *
     * @param int $color 0-255
     *
     * @return self
     */
    public function setBlue(int $color)
    {
        $this->blue = $color;

        return $this;
    }

    /**
     * Set Font Color Value.
     *
     * @param string $color color code or name
     *
     * @return self
     */
    public function setFontColor(string $color)
    {
        $this->color = $color;

        return $this;
    }
}
