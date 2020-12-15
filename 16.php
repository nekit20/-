<?php
$connection = new PDO ( 'mysql:host=localhost:58881; dbname=comment; charset=utf8', 'root', 'root');//Подключяемся к базе данных
$data = $connection->query("SELECT * FROM comment");//В переменную логин записываем таблицу comment

if ($_POST['login']) {//Если форма была отправлена

            $user=htmlspecialchars($_POST['login']);//Присваеваем отправленный логин, с проверкой на html код
            $comment=htmlspecialchars($_POST['comment']);//Присваеваем отправленный комментарий, с проверкой на html код
    $safe = $connection->prepare("INSERT INTO comment SET user=:user,comments=:comments");//Записываем в переменную safe вставку в таблицу, с временными переменнами
    $arr = ['user'=>$user,'comments'=>$comment];//Записываем в массив наш логин и комментарий
    $safe->execute($arr);//Записываем в бд логин и комментарий
    header('Location:index.php');//Обновляем страницу
}


?>
<form action="" method="post"><!--Создаю форму с методом POST-->
    Логин:  <input type="text" name="login" required /><br /><!--Создаю поле с именем login-->
   Оставьте свой комментарий:  <input type="text" name="comment" required/><br /><!--Создаю поле с именем comment-->


    <input type="submit" name="submit" value="Отправь меня!" /><!--Создаю кнопку-->
</form>
<?php foreach ($data as $comments) {//Для каждой строчки в таблице?>
<p>
<? echo $comments['user']. " говорит- ". $comments['comments'];//Вывожу комментарий с логином?>
</p>
<?php } ?>
