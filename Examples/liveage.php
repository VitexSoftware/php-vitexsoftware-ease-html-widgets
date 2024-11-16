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

require_once '../vendor/autoload.php';

$oPage = new \Ease\WebPage();

\Ease\Part::jQueryze();
date_default_timezone_set('Europe/Prague');

$now = new DateTime();
$oPage->addItem(new \Ease\Html\H1Tag('LiveAge Widget'));
$oPage->addItem($now->format('Y-m-d H:i:s').'<br>');
$oPage->addItem(new \Ease\Html\Widgets\LiveAge($now, ['title' => 'now']));

$oneminute = new DateTime();
$oPage->addItem(new \Ease\Html\H2Tag('LiveAge Widget +1 minute'));
$oneminute->modify('+1 minute');
$oPage->addItem($oneminute->format('Y-m-d H:i:s').'<br>');
$oPage->addItem(new \Ease\Html\Widgets\LiveAge($oneminute, ['title' => '+1 minute']));

$fiveminutes = new DateTime();
$oPage->addItem(new \Ease\Html\H2Tag('LiveAge Widget +5 minutes'));
$fiveminutes->modify('+5 minutes');
$oPage->addItem($fiveminutes->format('Y-m-d H:i:s').'<br>');
$oPage->addItem(new \Ease\Html\Widgets\LiveAge($fiveminutes, ['title' => '+5 minutes']));

$fifteenminutes = new DateTime();
$oPage->addItem(new \Ease\Html\H2Tag('LiveAge Widget -15 minutes'));
$fifteenminutes->modify('-15 minutes');
$oPage->addItem($fifteenminutes->format('Y-m-d H:i:s').'<br>');
$oPage->addItem(new \Ease\Html\Widgets\LiveAge($fifteenminutes, ['title' => '-15 minutes']));

$yesterday = new DateTime('yesterday 13:00');
$oPage->addItem(new \Ease\Html\H2Tag('LiveAge Widget Yesterday 13:00'));
$oPage->addItem($yesterday->format('Y-m-d H:i:s').'<br>');
$oPage->addItem(new \Ease\Html\Widgets\LiveAge($yesterday, ['title' => 'Yesterday 13:00']));

echo $oPage;
