<?php
$connection = new PDO ( 'mysql:host=localhost:58881; dbname=comment; charset=utf8', 'root', 'root');//Подключяемся к базе данных

if (isset($_POST['submit'])) {//Если была отправлена форма
    $fileName=[//присваиваем массив имён файла
            $_FILES['file']['name'],
        $_FILES['file-1']['name'],
        $_FILES['file-2']['name']];
    $fileTmpName= [//присваиваем массив временных имён файла
            $_FILES['file']['tmp_name'],
        $_FILES['file-1']['tmp_name'],
        $_FILES['file-2']['tmp_name']];
    $fileType = $_FILES['file']['type'];//тип файла
    $fileError=$_FILES['file']['error'];//ошибка(0 если нет, 1 если есть)
    $fileSize =$_FILES['file']['size'];//размер файла

    $fileExtension = [
            strtolower(end(explode('.',$fileName[0]))),
        strtolower(end(explode('.',$fileName[1]))),
        strtolower(end(explode('.',$fileName[2])))
    ];//присваиваем расширения файлов с маленьким регистром
    $pattern=['/.jpg/','/.png/','/.jpeg/'];//массив с расширениями файлов
    $fileName=preg_replace($pattern,'',$fileName);//заменяем расширение файла на пустую строку
    $fileName = preg_replace('/[0-9]/','',$fileName);//заменяем цифры в названии файла на пустую строку

    $allowedExtensions = ['jpg','jpeg', 'png'];//разрешённые расширения
    if(in_array($fileExtension[0],$allowedExtensions) || in_array($fileExtension[1],$allowedExtensions) || in_array($fileExtension[2],$allowedExtensions)) {//если расширение файла совпадаёт с разрешенным расширением
        if ($fileSize<5000000) {//если размер меньше 5 мбайт
            if ($fileError==0) {//если нет ошибки
                foreach ($fileName as $file=>$value) {//для каждого элемента в файле

                    if($value) {//если есть значение
                        $connection->query("INSERT INTO files (file_name,extension) VALUES ('$fileName[$file]','$fileExtension[$file]')");//вставляем данные в базу данных
                        $lastID = $connection->query("SELECT MAX(id) FROM files");//присваиваем последний id из базы данных
                        $lastID = $lastID->fetchALL();//возвращаем все строки

                        $lastID=$lastID[0][0];//значение последнего id
                        $fileNameNew=$lastID.$fileName[$file].'.'.$fileExtension[$file];//создаём имя файла
                        $fileDestination='uploads/' . $fileNameNew;//создаём директиву файла
                        move_uploaded_file($fileTmpName[$file],$fileDestination);//загружаем файл в нужную нам директиву
                    }
                    }


                echo 'Успех';
            } else {
                echo "Что-то пошло не так";
            }
        } else {
            echo "Слишком большой размер файла";
        }
    } else {
        echo "Неверный тип файла";
    }

}
$data = $connection->query("SELECT * FROM files");//В переменную дата записываем таблицу files

echo "<div style='display:flex; align-items:flex-end; flex-wrap:wrap'>";//выводим div

foreach ($data as $img) {//для каждого элемента
    $delete="delete".$img['id'];//формируем строчку удаления
    $image= "uploads/".$img['id'].$img['file_name'].'.'.$img['extension'];//полный путь до файла
    if (isset($_POST[$delete])) {//если нажата кнопка удалить
        $imageID=$img['id'];//присваиваем id удаляемой картинки
        $connection->query("DELETE FROM files WHERE id ='$imageID'");//удаляем файл из базы данных
        if (file_exists($image)) {//если файл существует
            unlink($image);//удаляем файл из папки
        }
    }

if (file_exists($image)) {//если файл существует
    echo "<div>";
    echo "<img width='150' height='150' src='$image'>";//выводим картинку
    echo "<form method='POST'><button name='delete".$img['id']."'style='display:block; margin:auto'>Удалить</button></form></div>";//выводим кнопку с id из бд
}
}
echo "</div>";
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data"><!--Создаю форму с методом POST-->
    <input type="file" name="file" required><!--выборка файла обязательна-->
    <input type="file" name="file-1" ><!--выборка файла необязательна-->
    <input type="file" name="file-2" ><!--выборка файла необязательна-->
    <button name="submit">Отправить</button><!--кнопка-->
    
</form>
</body>
</html>
