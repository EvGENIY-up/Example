<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
class FirstAPI
{

public function check()
{
    $dbconn = pg_connect("host=localhost port=5432 dbname=Kurs user=postgres password=135713")
    or die('Не удалось соединиться: ' . pg_last_error());;
// Выполнение SQL-запроса
    $query = 'SELECT * FROM users';
    $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
    $int = 1;
// Вывод результатов в HTML
    while ( $stroka = pg_fetch_array($result, null, PGSQL_ASSOC)) {
$int = $int + 1;
        if (isset($_POST['login']))
            if ($_POST['login']==$stroka['login'])
    $line['user'.$int]=$stroka;
    }
// Очистка результата


// Закрытие соединения
    pg_close($dbconn);
   return new Response(json_encode($line));
}
}