<?php
// 1. Сделайте класс Worker, в котором будут следующие public поля - name (имя), age (возраст), salary (зарплата).
//
//Создайте объект этого класса, затем установите поля в следующие значения (не в __construct, а для созданного объекта)
// - имя 'Иван', возраст 25, зарплата 1000. Создайте второй объект этого класса, установите поля в следующие значения - имя 'Вася', возраст 26, зарплата 2000.
//
//Выведите на экран сумму зарплат Ивана и Васи. Выведите на экран сумму возрастов Ивана и Васи.
class Worker_task1
{
    public $name;
    public $age;
    public $salary;

}

$objIvan_task1 = new Worker_task1();
$objIvan_task1->name = 'ivan';
$objIvan_task1->age = 25;
$objIvan_task1->salary = 1000;

$objVasa_task1 = new Worker_task1();
$objVasa_task1->name = 'vasa';
$objVasa_task1->age = 26;
$objVasa_task1->salary = 2000;

echo $objIvan_task1->age + $objVasa_task1->age, $objIvan_task1->salary + $objVasa_task1->salary . '<br>';

// 2. Сделайте класс Worker, в котором будут следующие private поля - name (имя), age (возраст), salary (зарплата)
// и следующие public методы setName, getName, setAge, getAge, setSalary, getSalary.
//
//Создайте 2 объекта этого класса: 'Иван', возраст 25, зарплата 1000 и 'Вася', возраст 26, зарплата 2000.
//
//Выведите на экран сумму зарплат Ивана и Васи. Выведите на экран сумму возрастов Ивана и Васи.
//Дополните класс Worker из предыдущей задачи private методом checkAge, который будет проверять возраст на корректность
// (от 1 до 100 лет). Этот метод должен использовать метод setAge перед установкой нового возраста
// (если возраст не корректный - он не должен меняться).

class Worker_task2
{
    private $name;
    private $age;
    private $salary;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    private function checkAge($age)
    {
        if ($age >= 1 && $age <= 100) {
            return true;
        } else return false;
    }

    public function setAge($age)
    {
        if ($this->checkAge($age)) {
            $this->age = $age;
        }
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
}

$objIvan_task2 = new Worker_task2();
$objIvan_task2->setName('Ivan');
$objIvan_task2->setAge(25);
$objIvan_task2->setSalary(1000);

$objVasa_task2 = new Worker_task2();
$objVasa_task2->setName('Vasa');
$objVasa_task2->setAge(26);
$objVasa_task2->setSalary(2000);

echo $objVasa_task2->getSalary() + $objIvan_task2->getSalary(), $objIvan_task2->getAge() + $objVasa_task2->getAge();


//Сделайте класс Worker, в котором будут следующие private поля - name (имя), salary (зарплата). Сделайте так,
//чтобы эти свойства заполнялись в методе __construct при создании объекта (вот так: new Worker(имя, возраст) ).
//Сделайте также public методы getName, getSalary.
//
//Создайте объект этого класса 'Дима', возраст 25, зарплата 1000. Выведите на экран произведение его возраста и зарплаты.

class Worker_task3
{
    private $name;
    private $salary;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

$objDima_task3 = new Worker_task3('Дима', 1000);
echo $objDima_task3->getName() . ':' . $objDima_task3->getSalary();


//5. Сделайте класс User, в котором будут следующие protected поля - name (имя), age (возраст), public методы setName, getName, setAge, getAge.
//
//Сделайте класс Worker, который наследует от класса User и вносит дополнительное private поле salary (зарплата), а также методы public getSalary и setSalary.
//
//Создайте объект этого класса 'Иван', возраст 25, зарплата 1000. Создайте второй объект этого класса 'Вася', возраст 26, зарплата 2000. Найдите сумму зарплата Ивана и Васи.

class User_task5
{
    protected $name;
    protected $age;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
}

class Worker_task5 extends User_task5
{
    private $salary;

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
}

$objWorker1_task5 = new Worker_task5();
$objWorker1_task5->setName('Ivan');
$objWorker1_task5->setAge(25);
$objWorker1_task5->setSalary(1000);

$objWorker2_task5 = new Worker_task5();
$objWorker2_task5->setName('Vasa');
$objWorker2_task5->setAge(26);
$objWorker2_task5->setSalary(2000);

echo 'Sum:', $objWorker1_task5->getSalary() + $objWorker2_task5->getSalary();

class Driver extends Worker_task5
{
    private $experience;
    private $rank;

    public function __construct($experience, $rank)
    {
        $this->experience = $experience;
        $this->rank = $rank;
    }

    public function getExperience()
    {
        return $this->experience;
    }

    public function getRank()
    {
        return $this->rank;
    }

}

$objDriver_task6 = new Driver(10, 'A');
echo $objDriver_task6->getExperience(), $objDriver_task6->getRank();

class Form
{
    public function input($args)
    {
        $attributes = $this->makeAttribute($args);
        return "<input $attributes>";
    }

    public function submit($args)
    {
        $attributes = $this->makeAttribute($args);
        return "<input type = \"submit\" $attributes>";
    }

    public function password($args)
    {
        $attributes = $this->makeAttribute($args);
        return "<input type = \"password\" $attributes>";
    }

    public function textarea($args)
    {
        $attributes = $this->makeAttribute($args);
        return "<textarea $attributes></textarea>";
    }

    public function open($args)
    {
        $attributes = $this->makeAttribute($args);
        return "<form $attributes>";
    }

    public function close($args)
    {
        $attributes = $this->makeAttribute($args);
        return "</form $attributes>";
    }

    protected function makeAttribute($args)
    {
        $attributes = '';
        foreach ($args as $key => $value) {
            $attributes .= "$key=\"$value\" ";
        }
        return $attributes;
    }
}

$form = new Form();
echo $form->input(['type' => 'text', 'value' => '!!!']);


//Создайте класс SmartForm, который будет наследовать от Form из предыдущей задачи
// и сохранять значения инпутов и textarea после отправки.
class SmartForm extends Form
{
    protected function makeAttribute($args)
    {
        if (isset($_REQUEST[$args['value']])) {
            $args['value'] = $_REQUEST[$args['value']];
        }
        parent::makeAttribute($args);
    }
}

//Создайте класс Cookie - оболочку над работой с куками. Класс должен иметь следующие методы:
// установка куки set(имя куки, ее значение), получение куки get(имя куки), удаление куки del(имя куки).

class Cookie
{
    public function getCookie($name)
    {
        return $_COOKIE[$name];
    }

    public function setCookie($name, $value)
    {
        setcookie($name, $value, time() + 60 * 3600);
    }

    public function delCookie($name)
    {
        setcookie($name, '', time());
    }
}

//Создайте класс Session - оболочку над сессиями. Он должен иметь следующие методы: создать переменную сессии,
// получить переменную, удалить переменную сессии, проверить наличие переменной сессии.
//Сессия должна стартовать (session_start) в методе __construct.
class Session
{
    public function __construct()
    {
        session_start();
    }

    public function createSession($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function getSession($name)
    {
        return $_SESSION[$name];
    }

    public function issetSession($name)
    {
        if (isset($_SESSION[$name])) {
            return true;
        }
        return false;
    }

    public function delSession($name)
    {
        unset($_SESSION[$name]);
    }
}

//  Реализуйте класс Flash, который будет использовать внутри себя класс Session из предыдущей задачи (именно использовать, а не наследовать).
//
//Этот класс будет использоваться для сохранения сообщений в сессию и вывода их из сессии.
//Зачем это нужно: такой класс часто используется для форм. Например на одной странице пользователь отправляет форму,
// мы сохраняем в сессию сообщение об успешной отправке, редиректим пользователя на другую страницу и там показываем сообщение из сессии.
//
//Класс должен иметь да метода - setMesetMessage, который сохраняет сообщение в сессию и getMessage, который получает сообщение из сессии.

class Flash
{
    private $message;

    public function __construct()
    {
        $this->message = new Session();
    }

    public function setMessage($value)
    {
        $this->message->createSession('form', $value);
    }

    public function getMessage()
    {
        $this->message->getSession('form');
    }
}


//Создайте класс-оболочку Db над базами данных. Класс должен иметь следующие методы: получение данных, удаление данных,
// редактирование данных, подсчет данных, очистка таблицы, очистка таблиц.

class Db
{
    private $connection;
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'root';
    private $database = "mydb";
    private $table;

    public function __construct()
    {
        $this->connection = new mysqli($this->getHost(), $this->getUser(), $this->getPassword(), $this->getDatabase());
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getDatabase()
    {
        return $this->database;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function setTable($tableName)
    {
        $this->table = $tableName;
    }

    public function selectData($fields)
    {
        $query = 'SELECT ';
        foreach ($fields as $field) {
            $query .= $field;
        }
        $query .= " FROM $this->table";
        return $this->makeQuery($query);
    }

    public function insertData($values)
    {
        $query = "INSERT INTO $this->table SET ";
        foreach ($values as $key => $value) {
            $query .= $key . " = " . "$value";
        }
        $this->makeQuery($query);
    }

    public function deleteData($field, $id)
    {
        return $this->makeQuery("DELETE $field FROM $this->table WHERE id = $id");
    }

    public function getCount()
    {
        return $this->makeQuery("SELECT COUNT(*) FROM $this->table");
    }

    public function clearTable()
    {
        return $this->makeQuery("TRUNCATE TABLE $this->table");
    }

    public function deleteTable()
    {
        return $this->makeQuery("DROP TABLE $this->table");
    }

    protected function makeQuery($query)
    {
        return $this->connection->query($query);
    }
}

//Создайте класс Log для ведения логов. Этот класс должен иметь следующие методы: сохранить в лог,
// получить последние N записей, очистить таблицу с логами.
//
//Класс Log должен использовать класс Db из предыдущей задачи (именно использовать, а не наследовать).

class Log
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
        $this->db->setTable('logs');
    }

    public function saveLog($log)
    {
        return $this->db->insertData(['log' => $log]);
    }

    public function clearLogs()
    {
        return $this->db->clearTable();
    }

    public function getlog()
    {
        return $this->db->selectData('log');
    }
}