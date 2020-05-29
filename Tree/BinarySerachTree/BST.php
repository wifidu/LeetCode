<?php
require "../TreeNode.php";

use Tree\TreeNode;

Class BST{
    public function searchRecursive(TreeNode $root, int $val)
    {
        if ($root == null || $val == $root->val) return $root;

        return $val < $root->val ? $this->searchRecursive($root->left, $val) : $this->searchRecursive($root->right, $val);
    }

    public function searchIteration(TreeNode $root, int $val)
    {
        while ($root != null && $val != $root->val) {
            $root = $val < $root->val ? $root->left : $root->right;
        }

        return $root;
    }
}
