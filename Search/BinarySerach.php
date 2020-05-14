<?php
class Search {

    // $nums 是升序数组
    public function match(array $nums, int $target) : int
    {
        $left = 0;
        $right = count($nums) - 1;
        while ($left <= $right) {
            $pivot = $left + ($right - $left)/2;
            if ($nums[$pivot] == $target) {
                return $pivot;
            }
            if ($target < $nums[$pivot]) {
                $right = $pivot - 1;
            } else {
                $left = $pivot + 1;
            }
        }

        return -1;
    }

    public function findPeakElement(array $nums) : int
    {
        $left = 0;
        $right = count($nums) - 1;
        while ($left < $right) {
            $pivot = $left + ($right - $left) / 2;
            if ($nums[$pivot] > $nums[$pivot + 1]) {
                $right = $pivot; // $right最终存着符合条件的值的位置
            } else {
                $left = $pivot + 1;
            }
        }

        return $left; //　返回条件　$left == $right
    }
}

$nums = [1,2,1,3,2,1,4];

$test = new Search();

$nums = $test->findPeakElement($nums);

print_r($nums);
?>

