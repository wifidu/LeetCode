<?php

/*
 * @author weifan
 * Wednesday 3rd of June 2020 09:55:03 AM
 */

// 给定一个大小为 n 的数组，找到其中的多数元素。
// 多数元素是指在数组中出现次数**大于** ⌊ n/2 ⌋ 的元素。
//
// 你可以假设数组是非空的，并且给定的数组总是存在多数元素。
class Solution
{
    public function sortMethod(array $nums): int
    {
        sort($nums);

        return $nums[floor( count($nums) / 2 )];
    }

    public function inMethod(array $nums) : int
    {
        $count = array_count_values($nums);

        return array_search(max($count), $count);
    }
}

$t = new Solution;

$a = [2, 2, 2, 2, 4, 5, 6];

var_dump($t->inMethod($a));
