<?php

namespace App\Services;

class SecondLargestService
{
    /**
     * Find the second largest number in an array in O(n) time complexity.
     *
     * @param array $arr
     * @return int
     */
    public function findSecondLargest(array $arr)
    {
        $first = $second = PHP_INT_MIN;
        
        foreach ($arr as $num) {
            if ($num > $first) {
                $second = $first;
                $first = $num;
            } elseif ($num > $second && $num < $first) {
                $second = $num;
            }
        }

        return $second;
    }
}
