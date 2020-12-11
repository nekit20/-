<?php
session_start();//Начинаем сессию
if (!$_SESSION['login'] || !$_SESSION['password']) {//Если нет данных в логине сессии или пароле сессии
    header("Location:index.php");//Возвращаемся на index.php
}
if ($_POST['unlogin']) {//Если была нажата кнопка выхода из аккаунта
    session_destroy();//Уничтожаем сессию
    header('Location:index.php');//Возвращаемся обратно на index.php
}

echo "Привет, ". $_SESSION['login']. "<br>";//Приветствуем пользователя
?>
<style>
body{
    background-color: <?= $_COOKIE['color']?>;/*прописываем цвет фона с помощью куки, исходя из выбранного цвета на index.php
}
</style>

<form  action="" method="post"><!--Создаю форму с методом POST-->


    <input type="submit" name="unlogin" value="Выйти из аккаунта!" /><!--Создаю кнопку-->
</form>
