<?php

//桥模式

//画笔抽象类
abstract class Pen {

    protected $color = null;

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    abstract public function draw();
}

//大号画笔
class BigPen extends Pen {

    public function draw()
    {
        echo '这里是大画笔画出的颜色是' . $this->color->name;
    }

}

//中型画笔
class MediumPen extends Pen {

    public function draw()
    {
        echo '这里是中画笔画出的颜色是' . $this->color->name;
    }

}

//小型画笔
class SmallPen extends Pen {

    public function draw()
    {
        echo '这里是小画笔画出的颜色是' . $this->color->name;
    }

}

//颜色抽象类
abstract class Color {
    public $name;
}

//红色
class Red extends Color {
    public function __construct(){
        $this->name = "Red";
    }
}

//黑色
class Black extends Color {
    public function __construct(){
        $this->name = "Black";
    }
}

//黄色
class Yellow extends Color {
    public function __construct(){
        $this->name = "Yellow";
    }
}

//白色
class White extends Color {
    public function __construct(){
        $this->name = "White";
    }
}

//蓝色
class Blue extends Color {
    public function __construct(){
        $this->name = "Blue";
    }
}

$color = new Red();
$pen = new SmallPen($color);
$pen->draw();