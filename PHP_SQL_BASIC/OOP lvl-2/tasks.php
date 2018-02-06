<?php
//Создайте класс Tag.
//
//Примеры использования:
//	$tag = new Tag('a');
//	$tag->setText('ссылка')->setAttr('href', 'index.html')->show();
//
//	//Выведет <a href="index.html">ссылка</a>

class Tag
{
    private $name;
    private $text;
    private $attrs;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function setAtr($atr, $value)
    {
        $this->attrs[$atr] = $value;
        return $this;
    }

    public function show()
    {
        $tag = '';
        $tagName = $this->name;
        $tagText = $this->text;
        $tagAtrs = $this->attrs;
        $tag = "<$tagName";
        foreach ($tagAtrs as $atrName => $atrValue) {
            $tag .= " $atrName=\"$atrValue\"";
        }
        $tag .= ">$tagText</$tagName>";
        echo $tag;
    }
}

$tag = new Tag('b');
$tag->setAtr('color', 'red');
$tag->setText("text");
$tag->show();