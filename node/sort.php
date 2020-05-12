<?php

//抽象类
abstract class Sort{
    abstract public function sorts(array $arr):array ;
}

//冒泡排序
class BubbleSort extends Sort {

    public function sorts(array $arr):array
    {
        $len = count($arr);
        if ($len < 2) {
            return $arr;
        }

        //循环次数
        for ($i = 1;$i < $len;$i++) {
            //内部循环
            for ($j = 0;$j < $len - $i;$j++) {
                $temp = $arr[$j];
                if ($arr[$j] > $arr[$j + 1]) {
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }

        return $arr;
        // TODO: Implement sorts() method.
    }
}

//快速排序
class QuickSort extends Sort {

    public function sorts(array $arr):array
    {
        $len = count($arr);
        if ($len < 2) {
            return $arr;
        }

        $leftArr = [];
        $rightArr = [];
        $arrOne = $arr[0];
        for ($i=1;$i<$len;$i++) {
            if ($arr[$i] > $arrOne) {
                $rightArr[] = $arr[$i];
            } else {
                $leftArr[] = $arr[$i];
            }
        }

        $left = $this->sorts($leftArr);
        $right = $this->sorts($rightArr);

        return array_merge($left, [$arrOne], $right);
        // TODO: Implement sorts() method.
    }
}

//选择排序
class SelectSort extends Sort {

    public function sorts(array $arr):array
    {
        $len = count($arr);
        if ($len < 2) {
            return $arr;
        }
        // TODO: Implement sorts() method.
        for ($i = 0;$i < $len - 1;$i++) {
            for ($j = $i + 1;$j < $len;$j++) {
                $temp = $arr[$i];
                if ($arr[$i] > $arr[$j]) {
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }

        return $arr;
    }
}

//抽象工厂类
abstract class SortFactory {

    abstract public static function getInstance();
}


class BubbleSortFactory extends SortFactory {

    public static function getInstance()
    {
        return new QuickSort();
        // TODO: Implement getInstance() method.
    }
}

class QuickSortFactory extends SortFactory {

    public static function getInstance()
    {
        return new QuickSort();
        // TODO: Implement getInstance() method.
    }
}

class SelectSortFactory extends SortFactory {

    public static function getInstance()
    {
        return new SelectSort();
        // TODO: Implement getInstance() method.
    }
}

function getRandArr(int $min, int $max, int $num):array
{
    $arr = [];
    if ($min > $max) {
        $temp = $min;
        $min = $max;
        $max = $temp;
    }

    for ($i = 0;$i < $num;$i++) {
        $member = rand($min, $max);
        $arr[] = $member;
    }

    return $arr;
}

$arr = getRandArr(15, 10000000000, 30000);
/*var_dump("选择排序:");
$time1 = time();
var_dump($time1);
$sort = SelectSortFactory::getInstance();
$sort = $sort->sorts($arr);
$time2 = time();
var_dump($time2);
var_dump("消耗时间");
var_dump($time2 - $time1);*/

var_dump("冒泡排序:");
$time1 = microtime();
var_dump($time1);
$sort = BubbleSortFactory::getInstance();
$sort = $sort->sorts($arr);
$time2 = microtime();
var_dump($time2);
var_dump("消耗时间");
//var_dump($time2 - $time1);
//print_r($sort);

var_dump("快速排序:");
$time1 = microtime();
var_dump($time1);
$sort = QuickSortFactory::getInstance();
$sort = $sort->sorts($arr);
$time2 = microtime();
var_dump($time2);
var_dump("消耗时间");
//var_dump($time2 - $time1);
//print_r($sort);

//print_r($sort);