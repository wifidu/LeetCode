<?php
Class Node{
    public int $val;
    public ? Node $next = null;
    public ? Node $prev = null;

    public function __construct(int $val)
    {
        $this->val = $val;
    }
}

Class DoubleList{
    public int $size;
    public ? Node $head = null;
    public ? Node $tail = null;

    public function __construct()
    {
        $this->size = 0;

        $this->head = $this->tail = new Node(0);

        $this->head->next = $this->tail;

        $this->tail->prev = $this->head;
    }

    public function get(int $index) : int
    {
        if ($index < 0 || $index >= $this->size) return -1;

        $curr = $this->head;

        // 通过比较 index 和 size - index 的大小判断从头开始较快还是从尾巴开始较快。
        if ($index < $this->size  - $index - 1) {
            for ($i = 0; $i < $index + 1; ++ $i) {
                $curr = $curr->next;
            }
        } else {
            $curr = $this->tail;
            for ($i = 0; $i < $this->size - $index; ++ $i) {
                $curr = $curr->prev;
            }
        }

        return $curr->val;
    }

    public function addAtHead(int $val)
    {
        $pred = $this->head;
        $succ = $this->head->next;

        ++ $this->size;
        $toAdd = new Node($val);
        $toAdd->prev = $pred;
        $toAdd->next = $succ;
        $succ->prev = $toAdd;
    }

    public function addAtTail(int $val)
    {
        $succ = $this->tail;
        $pred = $this->tail->prev;

        ++ $this->size;

        $toAdd = new Node($val);
        $toAdd->prev = $pred;
        $toAdd->next = $succ;
        $pred->next = $toAdd;
        $succ->prev = $toAdd;
    }

    public function addAtIndex(int $index, int $val)
    {
        if ($index > $this->size) return ;

        // if index is negative,
        // the node will be inserted at the head of the list.
        if ($index < 0) $index = 0;

        // find predecessor and successor of the node to be added
        $pred = $succ = new Node(0);

        if ($index < $this->size - $index) {
            $pred = $this->head;
            for($i = 0; $i < $index; ++ $i) $pred = $pred->next;
            $succ = $pred->next;
        } else {
            $succ = $this->tail;
            for ($i = 0; $i < $this->size - $index; ++ $i){ // 找第４个的前面一个，因为插入的时候自己就变成第４个了
                $succ = $succ->prev;
            }
            $pred = $succ->prev;
        }

        ++ $this->size;
        $toAdd = new Node($val);
        $toAdd->prev = $pred;
        $toAdd->next = $succ;
        $succ->prev = $toAdd;
        $pred->next = $toAdd;
    }

    public function deleteAtIndex(int $index)
    {
        if ($index < 0 || $index >= $this->size) return;

        $pred = $succ = new Node(0);
        if ($index < $this->size - $index) {
            $pred = $this->head;
            for ($i = 0; $i < $index; ++ $i) {
                $pred = $pred->next;
            }
            $succ = $pred->next->next;
        } else {
            $succ = $this->tail;
            for ($i = 0; $i < $this->size - $index - 1;++ $i){ // 删除的时候,以０开头的序列size - (index + 1)就是倒过来的index
                $succ = $succ->prev;                           // 再加上1 = size - index 就是插入
            }
            $pred = $succ->prev->prev;
        }

        -- $this->size;

        $pred->next = $succ;
        $succ->prev = $pred;
    }
}

$linked = new DoubleList;
$linked->addAtIndex(0, 1);
$linked->addAtIndex(1, 2);
$linked->addAtIndex(2, 3);
var_dump($linked->get(1));
$linked->deleteAtIndex(1);
var_dump($linked->get(1));
