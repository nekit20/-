<?
$happyday = $_GET['date'];//Задаём переменной дату из формы
$curday = date('d.m.Y');//Задаём переменной текущую дату
$d1 = strtotime($happyday);//Переводим дату в секунды
$d2 = strtotime($curday);//Переводим дату в секунды
$diff = $d2-$d1;//Вычитаем даты
$diff = $diff/(60*60*24*365);//Переводим секунды в года
$years = floor($diff);//Округляем в меньшую сторону
echo "Вам " . $years. " полных лет";//Выводим

?>
<form action="" method="get"><!--Создаю форму с методом GET-->
   Дата рождения:  <input type="text" name="date" /><br /><!--Создаю поле с именем date-->
    <input type="submit" name="submit" value="Отправь меня!" /><!--Создаю кнопку-->
</form>
