<?php
namespace Link;

Class SinglyNode{
    public int $val;

    public ? SinglyNode $next = null;

    public function __construct(int $x)
    {
        $this->val = $x;
    }
}

