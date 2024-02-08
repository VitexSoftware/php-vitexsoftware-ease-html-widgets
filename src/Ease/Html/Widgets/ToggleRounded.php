<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace Ease\Html\Widgets;

/**
 * Description of ToggleRounded
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

    public function finalize()
    {
        $this->addCss('
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}            
');
        parent::finalize();
    }
}
