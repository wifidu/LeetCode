<?php
namespace Tree;

Class TreeNode {
    public int $val;

    public ?TreeNode $left = null;
    public ?TreeNode $right = null;

    public function __construct(int $x)
    {
        $this->val = $x;
    }
}

$first  = new TreeNode(1);
$second = new TreeNode(2);
$third  = new TreeNode(3);

$first->right = $second;
$second->left = $third;

   //     1
   //      \
   //       2
   //      /
   //     3


?>
