<?php

//建造者模式

//建造一辆车 包括 车身 轮胎 动机 其他零件

//抽象汽车建造者
abstract class Builder
{
    protected $car;

    abstract public function builderCarBody(CarBody $carBody);//车身

    abstract public function builderCarTire(CarTire $carTire);//轮胎

    abstract public function builderCarEngine(CarEngine $carEngine);//发动机

    abstract public function builderCarOther(CarOther $carOther);//其他零件
}

class Car
{
    protected $carBody;
    protected $carTire;
    protected $carEngine;
    protected $carOther;

    public function setCarBody($carBody)
    {
        $this->carBody = $carBody;
    }

    public function setCarTire($carTire)
    {
        $this->carTire = $carTire;
    }

    public function setCarEngine($carEngine)
    {
        $this->carEngine = $carEngine;
    }

    public function setCarOther($carOther)
    {
        $this->carOther = $carOther;
    }
}

//具体汽车建造者
class CarBuilder extends Builder
{

    public function __construct()
    {
        $this->car = new Car();
    }

    public function builderCarBody(CarBody $carBody)
    {
        $this->car->setCarBody($carBody->createCarBody());
        // TODO: Implement builderCarBody() method.
    }

    public function builderCarTire(CarTire $carTire)
    {
        $this->car->setCarTire($carTire->createCarTire());
        // TODO: Implement builderCarTire() method.
    }

    public function builderCarEngine(CarEngine $carEngine)
    {
        $this->car->setCarEngine($carEngine->createCarEngine());
        // TODO: Implement builderCarEngine() method.
    }

    public function builderCarOther(CarOther $carOther)
    {
        $this->car->setCarOther($carOther->createCarOther());
        // TODO: Implement builderCarOther() method.
    }

    public function show()
    {
        var_dump($this->car);
    }
}

//抽象车身
abstract class CarBody
{
    abstract public function createCarBody();
}

//抽象车轮胎
abstract class CarTire
{
    abstract public function createCarTire();
}

//抽象车引擎
abstract class CarEngine
{
    abstract public function createCarEngine();
}

//抽象车其他
abstract class CarOther
{
    abstract public function createCarOther();
}

//碳纤维车身
class CarbonFiberCarBody extends CarBody
{
    public function createCarBody()
    {
        return '加上碳纤维车身';
        // TODO: Implement createCarBody() method.
    }
}

//钢车身
class SteelCarBody extends CarBody
{
    public function createCarBody()
    {
        return '加上钢结构车身';
        // TODO: Implement createCarBody() method.
    }
}

//防滑轮胎
class SlipCarTire extends CarTire
{
    public function createCarTire()
    {
        return '加上防滑轮胎';
        // TODO: Implement createCarTire() method.
    }
}

//雪地轮胎
class SnowCarTire extends CarTire
{
    public function createCarTire()
    {
        return '加上雪地轮胎';
        // TODO: Implement createCarTire() method.
    }
}

//v6引擎
class V6CarEngine extends CarEngine
{
    public function createCarEngine()
    {
        return '加上V6引擎';
        // TODO: Implement createCarEngine() method.
    }
}

//v9引擎
class V9CarEngine extends CarEngine
{
    public function createCarEngine()
    {
        return '加上V9引擎';
        // TODO: Implement createCarEngine() method.
    }
}

//其他配件
class OCarOther extends CarOther
{
    public function createCarOther()
    {
        return '加上其他零件';
        // TODO: Implement createCarOther() method.
    }
}

$carBuilder = new CarBuilder();
$carBuilder->builderCarBody(new CarbonFiberCarBody());
$carBuilder->builderCarTire(new SnowCarTire());
//$carBuilder->builderCarEngine(new V9CarEngine());
$carBuilder->builderCarOther(new OCarOther());
$carBuilder->show();