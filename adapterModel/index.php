<?php

//适配器模式

//应用场景： 万能充电器

//充电器
class Charger
{
    /**
     * @var Adapter
     */
    public $charger = null;

    public function setCharger(Adapter $adapter)
    {
        $this->charger = $adapter;
    }

    public function chargers()
    {
        if ($this->charger !== null) {
            $this->charger->electricity();
        } else {
            var_dump('is error');
        }
    }
}

//手机充电类
class Phone {
    public function phoneElectricity()
    {
        var_dump("手机充电");
    }
}

//电脑充电类
class Computer {
    public function computerElectricity()
    {
        var_dump("电脑充电");
    }
}

//手表充电类
class Watch {
    public function watchElectricity()
    {
        var_dump("手表充电");
    }
}

//适配器接口
interface Adapter {

    public function electricity();
}

//手机适配器
class PhoneAdapter implements Adapter
{
    public function electricity()
    {
        $model = new Phone();
        $model->phoneElectricity();
        // TODO: Implement electricity() method.
    }
}

//电脑适配器
class ComputerAdapter implements Adapter
{
    public function electricity()
    {
        $model = new Computer();
        $model->computerElectricity();
        // TODO: Implement electricity() method.
    }
}

//手表适配器
class WatchAdapter implements Adapter
{
    public function electricity()
    {
        $model = new Watch();
        $model->watchElectricity();
        // TODO: Implement electricity() method.
    }
}

$charger = new Charger();
$charger->setCharger(new WatchAdapter());
$charger->chargers();

