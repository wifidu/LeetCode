<?php
$a = [1, 2, 3, 4];

list($a[0], $a[1]) = array($a[1], $a[0]);

// var_dump(rand(1, 55));
var_dump(mt_rand(0, 66));
?>
