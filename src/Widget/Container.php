<?php

namespace Vision\Widget;

use Vision\Widget\WidgetTrait;

class Container implements ContainerInterface
{
    use WidgetTrait;
    
    private $children = array();
    
    public function addChild(WidgetInterface $child)
    {
        $this->children[] = $child;
    }
    
    public function getChildren()
    {
        return $this->children;
    }
}
