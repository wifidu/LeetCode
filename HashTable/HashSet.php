<?php
// 哈希函数：目的是分配一个地址存储值。理想情况下，每个值都应该有一个对应唯一的散列值。
// 冲突处理：哈希函数的本质就是从 A 映射到 B。但是多个 A 值可能映射到相同的 B。这就是碰撞。
// 因此，我们需要有对应的策略来解决碰撞。总的来说，有以下几种策略解决冲突：
//  单独链接法：对于相同的散列值，我们将它们放到一个桶中，每个桶是相互独立的。
//  开放地址法：每当有碰撞， 则根据我们探查的策略找到一个空的槽为止。
//  双散列法：使用两个哈希函数计算散列值，选择碰撞更少的地址。

Class HashSet{
    private $bucket = [];
    private int $keyRange;

    public function __construct()
    {
        $this->keyRange = 769;
        for ($i = 0; $i < $this->keyRange; ++ $i) {
            $this->bucket[$i] = [];
        }
    }

    protected function _hash(int $key)
    {
        return ($key % $this->keyRange);
    }

    public function add(int $key)
    {
        $bucketIndex = $this->_hash($key);

        array_push($this->bucket[$bucketIndex], $key);
    }

    public function remove(int $key)
    {
        $bucketIndex = $this->_hash($key);
        $buc = $this->bucket[$bucketIndex];
        $index = array_search($key, $buc);
        array_splice($buc, $index, 1);
    }

    public function contains(int $key)
    {
        $bucketIndex = $this->_hash($key);
        return in_array($key, $this->bucket[$bucketIndex]);
    }
}
