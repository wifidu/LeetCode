<?php
require "../TreeNode.php";

use Tree\TreeNode;

Class Recursion{
    public function helper(TreeNode $node, ? int $lower, ? int $upper) : bool
    {
        if ($node == null) return true;

        $val = $node->val;
        if($lower != null && $val <= $lower) return false;
        if($upper != null && $val >= $upper) return false;

        if(! $this->helper($node->right, $val, $upper)) return false;
        if(! $this->helper($node->left, $lower, $val)) return false;

        return true;
    }

    public function isValidBST(TreeNode $root)
    {
        return $this->helper($root, null, null);
    }
}

Class Interation{
    public function isValidBST(TreeNode $root)
    {
        $stack = [];
        $inorder = (double) - INF;

        while (boolval($stack) || $root != null) {
            while ($root != null) {
                array_push($stack, $root);
                $root = $root->left;
            }

            $root = array_pop($stack);

            if ($root->val <= $inorder) return false;

            $inorder = $root->val;
            $root    = $root->right;
        }

        return true;
    }
}
