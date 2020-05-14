<?php
class Solution{
    public function search(array $nums, int $target) : int
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
}

$t1 = microtime(true);

$s = new Solution();
echo($s->search([-1,0,3,5,9,12], 9));
$t2 = microtime(true);
echo(PHP_EOL);
echo($t2 - $t1)
?>
