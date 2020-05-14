<?php
require 'TreeNode.php';

use Tree\TreeNode;

Class Symmetric{

    public function Inerative(TreeNode $root) : bool
    {
        $q = array();

        array_push($q, $root);
        array_push($q, $root);

        while (boolval($q)) {
            $t1 = array_shift($q);
            $t2 = array_shift($q);

            if ($t1 == null && $t2 == null) continue;
            if ($t1 == null || $t2 == null) return false;
            if ($t1->val != $t2->val) return false;
            array_push($q, $t1->left);
            array_push($q, $t2->right);
            array_push($q, $t1->right);
            array_push($q, $t2->left);
        }

        return true;
    }

    public function Recursive(TreeNode $root) : bool
    {
        return $this->isMirror($root, $root);
    }

    public function isMirror(?TreeNode $t1, ?TreeNode $t2) : bool
    {
        if ($t1 == null && $t2 == null) return true;
        if ($t1 == null || $t2 == null) return false;

        return ($t1->val == $t2->val)
            && $this->isMirror($t2->left, $t1->right)
            && $this->isMirror($t1->left, $t2->right);
    }
}
$t = new Symmetric();

$a = new TreeNode(6);
$b = new TreeNode(4);
$c = new TreeNode(4);
$a->left = $b;
$a->right = $c;

var_dump($t->Recursive($a));
