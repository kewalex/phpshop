<?php

require_once '/parts/header.php';

if (isset ($_GET['category'])) {
    $currentCat=$_GET['category'];
    $phone=$connect->query("SELECT * FROM phone WHERE category='$currentCat'") //запрос в БД (query) и выгрузка массива в переменную (phone)
    ->fetchAll(PDO::FETCH_ASSOC); //перевод массива в удобочитаемый вид (fetchAll)

    if (!$phone) {
        die("Такой категории не существует!"); // Эквивалент функции exit - прекращает выполнение скрипта
    }
} else {
    $phone=$connect->query("SELECT * FROM phone")
    ->fetchAll(PDO::FETCH_ASSOC);
}

?>

<div class="main">

<?

foreach ($phone as $product) {

?>

<div class="card">
    <a href="product.php?product=<? echo $product['model'] ?>">
        <img src="img/<? echo $product['img']?>" alt="<? echo $product['model']?>">
    </a>
    <div class="label"><? echo $product['model']?> (<? echo $product['price']?>)</div>
    <? require 'parts/addToCart.php'?>
</div>

<?

}

?>

</div>


</body>
</html>

