<?php
include_once "trien-khai-LinkedList/Node.php";

class LinkList
{
    private $count;
    private $firstNode;
    private $lastNode;

    public function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = 0;
    }

    public function addFirst($data)
    {
        $node = new Node($data);
        $node->next = $this->firstNode;
        $this->firstNode = $node;
        if (is_null($this->lastNode)) {
            $this->lastNode = $node;
        }
        $this->count++;
    }

    public function addLast($data)
    {
        if (!is_null($this->firstNode)) {
            $node = new Node($data);
            $this->lastNode->next = $node;
            $node->next = null;
            $this->lastNode = $node;
            $this->count++;
        } else {
            $this->addFirst($data);
        }
    }

    public function add($index, $obj)
    {
        if ($index == 0) {
            $this->addFirst($obj);
        } else if ($index >= $this->count) {
            $this->addLast($obj);
        } else {
            $current = $this->firstNode;
            $beforeCurrent = null;
            $node = new Node($obj);
            for ($i = 0; $i < $index; $i++) {
                $beforeCurrent = $current;
                $current = $current->next;
            }
            $beforeCurrent->next = $node;
            $node->next = $current;
        }
    }

    public function delete($index)
    {
        if ($index == 0) {

        } elseif ($index >= $this->count) {
            $this->lastNode->next = null;
        } else {
            $current = $this->firstNode;
            $beforeCurrent = null;
            $afterCurrent = $current->next;
            for ($i = 0; $i < $index; $i++) {
                $beforeCurrent = $current;
                $current = $current->next;
                $afterCurrent = $current->next;
            }
            $beforeCurrent->next = $afterCurrent;
        }
    }

    public function get($index)
    {
        $count = 0;
        $current = $this->firstNode;
        while (!is_null($current)) {
            if ($count == $index) {
                return $current->readNode();
            }
            $current = $current->next;
            $count++;
        }
    }

    public function size()
    {
        return $this->count;
    }

    public function printList()
    {
        $current = $this->firstNode;
        while (!is_null($current)) {
            echo $current->readNode() . " ";
            $current = $current->next;
        }
    }

    public function readList()
    {
        $listData = [];
        $current = $this->firstNode;

        while (!is_null($current)) {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        return $listData;
    }
}