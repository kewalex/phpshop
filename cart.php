<?php

require_once '/parts/header.php';

if (isset($_SESSION['order'])) {

?>

<h2 class="cart-title">Ваш заказ под номером - <? echo $_SESSION['order']?> принят!</h2>
<a href="index.php" class="back">На главную</a>

<?

unset($_SESSION['order']); } //удаление из сессии инфо с обработанным заказом

else if (count($_SESSION['cart'])==0) { //если корзина пуста, то

?>

<h2 class="cart-title">Ваша корзина пуста =(</h2>
<a href="index.php" class="back">На главную</a>

<?

} else {

    foreach ($_SESSION['cart'] as $key=>$product) {
?>

<div class="cart">
    <a href="product.php?product=<? echo $product['model'] ?>">
    <img src="img/<? echo $product['img']?>" alt="<? echo $product['rus_name']?>">
    </a>
        <div class="cart-descr">
            <? echo $product['model']?> в количестве <? echo $product['quantity']?> шт на сумму <? echo $product['quantity']*$product['price']?> рублей
        </div>
    <form action="actions/delete.php" method="post">
        <input type="hidden" name="delete" value="<? echo $key?>">
        <input type="submit" value="Удалить">
    </form>
</div>

<?

}

?>

<hr>

<form action="actions/mail.php" method="post" class="order">
    <input type="text" name="username" required placeholder="Ваше имя"></input>
    <input type="text" name="phone" required placeholder="Ваш номер телефона""></input>
    <input type="email" name="email" required placeholder="Ваш эл. почта"></input>
    <input type="submit" name="order" value="Отправить заказ"></input>
</form>

<?

}

?>

<hr>

</body>
</html>

