<?php

/*
 * @author weifan
 * Friday 29th of May 2020 05:42:17 PM
 */

require '../TreeNode.php';

use Tree\TreeNode;

class BST
{
    public function searchRecursive(TreeNode $root, int $val)
    {
        if (null == $root || $val == $root->val) {
            return $root;
        }

        return $val < $root->val ? $this->searchRecursive($root->left, $val) : $this->searchRecursive($root->right, $val);
    }

    public function searchIteration(TreeNode $root, int $val)
    {
        while (null != $root && $val != $root->val) {
            $root = $val < $root->val ? $root->left : $root->right;
        }

        return $root;
    }

    public function insertRecursive(TreeNode $root, int $val)
    {
        if (null == $root) {
            return new TreeNode($val);
        }

        if ($val > $root->val) {
            $root->right = $this->insertRecursive($root->right, $val);
        } else {
            $root->left = $this->insertRecursive($root->left, $val);
        }

        return $root;
    }

    public function insertInteration(TreeNode $root, int $val)
    {
        $node = $root;
        while ($node != null) {
            if ($val > $node->val) {
                if ($node->right == null){
                    $node->right = new TreeNode($val);
                    return $root;
                } else {
                    $node = $node->right;
                }
            } else {
                if ($node->left == null){
                    $node->left = new TreeNode($val);
                    return $root;
                } else {
                    $node = $node->left;
                }
            }
        }
        return new TreeNode($val);
    }
}
