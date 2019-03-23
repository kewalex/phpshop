<?php

session_start();

require_once 'db/db.php';

$category=$connect->query("SELECT * FROM category")
->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Магазин</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Главная</a></li>
        <? foreach ($category as $cat)   {     ?>
        <li><a href="index.php?category=<? echo $cat['name']?>"><? echo $cat['name']?></a></li>
        <? } ?>
        <li><a href="cart.php">Корзина (Товаров: <? echo $_SESSION['totalQuantity'] ? : 0 ?> на сумму <? echo $_SESSION['totalPrice'] ? : 0 ?> руб)</a></li>
        <li><a href="">Сбросить</a></li>

    </ul>
</nav>
<hr>