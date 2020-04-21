<?php

//原型模式

//运营商抽象原型类()
abstract class ServiceOperator {

    abstract public function getSystem();
}

//中国移动类
class ChinaMobile extends ServiceOperator
{

    public function getSystem()
    {
        // TODO: Implement getSystem() method.
        return "中国移动";
    }
}

//中国联通
class ChinaUnicom extends ServiceOperator
{

    public function getSystem()
    {
        // TODO: Implement getSystem() method.
        return "中国联通";
    }
}

//手机原型
class IPhone11 {

    public $serviceOperator;
    public $cpu;
    public $rom;
}

//中国移动定制机
class MobileIPhone11 extends IPhone11
{
    public function __construct()
    {
        var_dump('创建了一次手机');
        $this->serviceOperator = new ChinaMobile();
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
        $this->serviceOperator = new ChinaMobile();
    }
}

//中国联通定制机
class UnicomIPhone11 extends IPhone11
{

    public function __construct()
    {
        $this->serviceOperator = new ChinaMobile();
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
        $this->serviceOperator = new ChinaUnicom();
    }
}

//买手机
$chinaMobileIPhone11 = new MobileIPhone11();
$chinaMobileIPhone11->cpu = 8;
$chinaMobileIPhone11->rom = '16G';

//复制同款手机 修改配置
$chinaMobile2IPhone11 = clone $chinaMobileIPhone11;
$chinaMobile2IPhone11->cpu = 16;
$chinaMobile2IPhone11->rom = '64G';

var_dump($chinaMobileIPhone11, $chinaMobile2IPhone11);




