<?php

class Product
{
    public $name;
    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

class ProcessSale
{
    private $callbacks;


    function registerCallback($callback)
    {
        if (!is_callable($callback)) {
            throw new Exception("callback not callable");
        }
        $this->callbacks[] = $callback;
    }

    function sale($product)
    {
        print "{$product->name}: processing";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}

$logger = create_function('$product', 'print " logging ({$product->name})";');
$processor = new ProcessSale();
$processor->registerCallback($logger);
$processor->sale(new Product("productName", 100));

$logger2 = function ($product) {
    print "logging ({$product->name})";
};

$processor->registerCallback($logger2);
$processor->sale(new Product("anotherProduct", 200));

class Mailer
{
    function doMail($product)
    {
        print "mailing ({$product->name})";
    }
}

$processor2 = new ProcessSale();
$processor2->registerCallback([new Mailer(), 'doMail']);
$processor2->sale(new Product("coffe", 6));

class Totalizer
{
    static function warnAmount($amt)
    {
        $count = 0;
        return function ($product) use ($amt, &$count) {
            $count += $product->price;
            print "sum: $count";
            if ($count > $amt) {
                print "reached high price: {$count}";
            }
        };
    }
}

$processor3 = new ProcessSale();
$processor3->registerCallback(Totalizer::warnAmount(8));

$processor3->sale(new Product("shoes", 6));
$processor3->sale(new Product("coffee", 6));
// shoes: processing
// 6
// coffee: processing
// 2
//
// high price reached 12