<?php

require_once '../vendor/autoload.php';

$oPage = new \Ease\WebPage();

$oPage->addItem(new \Ease\Html\Widgets\Toggle('tog1','a'));
$oPage->addItem(new \Ease\Html\Widgets\ToggleRounded('tog2','b'));

echo $oPage;
