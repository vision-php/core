<?php

namespace Vision\Renderer;

use DOMElement;
use XmlAttribute;

class XmlElement extends DOMElement
{
    public function copyAttribute(Attribute $attribute, $alias = '')
    {
        $name = $attribute->getName();
        if ($alias) {
            $name = $alias;
        }
        $value = $attribute->getValue();
        
        if ($value!='') {
            $this->setAttribute($name, $value);
        }
    }
}
