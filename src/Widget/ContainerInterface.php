<?php

namespace Vision\Widget;

interface ContainerInterface extends WidgetInterface
{
    public function addChild(WidgetInterface $widget);
    public function getChildren();
    
}
