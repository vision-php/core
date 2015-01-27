<?php

namespace Vision\Renderer;

use Vision\Widget\Container;
use Vision\Widget\ContainerInterface;
use Vision\Widget\WidgetInterface;
use Vision\Widget\ButtonInterface;
use Vision\Widget\TextBoxInterface;
use Vision\Renderer\XmlElement;
use DOMDocument;
use DOMNode;

class DefaultRenderer implements RendererInterface
{
    private $renderMethodMap;
    
    public function __construct()
    {
        $map = array();
        $map['Vision\\Widget\\ButtonInterface'] = 'renderButton';
        $map['Vision\\Widget\\ContainerInterface'] = 'renderContainer';
        $map['Vision\\Widget\\TextBoxInterface'] = 'renderTextBox';
        $this->renderMethodMap = $map;
    }
    
    public function toHtml(WidgetInterface $widget)
    {
        // Create temporary root document (needed for mutable elements)
        $doc = new DOMDocument();
        
        // Set formatting parameters
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;
        
        // Get this element as an XmlElement
        $element = $this->render($widget, $doc);
        
        // Append it to the temporary document, so it can be rendered
        $doc->appendChild($element);
        
        // render html string (pretty printed)
        $html = $doc->saveXml($element);
        return $html;
    }

    private function widgetToRenderMethod(WidgetInterface $widget)
    {
        switch (get_class($widget)) {
            case 'Vision\Widget\Container':
                $renderMethodName = 'renderContainer';
                break;
            case 'Vision\Widget\Button':
                $renderMethodName = 'renderButton';
                break;
            default:
                throw new \RuntimeException("No render method for class " . get_class($widget));
        }
        return $renderMethodName;
    }
    
    public function render(WidgetInterface $widget, DOMNode $root)
    {
        $class = get_class($widget);
        $renderMethod = null;
        foreach ($this->renderMethodMap as $key => $value) {
            if (is_subclass_of($widget, $key)) {
                $renderMethod = $value;
            }
        }
        if (!$renderMethod) {
            throw new \RuntimeException("Unsupported widget class: " . $class);
        }
        
        $element = $this->$renderMethod($widget, $root);
        return $element;
    }
    
    private function renderButton(ButtonInterface $widget, DOMNode $root)
    {
        $element = new XmlElement('button');
        $element->nodeValue = $widget->getText();
        $root->appendChild($element);
        $element->setAttribute('class', 'btn btn-primary');
        
        $element->setAttribute('id', $widget->getId());
        
        return $element;
    }
    
    public function renderContainer(ContainerInterface $widget, DOMNode $root)
    {
        $element = new XmlElement('div');
        $root->appendChild($element);
        
        foreach ($widget->getChildren() as $child) {
            $node = $this->render($child, $element);
            $element->appendChild($node);
        }
        return $element;
    }


    private function renderTextBox(TextBoxInterface $widget, DOMNode $root)
    {
        $element = new XmlElement('input');
        $root->appendChild($element);
        $element->setAttribute('type', 'text');
        $element->setAttribute('class', 'form-control');
        
        $element->setAttribute('id', $widget->getId());
        
        return $element;
    }
    
}
