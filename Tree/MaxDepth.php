<?php
require 'TreeNode.php';

use Tree\TreeNode;

Class Depth{
    public function Recursive(?TreeNode $root) : int
    {
        if (empty($root)) return 0;

        $left_height = $this->Recursive($root->left);
        $right_height = $this->Recursive($root->right);

        return max($left_height, $right_height) + 1;
    }

    public function interation(TreeNode $root) : int
    {
        $stack = [];
        if ( boolval($root) ) {
            array_push($stack, [1, $root]);
        }

        $depth = 0;

        while (boolval($stack)) {
            list($cur_dep, $root) = array_pop($stack);
            if (boolval($root)) {
                $depth = max($depth, $cur_dep);
                array_push($stack, [$cur_dep + 1, $root->left]);
                array_push($stack, [$cur_dep + 1, $root->right]);
            }
        }

        return $depth;
    }
}

$test = new Depth();


print_r($test->Recursive($first));
echo PHP_EOL;
print_r($test->interation($first));

