<?php

//排序

class QuickSort
{
    public $arr = [];

    function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    function Quick($arrSs)
    {
        $count = count($arrSs);
        if ($count < 2) {
            return $arrSs;
        }


        $leftSort = [];
        $rightSort = [];
        $arr1 = $arrSs[0];
        for ($i=1;$i<$count;$i++) {
            if ($arrSs[$i] > $arr1) {
                $rightSort[] = $arrSs[$i];
            } else {
                $leftSort[] = $arrSs[$i];
            }
        }

        $left = $this->Quick($leftSort);
        $right = $this->Quick($rightSort);
        return array_merge($left, [$arr1], $right);
    }
}

class MaoPaoSort
{
    public $arr = [];

    function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    function maoPao()
    {
        $count = count($this->arr);
        if ($count < 2) {
            return $this->arr;
        }

        $arrS = $this->arr;
        for ($i = 1; $i < $count; $i++) {
            for ($j = 0; $j < $count - $i; $j++) {
                $temp = $arrS[$j];
                if ($arrS[$j] > $arrS[$j + 1]) {
                    //往后移位
                    $arrS[$j] = $arrS[$j + 1];
                    $arrS[$j + 1] = $temp;
                }
            }
        }

        return $arrS;
    }
}

$arr = [1,3,2,7,6,8,10,0,23,14,39,24,50,18,4];
$sort = new MaoPaoSort($arr);
$sort2 = new QuickSort($arr);
print_r($sort->maoPao());
print_r($sort2->Quick($arr));