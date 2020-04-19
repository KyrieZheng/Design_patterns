<?php

//观察者模式

//观察者接口
interface Observer
{
    public function eat();//定义吃接口
}

interface BeObserver
{
    public function addObserver(Observer $obj);

    public function notify();
}

class Dog implements Observer
{
    public function eat()
    {
        echo '狗开始吃饭';
        // TODO: Implement eat() method.
    }
}

class Cat implements Observer
{
    public function eat()
    {
        echo '猫开始吃饭';
        // TODO: Implement eat() method.
    }
}

class Pig implements Observer
{
    public function eat()
    {
        echo '猪开始吃饭';
        // TODO: Implement eat() method.
    }
}

class EatObserver implements BeObserver
{
    /**
     * @var Observer[]
     */
    protected $observerArr = [];

    public function addObserver(Observer $obj)
    {
        $this->observerArr[] = $obj;
       //array_push($this->observerArr, $obj);
        // TODO: Implement addObserver() method.
    }

    public function notify()
    {

        foreach ($this->observerArr as $value) {
            $value->eat();
        }
    }
}

$beObserver = new EatObserver();
$beObserver->addObserver(new Dog());
$beObserver->addObserver(new Cat());
$beObserver->addObserver(new Pig());
$beObserver->notify();

