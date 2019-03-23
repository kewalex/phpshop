<?php

session_start(); //стартуем сессию

require_once '../db/db.php'; //подключаем базу данных

if (isset($_POST['id'])) { //если в POST передались данные, то
    if(isset($_SESSION['order'])) {
        unset($_SESSION['order']);
    }

    $id=$_POST['id'];
    $product=$connect->query("SELECT * FROM phone WHERE id='$id'") //берем из БД данные элемента с id=$id
    ->fetch(PDO::FETCH_ASSOC);

    if (isset ($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$id]=[
            'model'=>$product['model'],
            'price'=>$product['price'],
            'rus_name'=>$product['rus_name'],
            'img'=>$product['img'],
            'quantity'=>1,
        ];
    }

    $_SESSION['totalQuantity']=$_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] +=1 : 1; //если сессия существует, то прибавляем 1 к количеству товаров в корзине
    $_SESSION['totalPrice']=$_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $product['price'] : $product['price']; //если общая цена в сессии есть, то прибавляем цену добавляемого в корзину товара

}

header('Location: ' . $_SERVER['HTTP_REFERER']); //переход на предыдущую страницу