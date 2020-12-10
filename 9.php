<?php
abstract class  Product {//создаём класс и делаем его абстрактным
public static $companyName="KFC";//объявлем статическую перменную с названием компании
const YEAR_START=2000;//объявляем константу с годом основания компании
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
public function showImage() {//создаём функцию

}
public static function showCompanyInfo() {//создаём статическую функцию
echo self::$companyName . " " . self::YEAR_START;//выводим константу и статическую переменную с помощью обращения self
}
}
class Chocolate extends Product {//создаём класс и наследуем свойста от класса Product
public $calories;//создаём переменную каллории
public function showImage() {//создаём функцию
echo "<div style='width:200px; height:200px; background:url(chocolate.jpg)'>$this->name</div>";//создаём блок с шириной и высотой 200px и изображением

}
}
class Candy extends Product {//создаём класс и наследуем свойста от класса Product
public function showImage() {//создаём функцию
echo "<div style='width:100px; height:100px; background:url(cake.jpg)'>$this->name</div>";//создаём блок с шириной и высотой 200px и изображением

}
}
$Milka=new Chocolate('Milka',10,20);//создаём объект от класса Chocolate
$Milka->showImage();//вызываем функцию
$Iriska=new Candy('Iriska',10,20);//создаём объект от класса Candy
$Iriska->showImage();//вызываем функцию
echo Product::showCompanyInfo();//вызываем функцию через обращение к классу
?>
