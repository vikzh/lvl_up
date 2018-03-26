<?php

class ShopProduct
{
    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price = 0;
    private $discount = 0;

    public function __construct($title, $mainName, $firstName, $price)
    {
        $this->title = $title;
        $this->producerMainName = $mainName;
        $this->producerFirstName = $firstName;
        $this->price = $price;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getProducerMainName()
    {
        return $this->producerMainName;
    }

    public function getProducerFirstName()
    {
        return $this->producerFirstName;
    }

    public function getProducer()
    {
        return $this->producerFirstName . ' ' . $this->producerMainName;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getPrice()
    {
        return $this->price - $this->discount;
    }

    public function getSummaryLine()
    {
        $base = "$this->title ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName}";
        return $base;
    }
}

class ShopProductWriter
{
    private $products = array();

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    public function write()
    {
        $str = "";
        foreach ($this->products as $shopProduct) {
            $str .= "{$shopProduct->getTitle()}: {$shopProduct->getProducer()} {$shopProduct->getPrice()}\n";
        }
        print $str;
    }
}

class CDProduct extends ShopProduct
{
    private $playLength = 0;

    public function __construct($title, $mainName, $firstName, $price, $playLength)
    {
        parent::__construct($title, $mainName, $firstName, $price);
        $this->playLength = $playLength;
    }

    public function getPlayLength()
    {
        return $this->playLength;
    }

    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base .= " {$this->playLength} min";
    }
}

class BookProduct extends ShopProduct
{
    private $numPages;

    public function __construct($title, $mainName, $firstName, $price, $numPages)
    {
        parent::__construct($title, $mainName, $firstName, $price);
        $this->numPages = $numPages;
    }

    public function getNumOfPages()
    {
        return $this->numPages;
    }

    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base .= " {$this->numPages} pages";
    }
}