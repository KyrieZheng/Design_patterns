<?php

//策略模式

//策略抽象接口
interface MathStrategy {

    public function method(int $int1, int $int2);

}

//加法
class MathAdd implements MathStrategy
{
    public function method(int $int1, int $int2)
    {
        return $int1 + $int2;
        // TODO: Implement method() method.
    }
}

//减法
class MathSub implements MathStrategy
{
    public function method(int $int1, int $int2)
    {
        return $int1 - $int2;
        // TODO: Implement method() method.
    }
}

//乘法
class MathMulti implements MathStrategy
{
    public function method(int $int1, int $int2)
    {
        return $int1 * $int2;
        // TODO: Implement method() method.
    }
}

//除法
class MathDivision implements MathStrategy
{
    public function method(int $int1, int $int2)
    {
        if ($int2 == 0) {
            return $int2;
        }

        return $int1 / $int2;
        // TODO: Implement method() method.
    }
}

class Calculator {

    /**
     * @var MathStrategy
     */
    public $mathMethod = null;

    public function __construct($type)
    {
        if ($type == 1) {
            //加法
            $this->mathMethod = new MathAdd();
        } elseif ($type == 2) {
            //减法
            $this->mathMethod = new MathSub();
        } elseif ($type == 3) {
            //乘法
            $this->mathMethod = new MathMulti();
        } elseif ($type == 4) {
            //除法
            $this->mathMethod = new MathDivision();
        }
    }

    public function getResult(int $int1, int $int2)
    {
        if (is_null($this->mathMethod)) {
            return '不合法';
        }
        return $this->mathMethod->method($int1, $int2);
    }
}

$calculatorAdd = new Calculator(1);
$add = $calculatorAdd->getResult(1, 3);
$calculatorSub = new Calculator(2);
$sub = $calculatorSub->getResult(2,4);
$calculatorMulti = new Calculator(3);
$multi = $calculatorMulti->getResult(3, 5);
$calculatorDivision = new Calculator(4);
$division = $calculatorDivision->getResult(4, 2);

var_dump([$add, $sub, $multi, $division]);




