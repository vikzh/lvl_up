<?php
echo '<pre>';
//Из таблицы workers достаньте первые 6 записей
$query_task1 = "SELECT * FROM workers LIMIT 6";
//Из таблицы workers достаньте записи со вторую, 3 штуки
$query_task2 = "SELECT * FROM workers LIMIT 2,3";

//Из таблицы workers достаньте всех работников и отсортируйте их по возрастанию зарплаты
$query_task3 = "SELECT * FROM workers ORDER BY salary";
// Из таблицы workers достаньте всех работников и отсортируйте их по убыванию зарплаты
$query_task4 = "SELECT * FROM workers ORDER BY salary DESC";
//Из таблицы workers достаньте работников со второго по шестого и отсортируйте их по возрастанию возраста
$query_task5 = "SELECT * FROM workers ORDER BY age LIMIT 2,4";

//В таблице workers подсчитайте всех работников
$query_task6 = "SELECT COUNT(*) FROM workers";
// В таблице workers подсчитайте всех работников c зарплатой 300$
$query_task7 = "SELECT COUNT(*) FROM workers WHERE salary = 300";

//В таблице pages найти строки, в которых фамилия автора заканчивается на "ов"
$query_task8 = "SELECT * FROM pages WHERE author LIKE '%ов'";
// В таблице pages найти строки, в которых есть слово "элемент" (искать только по колонке article)
$query_task9 = "SELECT * FROM pages WHERE article LIKE 'элемент'";
//В таблице workers найти строки, в которых возраст работника начинается с числа 3,
// а далее идет только одна цифра
$query_task10 = "SELECT * FROM workers WHERE age LIKE %3_";
//В таблице workers найти строки, в которых имя работника заканчивается на "я"
$query_task11 = "SELECT * FROM workers WHERE name LIKE %я";
echo '</pre>';