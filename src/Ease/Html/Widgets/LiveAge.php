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

use Ease\Html\TimeTag;

/**
 * LiveAge.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class LiveAge extends TimeTag
{
    /**
     * Show live time to timestamp.
     *
     * @param \DateTimeInterface    $dater      When to count from
     * @param array<string, string> $properties TimeTag properties
     */
    public function __construct(\DateTimeInterface $dater, array $properties = [])
    {
        $days = $dater->diff(new \DateTime())->days;
        $age = ($dater->getTimestamp() - (new \DateTime())->getTimestamp());

        $properties['datetime'] = $dater->format('Y-m-d\TH:i:s');
        parent::__construct(
            $days.' '._('days').', '.gmdate('G:i:s', $age),
            $properties,
        );
        $this->setTagID();

        $this->addJavaScript(<<<'EOD'

function component(x, v) {
    return Math.floor(x / v);
}

function updateCountdown(tagID, targetTimestamp) {
    var now = new Date().getTime() / 1000;
    var timeDifference = targetTimestamp - now;
    var isFuture = timeDifference > 0;
    var sign = isFuture ? "+" : "-";
    var absDifference = Math.abs(timeDifference);

    var days = component(absDifference, 24 * 60 * 60);
    var hours = component(absDifference, 60 * 60) % 24;
    var minutes = component(absDifference, 60) % 60;
    var seconds = Math.floor(absDifference % 60);

    document.getElementById(tagID).innerHTML = sign + " " + days + "d " + hours + "h " + minutes + "m " + seconds + "s";
}

var targetTimestamp
EOD.$this->getTagID().' = '.$dater->getTimestamp().<<<'EOD'
;

setInterval(function() {
    updateCountdown("
EOD.$this->getTagID().'", targetTimestamp'.$this->getTagID().<<<'EOD'
);
}, 1000);

EOD);
    }
}
