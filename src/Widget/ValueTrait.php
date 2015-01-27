<?php

namespace Vision\Widget;

trait ValueTrait
{
    private $value;
    
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    public function getValue()
    {
        return $this->value;
    }
}
