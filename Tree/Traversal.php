<?php
require 'TreeNode.php';
use Tree\TreeNode;

Class Traversal{
    public function PreOrder(TreeNode $root) : ? array
    {
        $stack  = [$root];
        $output = [];

        while(boolval($stack)){
            $root = array_pop($stack);
            if (boolval($root)) {
                array_push($output, $root->val);

                if (boolval($root->right)) {
                    array_push($stack, $root->right);
                }

                if (boolval($root->left)) {
                    array_push($stack, $root->left);
                }
            }
        }

        return $output;
    }

    public function Inorder(TreeNode $root) : ? array
    {
        $stack  = [];
        $output = [];
        $curr   = $root;

        while (boolval($curr) || boolval($stack)) {
            while (boolval($curr)) {
                array_push($stack, $curr);
                $curr = $curr->left;
            }

            $curr = array_pop($stack);

            array_push($output, $curr->val);

            $curr = $curr->right;
        }

        return $output;
    }

    public function Postorder(TreeNode $root) : ? array
    {
        $stack = [$root];
        $output = [];

        while (boolval($stack)) {

            $root = array_pop($stack);

            array_push($output, $root->val);

            if (boolval($root->left)) {
                array_push($stack, $root->left);
            }

            if (boolval($root->right)) {
                array_push($stack, $root->right);
            }

        }

        return array_reverse($output);
    }
}

$t = new Traversal();

print_r($t->Postorder($first));
