<?php

namespace Vision\Loader;

use Vision\Widget\ContainerInterface;
use Vision\Widget\Button;
use Vision\Widget\TextBox;
use Vision\Widget\AttributeValue;

class XmlLoader implements LoaderInterface
{
    public function load(ContainerInterface $container, $filename)
    {
        $widget = new Button();
        $widget->setId('1');
        $widget->setText('One!');
        $container->addChild($widget);

        $widget = new Button();
        $widget->setId('2');
        
        $a = new AttributeValue('My attribute');
        $widget->setText($a);
        $container->addChild($widget);

        $widget = new TextBox();
        $widget->setId('text1');
        $widget->setValue('Some value');
        $container->addChild($widget);
        
        return $container;
    }
}
