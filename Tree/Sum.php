<?php
require 'TreeNode.php';

use Tree\TreeNode;

class Sum
{
    public function Recursive(?TreeNode $root, int $sum): bool
    {
        if (null == $root) {
            return false;
        }

        $sum -= $root->val;

        if ((null == $root->left) && (null == $root->right)) {
            return 0 == $sum;
        }

        return $this->Recursive($root->left, $sum) || $this->Recursive($root->right, $sum);
    }

    public function Interation(TreeNode $root, int $sum): bool
    {
        $nodeStack = [];
        $sumStack  = [];

        array_push($nodeStack, $root);
        array_push($sumStack, $sum - $root->val);

        while (boolval($nodeStack)) {
            $node    = array_pop($nodeStack);
            $currSum = array_pop($sumStack);

            if ((null == $node->right) && (null == $node->left) && (0 == $currSum)) {
                return true;
            }

            if (null != $node->right) {
                array_push($nodeStack, $node->right);
                array_push($sumStack, $currSum - $node->right->val);
            }

            if (null != $node->left) {
                array_push($nodeStack, $node->left);
                array_push($sumStack, $currSum - $node->left->val);
            }
        }

        return false;
    }
}

$t = new Sum();

var_dump($t->Interation($first, 6));
var_dump($t->Recursive($first, 5));
