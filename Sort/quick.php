<?php
Class Quick{

    public function partition(array &$nums, int $l, int $r) : int
    {
        $pivot = $nums[$r];
        $i = $l - 1; // 交换开始位
        for ($j = $l; $j <= $r - 1; ++ $j) {
            if ($nums[$j] <= $pivot) {
                $i = $i + 1; // 只要比pivot小就要和当前比较者交换
                list($nums[$i], $nums[$j]) = array($nums[$j], $nums[$i]);
            }
        }
        $i = $i + 1;
        // 一共有 $i 位进行了交换,so exchange pivot from $i + 1
        list($nums[$i], $nums[$r]) = array($nums[$r], $nums[$i]);

        return $i;
    }

    public function randomized_partition(array &$nums, int $l, int $r) : int
    {
        $i = mt_rand($l, $r);

        list($nums[$r], $nums[$i]) = array($nums[$i], $nums[$r]);

        return $this->partition($nums, $l, $r);
    }

    public function randomized_quicksort(array &$nums, int $l, int $r)
    {
        if ($r > $l) {
            $pos = $this->randomized_partition($nums, $l, $r);

            // 上一步使得数组里的值相对$pos，左小右大
            // 此时，对$pos左边进行相同的递归处理
            $this->randomized_quicksort($nums, $l, $pos - 1);
            // 然后，对$pos右边进行相同的递归处理
            $this->randomized_quicksort($nums,$pos + 1, $r);
        }
    }

    public function sortArray($nums)
    {
        $this->randomized_quicksort($nums, 0, count($nums) - 1);
        return $nums;
    }
}

$test = new Quick();

$a = [7, 4, 2, 5, 1];

$a = $test->sortArray($a);

print_r($a);
?>

