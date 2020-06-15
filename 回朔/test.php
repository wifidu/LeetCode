<?php
Class test {
    public function you($a)
    {
        $res = [];
        $this->me($res);

        return $res;
    }

    public function me($res)
    {
        $res = [1, 2];
    }

}

$t = new test;

var_dump($t->you(1));
?>
