<?php

require_once '/parts/header.php';

if (isset ($_GET['product'])) {
    $currentProd = $_GET['product'];
    $product = $connect->query("SELECT * FROM phone WHERE model='$currentProd'");
    $product = $product->fetch(PDO::FETCH_ASSOC);
}

?>

<div class="product-card">
    <a href="index.php">Вернуться на главную</a>

    <h2><? echo $product['model']?> (<? echo $product['price']?> рублей)</h2>
    <div class="descr"><? echo $product['info']?></div>
    <img width="300" src="img/<? echo $product['img']?>" alt="<? echo $product['rus_name']?>">
    <form action="actions/add.php" method="post">
        <input type="hidden" name="id" value="<? echo $model['id']?>">
        <input type="submit" value="Добавить в корзину">
    </form>
</div>
