# ex
# Выберите из таблицы workers записи с id равным 3, 5, 6, 10.
SELECT *
FROM workers
WHERE id IN (3, 5, 6, 10);

#Выберите из таблицы workers записи с id равным 3, 5, 6, 10 и логином, равным 'eee', 'zzz' или 'ggg'.
SELECT *
FROM workers
WHERE id IN (3, 5, 6, 10) AND login IN ("eee", "zzz", "ggg");

#Выберите из таблицы workers записи c зарплатой от 500 до 1500.
SELECT *
FROM workers
WHERE salary BETWEEN 500 AND 1500;

#Выберите из таблицы workers все записи так, чтобы вместо id было workersId, вместо login – workersLogin, вместо salary - workersSalary.
SELECT
  id     AS workerID,
  login  AS workerLogin,
  salary AS workerSalary
FROM workers;

#Найдите в таблице  workers минимальный возраст.
SELECT MIN(age)
FROM workers;

#Найдите в таблице workers суммарный возраст.
SELECT SUM(age)
FROM workers;

#Вставьте в таблицу workers запись с полем date с текущим моментом времени в формате 'год-месяц-день часы:минуты:секунды'.
INSERT INTO workers (date) VALUES (NOW());

#Вставьте в таблицу workers запись с полем date с текущей датой в формате 'год-месяц-день'.
INSERT INTO workers (date) VALUES (CURDATE());

#При выборке из таблицы workers запишите день, месяц и год в отдельные поля.
SELECT
  EXTRACT(DAY FROM date)   AS day,
  EXTRACT(MONTH FROM date) AS moth,
  EXTRACT(YEAR FROM date)  AS year
FROM workers;

#Выберите из таблицы workers записи, в которых минуты больше секунд.
SELECT *
FROM workers
WHERE MINUTE(date) > SECOND(date);

#При выборке из таблицы workers прибавьте к дате 1 год.
SELECT date + INTERVAL 1 YEAR AS date
FROM workers;

#При выборке из таблицы workers отнимите от даты 1 год.
SELECT date - INTERVAL 1 YEAR AS date
FROM workers;

#При выборке из таблицы workers прибавьте к дате 3 года, 4 месяца.
SELECT date + INTERVAL 3 YEAR + INTERVAL 4 MONTH AS date
FROM workers;

#При выборке из таблицы workers прибавьте к дате 4 дня, 3 часа, 2 минуты, 1 секунду.
SELECT DATE + INTERVAL 4 DAY + INTERVAL 3 HOUR + INTERVAL 2 MINUTE + INTERVAL 1 SECOND AS date
FROM workers;
SELECT DATE_SUB(date, INTERVAL "4 3:2:1" DAY_SECOND) FROM workers;

#При выборке из таблицы workers прибавьте к дате 3 дня и отнимите 2 часа.
SELECT date + INTERVAL 3 DAY - INTERVAL 2 HOUR FROM workers;



