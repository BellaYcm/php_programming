<?php

/**
 * 观察者模式
 * 把对象注册到一个特定的数据，当事件发生变化，自动通报
 * 这个模式在很多场合使用 用来创建对象的架构 并通过cookie get post 或者其他输入数据来改变数据
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/5
 * Time: 13:07
 */
interface Observer
{
    public function notify($obj);
}

class ExchangeRate
{
    static private $instance = null;
    private $observers = [];
    private $exchangeRate;

    /**
     * @return mixed
     */
    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    /**
     * @param mixed $exchangeRate
     */
    public function setExchangeRate($exchangeRate)
    {
        $this->exchangeRate = $exchangeRate;
        $this->notifyObservers();
    }

    static public function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ExchangeRate();
        }

        return self::$instance;
    }

    public function registerObserver($obj)
    {
        //$this->observers[] = $obj;
        array_push($this->observers, $obj);
    }

    public function notifyObservers()
    {
        foreach ($this->observers as $obj) {
            $obj->notify($this);
        }
    }
}

class ProductItem implements Observer
{
    public function __construct()
    {
        ExchangeRate::getInstance()->registerObserver($this);
    }

    public function notify($obj)
    {
        if ($obj instanceof ExchangeRate) {
            var_dump("update");
        }
    }

}

new ProductItem();
new ProductItem();
new ProductItem();
ExchangeRate::getInstance()->setExchangeRate(4);