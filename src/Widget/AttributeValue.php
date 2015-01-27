<?php

namespace Vision\Widget;

class AttributeValue
{
    public function __construct($value)
    {
        $this->value = $value;
    }
    
    public function __toString()
    {
        return strtoupper($this->value) . '!!!';
    }
}
