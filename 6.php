<?
$differences=[ //Создаю массив с 2 элементами(отличиями методов GET и POST)
"Запрос GET передает данные в URL в виде пар имя-значение",
"запрос POST передает данные в теле запроса"
];
echo $differences[0] . '<br>';//Вывожу первый(нулевой) элемент массива
echo $differences[1]. '<br>';//Вывожу второй(первый) элемент массива
echo 'Привет, меня зовут '. $_POST['username']. ' '.  $_POST['surname'] . ', мой возраст - '. $_POST['age'] . "<br>";//Беру элементы из формы метода POST
echo 'Привет, меня зовут '. $_GET['username']. ' '.  $_POST['surname']. ', мой возраст - '. $_GET['age'];//Беру элементы из формы метода GET

?>
<form action="" method="post"><!--Создаю форму с методом POST-->
    Имя:  <input type="text" name="username" /><br /><!--Создаю поле с именем username-->
    Фамилия:  <input type="text" name="surname" /><br /><!--Создаю поле с именем surname-->
    Возраст: <input type="text" name="age" /><br /><!--Создаю поле с именем age-->
    <input type="submit" name="submit" value="Отправь меня!" /><!--Создаю кнопку-->
</form>
<form action="" method="get"><!--Создаю форму с методом GET-->
    Имя:  <input type="text" name="username" /><br /><!--Создаю поле с именем username-->
    Фамилия:  <input type="text" name="surname" /><br /><!--Создаю поле с именем surname-->
    Возраст: <input type="text" name="age" /><br /><!--Создаю поле с именем age-->
    <input type="submit" name="submit" value="Отправь меня!" /><!--Создаю кнопку-->
</form>
