<?php

namespace Vision\Widget;

trait TextTrait
{
    private $text;
    
    public function setText($text)
    {
        $this->text = $text;
    }
    
    public function getText()
    {
        return $this->text;
    }
}
