<?php

require_once '/parts/header.php';

//session_destroy(); //удаляем сессию

if (isset ($_GET['category'])) {
    $currentCat=$_GET['category'];
    $phone=$connect->query("SELECT * FROM phone WHERE category='$currentCat'");
    $phone=$phone->fetchAll(PDO::FETCH_ASSOC);
} else {
    $phone=$connect->query("SELECT * FROM phone");
    $phone=$phone->fetchAll(PDO::FETCH_ASSOC);
}

?>

    <div class="main">

    <? foreach ($phone as $model) { ?>

    <div class="card">
            <a href="product.php?product=<? echo $model['model'] ?>">
                <img src="img/<? echo $model['img']?>" alt="<? echo $model['model']?>">
            </a>
            <div class="label"><? echo $model['model']?> (<? echo $model['price']?>)</div>
        <form action="actions/add.php" method="post">
            <input type="hidden" name="id" value="<? echo $model['id']?>">
            <input type="submit" value="Добавить в корзину">

        </form>
        </div>
    <? } ?>
    </div>


</body>
</html>

