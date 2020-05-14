<?php
namespace Link;

require 'Node.php';

use Link\SinglyNode as Node;

Class SinglyLink{
    public int $size;

    public ? Node $head;

    public function __construct()
    {
        $this->size = 0;
        $this->head = null;
    }

     /** Get the value of the index-th node in the linked list. If the index is invalid, return -1. */

    public function get(int $index)
    {
        if ($index < 0 || $index > $this->size) return -1;

        $curr = $this->head;

        for ($i = 0; $i < $index; $i++) $curr = $curr->next;

        return $curr->val;
    }

    public function addAtIndex(int $index, int $val)
    {
        if ($index > $this->size) return ;

        if ($index < 0) return ;

        ++ $this->size;

        $pred = $this->head;
        for ($i = 0; $i < $index; ++$i) $pred = $pred->next;

        $toAdd = new Node($val);
        $toAdd = $pred->next;
        $pred->next = $toAdd;
    }

    public function deleteAtIndex(int $index)
    {
        if ($index < 0 || $index >= $this->size) return ;

        $this->size --;

        $pred = $this->head;

        for ($i = 0; $i < $index; $i++) $pred = $pred->next;

        $pred->next = $pred->next->next;
    }
    public function addAtHead(int $val)
    {
        $this->addAtIndex(0, $val);
    }

    public function addAtTail(int $val)
    {
        $this->addAtIndex($this->size, $val);
    }
}
