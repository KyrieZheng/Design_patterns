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



//工厂方法模式

//抽象鼠标工厂
abstract class MouseFactory
{

    abstract public function createMouse();//生产鼠标
}

//惠普鼠标工厂
class HpMouseFactory extends MouseFactory
{

    public function createMouse()
    {
        return new HpMouse();
        // TODO: Implement createMouse() method.
    }
}

//华为鼠标工厂
class HuaWeiMouseFactory extends MouseFactory
{

    public function createMouse()
    {
        return new HuaWeiMouse();
        // TODO: Implement createMouse() method.
    }
}

//抽象鼠标类
abstract class Mouse
{
    abstract public function produceMouse();
}

//惠普鼠标
class HpMouse extends Mouse
{
    public function produceMouse()
    {
        echo '我是惠普鼠标工厂生产的鼠标';
        // TODO: Implement produceMouse() method.
    }
}

//华为鼠标
class HuaWeiMouse extends Mouse
{
    public function produceMouse()
    {
        echo '我是华为鼠标工厂生产的鼠标';
        // TODO: Implement produceMouse() method.
    }
}

//可以扩展其他工厂生产的鼠标

$mouseFactory = new HpMouseFactory();
$mouseFactory->createMouse()->produceMouse();


//抽象工厂模式

//抽象电脑厂商工厂
abstract class ComputerFactory
{
    abstract public function createMouse();

    abstract public function createKeyboard();
}

//惠普电脑工厂
class HpComputerFactory extends ComputerFactory
{

    public function createMouse()
    {
        return new HpMouses();
        // TODO: Implement createMouse() method.
    }

    public function createKeyboard()
    {
        return new HpKeyBoard();
        // TODO: Implement createKeyboard() method.
    }
}

//华为电脑工厂
class HuaWeiComputerFactory extends ComputerFactory
{

    public function createKeyboard()
    {
        return new HuaWeiKeyBoard();
        // TODO: Implement createKeyboard() method.
    }

    public function createMouse()
    {
        return new HuaWeiMouses();
        // TODO: Implement createMouse() method.
    }
}

//抽象产品类
abstract class Produce
{
    abstract public function create();
}

//惠普鼠标产品
class HpMouses extends Produce
{
    public function create()
    {
        echo '惠普电脑工厂生产的鼠标';
        // TODO: Implement create() method.
    }
}

//惠普鼠标产品
class HpKeyBoard extends Produce
{
    public function create()
    {
        echo '惠普电脑工厂生产的键盘';
        // TODO: Implement create() method.
    }
}

//惠普鼠标产品
class HuaWeiMouses extends Produce
{
    public function create()
    {
        echo '华为电脑工厂生产的鼠标';
        // TODO: Implement create() method.
    }
}

//惠普鼠标产品
class HuaWeiKeyBoard extends Produce
{
    public function create()
    {
        echo '华为电脑工厂生产的键盘';
        // TODO: Implement create() method.
    }
}

$computerFactory = new HuaWeiComputerFactory();
$mouse = $computerFactory->createMouse();
$mouse->create();
$keyBoard = $computerFactory->createKeyboard();
$keyBoard->create();


