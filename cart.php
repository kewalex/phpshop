<?php

session_start();

require_once '/parts/header.php';

if (isset($_SESSION['cart'])) {
foreach ($_SESSION['cart'] as $model) {

?>

<div class="cart">
    <a href="product.php?product=<? echo $model['model'] ?>">
    <img src="img/<? echo $model['img']?>" alt="<? echo $model['rus_name']?>">
    </a>
        <div class="cart-descr">
            <? echo $model['model']?> в количестве <? echo $model['quantity']?> шт на сумму <? echo $model['quantity']*$model['price']?> рублей
        </div>
    <button type="submit">Удалить</button>
</div>

<? } }?>

<hr>

</body>
</html>

