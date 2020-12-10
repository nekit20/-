<?php
class Product {//создаём класс
public $name;//создаём переменную имя
public $price;//создаём переменную цена
public $weight;//создаём переменную вес
public function __construct($name,$price,$weight) {//создаём конструктор
$this->name = $name;//присваиваем имя объекту
$this->price = $price;//присваиваем цену объекту
$this->weight = $weight;//присваиваем вес объекту
}
public function printInfo () {//создаём функцию
echo "Название: $this->name, цена $this->price, вес $this->weight <br>";//выводим данные объекта
}
}
$milk=new Product('milk',20,10);//создаём объект
$milk->printInfo();//выводим данные объекта
$cake=new Product('cake',25,5);//создаём объект
$cake->printInfo();//выводим данные объекта
$tea=new Product('tea',10,20);//создаём объект
$tea->printInfo();//выводим данные объекта
?>
