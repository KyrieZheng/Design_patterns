<?php

//工厂模式和 策略模式很相似  策略模式返回的是对象的封装对象 工厂模式返回的对象的实例

//抽象工厂模式

//抽象类
abstract class Operation {

    abstract public function getValue(...$int);
}

class Add extends Operation
{
    public function getValue(...$int)
    {
        $result  = 0;
        foreach ($int as $value) {
            $result += $value;
        }

        return $result;
        // TODO: Implement getValue() method.
    }
}

class Sub extends Operation
{
    public function getValue(...$int)
    {
        $result = 0;
        foreach ($int as $key => $value) {
            if ($key == 0) {
                $result = $value;
            } else {
                $result -= $value;
            }
        }

        return $result;
        // TODO: Implement getValue() method.
    }
}

//抽象工厂类
abstract class Factory {

    abstract public static function getInstance();
}

class MathAddFactory extends Factory
{
    public static function getInstance()
    {
        // TODO: Implement getInstance() method.
        return new Add();
    }
}

class MathSubFactory extends Factory
{
    public static function getInstance()
    {
        // TODO: Implement getInstance() method.
        return new Sub();
    }
}

$factory = MathAddFactory::getInstance();
$result1 = $factory->getValue(1, 3, 4);
$factory = MathSubFactory::getInstance();
$result2 = $factory->getValue(6, 1, 2);

var_dump($result1, $result2);


