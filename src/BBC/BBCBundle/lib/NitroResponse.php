<?php

namespace BBC\BBCBundle\Lib;
use Iterator;
use Countable;
use SimpleXMLElement;

class NitroResponse implements Iterator, Countable
{
    protected $doc;
    protected $instanceClass;
    protected $results = array();
    protected $position = 0;
    protected $count = 0;


    public function __construct(SimpleXMLElement $doc)
    {
        $this->doc = $doc;
        $attrs = $doc->results->attributes();
        $this->count = (int)$attrs['total'];
    }

    public function setInstanceClass($instanceClass)
    {
        $this->instanceClass = $instanceClass;
    }

    /**
     * -------------- Implement Countable -------------
     */
    public function count()
    {
        return $this->count;
    }    

    /**
     * ------------- Implement Iterator -----------------
     */

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        $instanceClass = $this->instanceClass;
        $instance = $instanceClass::buildFromSimpleXML($this->doc->results->service[$this->position]);
        return $instance;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position ++;
    }

    public function valid()
    {
        return isset($this->doc->results->service[$this->position]);
    }
}