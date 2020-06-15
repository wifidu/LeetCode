<?php
class Solution {

    protected array $output = [];
    protected ? int $k;
    protected ? int $n;
     /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $this->n = count($nums);

        for ($this->k = 0; $this->k < $this->n + 1; ++$this->k) {
            $this->backtrack(0, [], $nums);
        }

        return $this->output;
    }

    function backtrack(int $first, array $curr, array $nums)
    {
        if (count($curr) == $this->k) {
            array_push($this->output, $curr);
            return;
        }

        for ($i = $first; $i < $this->n; $i ++) {
            array_push($curr, $nums[$i]);

            $this->backtrack($i + 1, $curr, $nums);

            array_pop($curr);
        }
    }
}

$t = new Solution;

var_dump($t->subsets([1 ,2, 3]));

