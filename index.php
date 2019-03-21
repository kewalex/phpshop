<?php

require_once '/parts/header.php';

$phone=$connect->query("SELECT * FROM phone");
$phone=$phone->fetchAll(PDO::FETCH_ASSOC);

//echo "<pre>";
//var_dump($products);
//echo "</pre>";

?>

    <div class="main">

    <? foreach ($phone as $model) { ?>

    <div class="card">
            <a href="product.php">
                <img src="img/<? echo $model['img']?>" alt="<? echo $model['model']?>">
            </a>
            <div class="label"><? echo $model['model']?> (<? echo $model['price']?>)</div>
            <button type="submit">Добавить в корзину</button>
        </div>
    <? } ?>


    </div>

</body>
</html>

