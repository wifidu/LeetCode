<?php
namespace Link;
require 'Node.php';

use Link\SinglyNode;

Class SinglySentinel {
    public int $size;
    public ? SinglyNode $head = null;

    public function __construct()
    {
        $this->size = 0;
        $this->head = new SinglyNode(0);
    }
}
?>
