<?php

require_once 'db/db.php';

if (isset ($_GET['product'])) {
    $currentProd = $_GET['product'];
    $product = $connect->query("SELECT * FROM phone WHERE model='$currentProd'")
    ->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        header("Location: index.php");
    }
}

require_once '/parts/header.php';

?>

<div class="product-card">
    <a href="index.php">Вернуться на главную</a>
    <h2><? echo $product['model']?> (<? echo $product['price']?> рублей)</h2>
    <div class="descr"><? echo $product['info']?></div>
    <img width="300" src="img/<? echo $product['img']?>" alt="<? echo $product['rus_name']?>">
    <? require 'parts/addToCart.php'?>
</div>
