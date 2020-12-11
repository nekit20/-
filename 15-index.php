<?php
session_start();//Начинаем сессию

$connection = new PDO ( 'mysql:host=localhost:58881; dbname=lesson; charset=utf8', 'root', 'root');//Подключяемся к базе данных
$login = $connection->query('SELECT * FROM lesson.users');//В переменную логин записываем таблицу users
if ($_POST['login']) {//Если форма была отправлена
    setcookie('color',$_POST['color'],time()+3600);//Создаём куки с выбранным цветом в теге select
    foreach ($login as $log) {//Для каждого элемента в таблице
        if ($_POST['login']==$log['login'] && $_POST['password']==$log['password']) {//Если отправленный логин и пароль совпадают с логином и паролем таблицы
            $_SESSION['login']=$_POST['login'];//Присваеваем отправленный логин, в логин сессии
            $_SESSION['password']=$_POST['password'];//Присваеваем отправленный пароль, в логин сессии

            header("Location:content.php");//Переходим на страницу content.php
        }

    }
    echo "Неверный логин или пароль";//Говорим пользователю о неправильном логине или пароле
}
if ($_SESSION['login'] || $_SESSION['password']) {//Если пользователь уже авторизован, то выкидываем его на страницу content.php
    header("Location:content.php");
}

?>
<form action="" method="post"><!--Создаю форму с методом POST-->
    Логин:  <input type="text" name="login" required /><br /><!--Создаю поле с именем login-->
   Пароль:  <input type="text" name="password" required/><br /><!--Создаю поле с именем password-->

    <select class="form" name="color"><!--Создаю выбор цвета-->
        <option disabled>Выберите цвет</option>
        <option value="Red">Красный</option>
        <option value="Blue">Голубой</option>
    </select>
    <input type="submit" name="submit" value="Отправь меня!" /><!--Создаю кнопку-->
</form>
