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
 * LiveAge.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class LiveAge extends \Ease\Html\TimeTag
{
    /**
     * Show live time to timestamp.
     *
     * @param long  $timestamp  UnixTime
     * @param array $properties TimeTag properties
     */
    public function __construct($timestamp, $properties = [])
    {
        $age = time() - $timestamp;
        $days = floor($age / 86400);
        $dater = new \DateTime();
        $dater->setTimestamp($timestamp);
        $properties['datetime'] = $dater->format('Y-m-d\TH:i:s');
        parent::__construct(
            $days.' '._('days').', '.gmdate('G:i:s', $age),
            $properties,
        );
        $this->setTagID();

        $this->addJavaScript(<<<'EOD'

var timestamp
EOD.$this->getTagID().' = '.$age.<<<'EOD'
;

function component(x, v) {
    return Math.floor(x / v);
}

var $div
EOD.$this->getTagID().' = $(\'#'.$this->getTagID().<<<'EOD'
');

setInterval(function() {

    timestamp
EOD.$this->getTagID().<<<'EOD'
++;

    var days
EOD.$this->getTagID().'    = component(timestamp'.$this->getTagID().<<<'EOD'
, 24 * 60 * 60),
        hours
EOD.$this->getTagID().'   = component(timestamp'.$this->getTagID().<<<'EOD'
,      60 * 60) % 24,
        minutes
EOD.$this->getTagID().' = component(timestamp'.$this->getTagID().<<<'EOD'
,           60) % 60,
        seconds
EOD.$this->getTagID().' = component(timestamp'.$this->getTagID().<<<'EOD'
,            1) % 60;

    $div
EOD.$this->getTagID().'.html(days'.$this->getTagID().' + " '._('days').', " + hours'.$this->getTagID().' + ":" + minutes'.$this->getTagID().' + ":" + seconds'.$this->getTagID().<<<'EOD'
);

}, 1000);

EOD);
    }
}
