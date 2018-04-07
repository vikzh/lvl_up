<?php

class Conf
{
    private $file;
    private $xml;
    private $lastmatch;

    function __construct($file)
    {
        $this->file = $file;
        if (!file_exists($file)) {
            throw new FileException("Файл '$file' не найден");
        }
        $this->xml = simplexml_load_file($file, null, LIBXML_NOERROR);
        if (!is_object($this->xml)) {
            throw new XmlException((libxml_get_last_error()));
        }
        print gettype($this->xml);
        $matches = $this->xml->xpath("/conf");
        if (!count($matches)) {
            throw new ConfException("Корневой элемент conf не найден");
        }
    }

    function write()
    {
        if (!is_writable($this->file)) {
            throw new FileException("Файл '{$this->file}' недоступен для записи");
        }
        file_put_contents($this->file, $this->xml->asXML());
    }

    function get($str)
    {
        $matches = $this->xml->xpath("/conf/item[@name=\'$str]");
        if (count($matches)) {
            $this->lastmatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    function set($key, $value)
    {
        if (!is_null($this->get($key))) {
            $this->lastmatch[0] = $value;
            return;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }
}

class XmlException extends Exception
{
    private $error;

    function __construct(LibXMLError $error)
    {
        $shortfile = basename($error->file);
        $msg = "[{$shortfile}, строка {$error->line},";
        $msg .= "Колонка {$error->column}] {$error->message}";
        $this->error = $error;
        parent::__construct($msg, $error->code);
    }

    function getLibXmlError()
    {
        return $this->error;
    }
}

class Runner
{
    static function init()
    {
        try {
            $fh = fopen(".log.txt", "w");
            fputs($fh, "Начало\n");
            $conf = new Conf(dirname(__FILE__) . "/conf.broken.xml");
            print "user: " . $conf->get('user') . "\n";
            print "host: " . $conf->get('host') . "\n";
            $conf->set("pass", "newpass");
            $conf->write();
            fputs($fh, "Конец");
            fclose($fh);
        } catch (FileException $e) {
            //Файл не сущ. или не доступен для записи
            fputs($fh, "Файловая Ошибка");
            throw $e;
        } catch (XmlException $e) {
            fputs($fh, "Ошибка в коде XML");
            throw $e;
            //Поврежд XML файл
        } catch (ConfException $e) {
            //Некорректный формат XML файла
            fputs($fh, "Ошибка в коде конфигурации");
            throw $e;
        } catch (Exception $e) {
            //Ловушка: этот код не должен никогда вызваться
        } finally {
            fputs($fh, "Конец");
            fclose($fh);
        }
    }
}

class FileException extends Exception
{
}

class ConfException extends Exception
{
}