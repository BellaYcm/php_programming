<?php

/**
 * 策略模式 strategyPattern
 * 定义了算法族(fly就是一族算法) FlyWithWings和FlyNoWay这些算法可以互换，分别封装起来，让它们之间互相替换，此模式让算法的变化独立于使用算法的客户
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/7
 * Time: 12:54
 */
interface Fly
{
    function fly();
}

class FlyWithWings implements Fly
{
    function fly()
    {
        return true;
    }
}

class FlyNoWay implements Fly
{
    function fly()
    {
        return false;
    }
}

abstract class Duck
{
    abstract function display();

    function performFly(Fly $fly)
    {
        return $fly->fly();
    }
}

class MiniDuck extends Duck
{
    function display()
    {
        // TODO: Implement display() method.
    }

    function showFly()
    {
        $flyValue = $this->performFly(new FlyNoWay());
        var_dump($flyValue);
    }
}

$test = new MiniDuck();
$test->showFly();