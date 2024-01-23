# phptest1
Test task (plain PHP, MySQL, Docker)

## Быстрый старт:
```
docker-compose up 
```
Из папки проекта.

Запускаются контейнеры с Apache+PHP и СУБД и у них соотвественно открывается порты 8080 и 9906 для доступа с хост-системы. 
Перенастроить номера портов можно в **.env** файле в параметрах MYSQL_PORT и HTTP_PORT.
База инициализируется из *init.sql*.

Прямой доступ (для контроля) к базе из хост-системы:
```
mysql -P 9906 --user root -p1 test_db
```
(при параметрах по-умолчанию).

## Рабочие запросы:
```
http://localhost:8080/?user_id=1
http://localhost:8080/?user_id=1234
```
Итп. (шаблон ответа задаётся в *output.php*)

## Быстрый тест:
Наивный перебор заданных пользователей и вывод их балансов делает скрипт
```
quick-test.sh
```
Сумма баллансов должны быть нулевой:
```
~/PhpstormProjects/testtask1$ ./quick-test.sh |jq -s 'add'
0
```
(сработает при наличии в системе curl и jq).

