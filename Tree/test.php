<?php
require 'TreeNode.php';

use Tree\TreeNode;

Class Symmetric{
    public function Ineractive(TreeNode $root) : bool
    {
        $q = array();
        array_push($q, $root);
        array_push($q, $root);

        while(boolval($q)){
            $a = array_shift($q);
            $b = array_shift($q);

            if ($a == null && $b == null) continue;
            if ($a == null || $b == null) return false;
            if ($a->val != $b->val) return false;
            array_push($a->left);
            array_push($b->right);
            array_push($a->right);
            array_push($b->left);
        }
        return true;
    }

    public function Recursive(TreeNode $root) : bool
    {
        return $this->isMirror($root, $root);
    }

    public function isMirror(TreeNode $t1, TreeNode $t2) : bool
    {
        if ($t1 == null && $t2 == null) return true;
        if ($t1 == null || $t2 == null) return false;

        return ($t1->val == $t2->val)
            && $this->isMirror($t1->left, $t2->right)
            && $this->isMirror($t2->left, $t1->right);
    }
}
?>
