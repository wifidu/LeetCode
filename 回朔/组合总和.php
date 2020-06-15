<?php
Class Solution{
    public function combinationSum(array $candidates, int $target)
    {
        $res = [];
        $len = count($candidates);

        sort($candidates);

        $this->dfs($candidates, $len, $target, 0, [], $res);

        return $res;
    }

    /**
     * @param candidates 数组输入
     * @param len        输入数组的长度，冗余变量
     * @param residue    剩余数值
     * @param begin      本轮搜索的起点下标
     * @param path       从根结点到任意结点的路径
     * @param res        结果集变量
     */
    private function dfs(array $candidates, int $len, int $residue, int $begin, array $path, array $res)
    {
        if ($residue == 0) {
            array_push($res, $path);
            return ;
        }

        for ($i = $begin; $i < $len; $i ++) {

            if ($residue - $candidates[$i] < 0) {
                break;
            }

            array_push($path, $candidates[$i]);

            $this->dfs($candidates, $len, $residue - $candidates[$i], $i, $path, $res);

            array_pop($path);
        }
    }
}
?>
