<?php

namespace BBC\BBCBundle\Models;
use SimpleXMLElement;

/**
 * Base Model
 */
class BaseModel
{
    protected $xmlElem;
    protected $data = array();

    public static function buildFromSimpleXML(SimpleXMLElement $element)
    {
        $class = get_called_class();

        $data = array();
        foreach($element as $key => $value)
        {
            $data[$key] = $value;
        }

        return new $class($data);
    }

    public function __construct(array $data = array())
    {
        foreach($data as $key => $value)
        {
            $this->data[$key] = $value;
        }
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}