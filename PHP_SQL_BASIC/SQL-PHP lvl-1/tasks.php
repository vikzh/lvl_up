<?php
echo '<pre>';
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'test';

//Соединение с бд используя данные выше
$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
//Устанавливаем кодировку(не обязательно, но поможет избежать проблем)
mysqli_query($link, "SET NAMES 'utf8'");
//Формирование тестового запроса
$query = "SELECT * FROM workers WHERE id > 0";
//Делаем запрос к бд
$result = mysqli_query($link, $query) or die(mysqli_error($link));
//Проверяем что вернула БД. Если null - то какие-то проблемы
var_dump($result);
var_dump($link);
//Если var_dump вернет resource то все работает. null - проблемы
//Преобразуем то, что отдала база в нормальный массив PHP $data:
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row) ;
var_dump($data);

//Выбрать работника с id = 3
$query_task1 = "SELECT * FROM workers WHERE id = 3";
//Выбрать работников с зарплатой 1000$
$query_task2 = "SELECT * FROM workers WHERE salary = 1000";
//Выбрать работников в возрасте 23 года
$query_task3 = "SELECT * FROM workers WHERE age = 23";
//Выбрать работников с зарплатой более 400$
$query_task4 = "SELECT * FROM workers WHERE salary > 400";
//Выбрать работников с зарплатой равной или большей 500$
$query_task5 = "SELECT * FROM workers WHERE salary >= 500";
//Выбрать работников с зарплатой НЕ равной 500$
$query_task6 = "SELECT * FROM workers WHERE salary != 500";
//Выбрать работников с зарплатой равной или меньшей 900$
$query_task7 = "SELECT * FROM workers WHERE salary <= 900";
//Узнайте зарплату и возраст Васи
$query_task8 = "SELECT salary,age FROM workers WHERE name = 'Вася'";

//Выбрать работников в возрасте от 25 (не включительно) до 28 лет (включительно).
$query_task9 = "SELECT * FROM workers WHERE age > 25 AND age <= 28";
// Выбрать работника Петю
$query_task10 = "SELECT * FROM workers WHERE name = 'Петя'";
//Выбрать работников Петю и Васю
$query_task11 = "SELECT * FROM workers WHERE name = 'Петя' OR name = 'Вася'";
//Выбрать всех, кроме работника Петя
$query_task12 = "SELECT * FROM workers WHERE name != 'Петя'";
//Выбрать всех работников в возрасте 27 лет или с зарплатой 1000$
$query_task13 = "SELECT * FROM workers WHERE age = 27 OR salary = 1000";
//Выбрать всех работников в возрасте от 23 лет (включительно) до 27 лет (не включительно) или с зарплатой 1000$
$query_task14 = "SELECT * FROM workers WHERE (age >= 23 AND age < 27) OR salary = 1000";
//Выбрать всех работников в возрасте от 23 лет до 27 лет или с зарплатой от 400$ до 1000$
$query_task15 = "SELECT * FROM workers WHERE (age >= 27 AND age < 27) OR (salary >= 400 AND salary < 1000)";
//Выбрать всех работников в возрасте 27 лет или с зарплатой не равной 400$
$query_task16 = "SELECT * FROM workers WHERE age = 27 OR salary != 400";

//Добавьте нового работника Никиту, 26 лет, зарплата 300$. Воспользуйтесь первым синтаксисом
$query_task17 = "INSERT INTO workers SET name = 'Никита',age = 26, salary = 300";
//Добавьте нового работника Светлану с зарплатой 1200$. Воспользуйтесь вторым синтаксисом
$query_task18 = "INSERT INTO workers (name, age, salary) VALUES ('Светлана, 20, 1200')";
//Добавьте двух новых работников одним запросом: Ярослава с зарплатой 1200$ и возрастом 30,
// Петра с зарплатой 1000$ и возрастом 31
$query_task19 = "INSERT INTO workers (name, age, salary) VALUES ('Ярослав', 30, 1200),VALUES ('Петр', 1000, 31)";

//Удалите работника с id=7
$query_task20 = "DELETE FROM workers WHERE id = 7";
//Удалите Колю
$query_task21 = "DELETE FROM workers WHERE name = 'Коля'";
//Удалите всех работников, у которых возраст 23 года
$query_task22 = "DELETE FROM workers WHERE age = 23";

//Поставьте Васе зарплату в 200$
$query_task23 = "UPDATE workers SET salary = 200 WHERE name = 'Вася'";
//Работнику с id=4 поставьте возраст 35 лет
$query_task24 = "UPDATE workers SET age = 35 WHERE id = 4";
//$query = "UPDATE workers SET salary = 700 WHERE salary = 500";
$query_task25 = "UPDATE workers SET salary 700 WHERE salary = 500";
//Работникам с id больше 2 и меньше 5 включительно поставьте возраст 23
$query_task26 = "UPDATE workers SET age 23 WHERE id > 2 AND id <= 5";
echo '</pre>';
