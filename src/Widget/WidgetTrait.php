<?php

namespace Vision\Widget;

trait WidgetTrait
{
    private $id;
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function addClass($className)
    {
        
    }
    
    public function getClasses()
    {
        return array();
    }
    
    public function removeClass($className)
    {
        
    }
    
    public function clearClasses()
    {
        
    }
}
