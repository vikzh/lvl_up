<?php
//3.Установите куку с именем age. Запишите туда случайное число от 10 до 70 (с помощью mt_rand).
// Сделайте так, чтобы эта кука установилась на 1 час, на 3 часа, на 1 день, на год, на 10 лет,
// до конца текущего дня, до конца текущего года.
setcookie('age', mt_rand(10,70),time() + 3600);
setcookie('age', mt_rand(10,70),time() + 24 * 3600);
setcookie('age', mt_rand(10,70),time() + 365 * 24 * 3600);
setcookie('age', mt_rand(10,70),time() + 10 * 365 * 24 * 3600);
setcookie('age','',time());