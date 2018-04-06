<?php

interface Chargeable
{
    public function getPrice();
}

interface IndentityObject
{
    public function generateId();
}

trait TaxTools
{
    public function calculateTax($price)
    {
        return 222;
    }
}

trait IndentityTrait
{
    public function generateId()
    {
        return uniqid();
    }
}

trait PriceUtilities
{
    private static $taxrate = 17;

    function calculateTax($price)
    {
        return (($this->getTaxRate() / 100) * $price);
    }
}

abstract class Service
{

}

class UtilityService extends Service
{
    use PriceUtilities {
        PriceUtilities::calculateTax as private;
    }

    private $price;

    function __construct($price)
    {
        $this->price = $price;
    }

    function getTaxRate()
    {
        return 17;
    }

    function getFinalPrice()
    {
        return ($this->price + $this->calculateTax($this->price));
    }
}

class ShopProduct implements Chargeable, IndentityObject
{
    use PriceUtilities, IndentityTrait;
    private $id = 0;
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

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setDiscount(int $discount)
    {
        $this->discount = $discount;
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

    public static function getInstance($id, PDO $pdo)
    {
        $stmt = $pdo->prepare("select * from products where id=?");
        $result = $stmt->execute(array($id));

        $row = $stmt->fetch();

        if (empty($row)) {
            return null;
        }

        if ($row['type'] === 'book') {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['numpages']
            );
        } else if ($row['type'] === 'cd') {
            $product = new CDProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['playlength']
            );
        } else {
            $product = new ShopProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price']
            );
        }
        $product->setId($row['id']);
        $product->setDiscount($row['discount']);
        return $product;
    }
}

abstract class ShopProductWriter
{
    protected $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    abstract public function write();
}

class XmlProductWriter extends ShopProductWriter
{
    public function write()
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement("products");

        foreach ($this->products as $shopProduct) {
            $writer->startElement("product");
            $writer->writeAttribute("title", $shopProduct->getTitle());
            $writer->startElement('summary');
            $writer->text($shopProduct->getSummaryLine());
            $writer->endElement();
        }
        $writer->endElement();
        $writer->endDocument();
        print $writer->flush();
    }
}

class TextProductWriter extends ShopProductWriter
{
    public function write()
    {
        $str = "Products:\n";
        foreach ($this->products as $shopProduct) {
            $str .= $shopProduct->getSummaryLine() . "\n";
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

//$dsn = "sqlite:products.db";
//$pdo = new PDO($dsn, null, null);
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$obj = ShopProduct::getInstance(1, $pdo);
//
//$p = new ShopProduct();
//print $p->calculateTax(100) . "\n";
//print $p->generateId() . "\n";