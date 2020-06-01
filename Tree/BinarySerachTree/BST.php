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
    public function deleteRecursive(TreeNode $root, int $key)
    {
        if ($root == null) return null;

        if ($key > $root->val) {
            $root->right = $this->deleteRecursive($root->right, $key);
        } else if ($key < $root->val) {
            $root->left = $this->deleteRecursive($root->left, $key);
        } else {
            if ($root->left == null && $root->right == null) {
                $root = null;
            } else if ($root->right != null) {
                $root->val = $this->successor($root);
                $root->right = $this->deleteRecursive($root->right, $root->val);
            } else {
                $root->val = $this->predecessor($root);
                $root->left = $this->deleteRecursive($root->left, $root->val);
            }
        }

        return $root;
    }

    public function successor(TreeNode $root)
    {
        $root = $root->right;
        while ($root->left != null) {
            $root = $root->left;
        }

        return $root->val;
    }

    public function predecessor(TreeNode $root)
    {
        $root = $root->left;
        while ($root->right != null) {
            $root = $root->right;
        }

        return $root->val;
    }
}
