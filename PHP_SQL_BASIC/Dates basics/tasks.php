<?php

echo '<pre>';

// 1. Выведите текущее время в формате timestamp
echo time(), "\n";


// 2. Выведите 1 марта 2025 года в формате
echo mktime(0, 0, 0, 3, 1, 2025), "\n";


// 3. Выведите 31 декабря текущего года в формате timestamp.
// Скрипт должен работать независимо от года, в котором он запущен
echo mktime(0, 0, 0, 12, 31), "\n";

// 4. Найдите количество секунд, прошедших с 13:12:59 15-го марта 2000 года до настоящего момента времени
echo time() - mktime(13, 12, 59, 3, 15, 2000), "\n";

// 5. Найдите количество целых часов, прошедших с 7:23:48 текущего дня до настоящего момента времени.
$sec_task5 = time() - mktime(7, 23, 48);
echo floor($sec_task5 / (60 * 60)), "\n";


// 6. Выведите на экран текущий год, месяц, день, час, минуту, секунду.
echo date('Y,m,d,H,i,s'), "\n";

// 7. Выведите текущую дату-время в форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59'
echo date('Y-m-d'), "\n";
echo date('d.m.Y'), "\n";
echo date('d.m.y'), "\n";
echo date('H:i:s'), "\n";

// 8. С помощью функций mktime и date выведите 12 февраля 2025 года в формате '12.02.2025'
echo date('d.m.Y', mktime(0, 0, 0, 2, 12, 2025)), "\n";

// 9. Создайте массив дней недели $week. Выведите на экран название текущего дня недели
// с помощью массива $week и функции date. Узнайте какой день недели был 06.06.2006.
$week = ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'];
echo $week[date('w')], "\n";
echo $week[date('w', mktime(0, 0, 0, 6, 6, 2006))], "\n";

// 10.  Создайте массив месяцев $month.
// Выведите на экран название текущего месяца с помощью массива $month и функции date.
$month = [
    'янв', 'фев', 'мар', 'апр', 'май', 'июнь',
    'июль', 'авг', 'сен', 'окт', 'ноя', 'дек'
];
echo $month[date('n') - 1], "\n";

// 11.Найдите количество дней в текущем месяце. Скрипт должен работать независимо от месяца, в котором он запущен.
echo date('t');

// 12.Сделайте поле ввода, в которое пользователь вводит год (4 цифры), а скрипт определяет високосный ли год.
?>
<form action="" method="get">
    <input type="text" name="year_task12">
    <input type="submit">
</form>
<?php
if (isset($_GET['year_task12'])) {
    if (date('L', mktime(0, 0, 0, 0, 0, $_GET['year_task12']))) {
        echo "Высокосный", "\n";
    } else echo "Не высокосный", "\n";
}

//13.Сделайте форму, которая спрашивает дату в формате '31.12.2025'.
// С помощью функций mktime и explode переведите эту дату в формат timestamp.
// Узнайте день недели (словом) за введенную дату
?>
<form action="" method="get">
    <input type="text" name="date_task13">
    <input type="submit">
</form>
<?php
if (isset($_GET['date_task13'])) {
    $elementsOfDate = explode('.', $_GET['date_task13']);
    echo $week[date('w', mktime(0, 0, 0, $elementsOfDate[0], $elementsOfDate[1], $elementsOfDate[2]))];
}

//14. Сделайте форму, которая спрашивает дату в формате '2025-12-31'.
// С помощью функций mktime и explode переведите эту дату в формат timestamp. Узнайте месяц (словом) за введенную дату
?>
<form action="" method="get">
    <input type="text" name="date_task14">
    <input type="submit">
</form>
<?php
if (isset($_GET['date_task14'])) {
    $month = [
        1 => 'янв', 'фев', 'мар', 'апр', 'май', 'июнь',
        'июль', 'авг', 'сен', 'окт', 'ноя', 'дек'
    ];
    $elementsOfDate = explode('-', $_GET['date_task14']);
    echo $month[date('n', mktime(0, 0, 0, $elementsOfDate[1], $elementsOfDate[2], $elementsOfDate[0]))];
}

//15. Сделайте форму, которая спрашивает две даты в формате '2025-12-31'.
// Первую дату запишите в переменную $date1, а вторую в $date2. Сравните, какая из введенных дат больше.
// Выведите ее на экран
?>
<form action="" method="get">
    <input type="text" name="date1_task15">
    <input type="text" name="date2_task15">
    <input type="submit">
</form>
<?php
if (isset($_GET['date1_task15']) && isset($_GET['date2_task15'])) {
    $date1_task15 = $_GET['date1_task15'];
    $date2_task15 = $_GET['date2_task15'];
    if ($date1_task15 > $date2_task15) {
        echo $date1_task15, "\n";
    } else echo $date2_task15, "\n";
}

// 16.Дана дата в формате '2025-12-31'. С помощью функции strtotime и функции date преобразуйте ее в формат '31-12-2025'
$date_task16 = '2025-12-31';
echo date('d-m-Y', strtotime($date_task16));

// 17. Сделайте форму, которая спрашивает дату-время в формате '2025-12-31T12:13:59'.
// С помощью функции strtotime и функции date преобразуйте ее в формат '12:13:59 31.12.2025'.
?>
<form action="" method="GET">
    <input type="text" name="date_task17">
    <input type="submit">
</form>

<?php
if (isset($_REQUEST['date_task17'])) {
    echo date('H:i:s d.m.Y', strtotime($_REQUEST['date_task17']));
}

// 18. В переменной $date лежит дата в формате '2025-12-31'.
// Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год. Отнимите от этой даты 3 дня.
$date_task18 = '2025-12-31';
$date_task18 = date_create($date_task18);
date_modify($date_task18, '2 day 1 month 1 year');
date_modify($date_task18, '-3 day');
date_format($date_task18, 'd-m-Y');

// 19. Узнайте сколько дней осталось до Нового Года. Скрипт должен работать в любом году
$date_task19 = time();
if (date('L', $date_task19)) {

    echo 366 - date('z', $date_task19);
} else {
    echo 365 - date('z', $date_task19);
}

// 20. Сделайте форму с одним полем ввода, в которое пользователь вводит год.
// Найдите все пятницы 13-е в этом году. Результат выведите в виде массива дат
?>
<form action="" method="get">
    <input type="text" name="date_task20">
    <input type="submit">
</form>
<?php
if (isset($_GET['date_task20'])) {
    $arr_task20 = [];
    for ($i = 0; $i < 12; $i++) {
        $timestamp_task20 = mktime(0, 0, 0, $i, 13, $_GET['date_task20']);
        if (date('w', $timestamp_task20) == 5) {
            $arr_task20[] = $i + 1;
        }
    }
    print_r($arr_task20);
}

//21. Узнайте какой день недели был 100 дней назад
$date_task21 = date_create();
date_modify($date_task21, '-100 day');
echo date_format($date_task21, 'd-m-Y'), "\n";
echo '</pre>';
?>

