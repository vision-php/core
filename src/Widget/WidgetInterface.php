<?php

namespace Vision\Widget;

interface WidgetInterface
{
    public function setId($id);
    public function getId();

    public function addClass($classname);
    public function removeClass($classname);
    public function getClasses();
    public function clearClasses();
    
}
