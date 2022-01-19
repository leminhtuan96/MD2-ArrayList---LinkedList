<?php

class MyList
{
    private $size;
    private $elements;
    public function __construct($size)
    {
        $this->elements=[];
        $this->size = $size;
    }
    public function insert($index,$obj)
    {
        $this->elements[$index] = $obj;
    }

    public function add($obj)
    {
        array_push($this->elements,$obj);
    }

    public function remove($index)
    {
        array_splice($this->elements,$index,1);
    }

    public function getAll()
    {
        return $this->elements;
    }

    public function get($index)
    {
        return $this->elements[$index];
    }

    public function clear()
    {
        $this->elements=[];
    }

    public function addAll($arr)
    {
        $this->elements = array_merge($this->elements,$arr);
    }

    public function indexOf($obj)
    {
        return array_search($obj,$this->elements);
    }

    public function isEmpty()
    {
        return empty($this->elements);
    }

    public function sort()
    {
        $this->elements = sort($this->elements);
    }

    public function size()
    {
        return count($this->elements);
    }
}