<?php
// Lesson 1:Class, Objects, Constructor, Properties and Method
require('Product.php');

$prod = new Product(null, null, null, null);

$prod->setName(10);
$prod->getName("TV 40 Polegadas");

echo "Valor = ";
$prod->getPrice();

echo "<br>Nome = ";
$prod->getName();

echo "<br>----------------<br>";

$prod2 = new Product(null, null, "TV'", 50);


echo "Valor = ";
$prod2->getPrice();

echo "<br>Nome = ";
$prod2->getPrice();

?>