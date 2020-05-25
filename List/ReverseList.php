<?php
require "SinglyLink.php";

use Link\SinglyNode;

Class ReverseList{
    public function iteration(SinglyNode $head)
    {
        $prev = null;
        $curr = $head;
        while ($curr != null) {
            $nextTemp = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $nextTemp;
        }
        return $prev;
    }

    // 先循环到最后，然后从后到前改变方向
    public function recursion(SinglyNode $head)
    {
        // 这句只有最后一个节点返回
        if ($head == null || $head->next == null) return $head;
        // 这句是返回新的头,找到就不变
        $p = $this->recursion($head->next);
        // 改变方向
        $head->next->next = $head;
        $head->next = null;
        return $p;
    }
}
