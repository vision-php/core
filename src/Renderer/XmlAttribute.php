<?php

namespace Vision\Renderer;

class XmlAttribute
{
    private $name;
    private $values = array();
    private $seperator = ' ';
    
    public function __construct($name)
    {
        $this->setName($name);
    }
    
    /**
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setValue($value)
    {
        $this->values = array(); // clear existing values;
        $this->values[] = $value; // set provided value;
    }
    
    public function addValue($value)
    {
        $this->values[] = $value; // append provided value;
    }
    
    public function getValue()
    {
        $o = '';
        foreach ($this->values as $value) {
            $o .= $value . $this->seperator;
        }
        return trim($o, $this->seperator);
    }
    
    public function setSeperator($seperator)
    {
        $this->seperator = $seperator;
    }
    
    public function __toString()
    {
        return $this->getValue();
    }
}
