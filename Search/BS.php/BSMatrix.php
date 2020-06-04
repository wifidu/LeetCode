<?php
Class Solution {
    private function binarySearch(array $matrix, int $target, int $start, bool $vertical)
    {
        $lo = $start;
        $hi = $vertical ? count($matrix[0]) - 1 : count($matrix) - 1;

        while ($lo <= $hi) {
            $mid = ($lo + $hi) / 2;
            if ($vertical) { // searching a column
                if ($matrix[$start][$mid] < $target) {
                    $lo = $mid + 1;
                } else if ($matrix[$start][$mid] > $target) {
                    $hi = $mid - 1;
                } else {
                    return true;
                }
            } else { // searching a row
                if ($matrix[$mid][$start] < $target) {
                    $lo = $mid + 1;
                } else if ($matrix[$mid][$start] > $target) {
                    $hi = $mid - 1;
                } else {
                    return true;
                }
            }
        }

        return false;
    }

    public function searchMatrix(array $matrix, int $target)
    {
        if ($matrix == null || count($matrix) == 0) {
            return false;
        }

        $shorterDim = min(count($matrix), count($matrix[0]));

        for ($i = 0; $i < $shorterDim; $i ++) {
            $verticalFound = $this->binarySearch($matrix, $target, $i, true);
            $horizontalFound = $this->binarySearch($matrix, $target, $i, false);

            if ($verticalFound || $horizontalFound) {
                return true;
            }
        }
        return false;
    }
}
