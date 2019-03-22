<?php
session_start(); //стартуем сессию
require_once '../db/db.php'; //подключаем базу данных

//unset($_SESSION['totalPrice']); //удаление переменной из сессии
//unset($_SESSION['totalQuantity']);

if (isset($_POST['id'])) { //если в POST передались данные, то
    $id=$_POST['id'];
    $model=$connect->query("SELECT * FROM phone WHERE id='$id'"); //берем из БД данные элемента с id=$id
    $model=$model->fetch(PDO::FETCH_ASSOC);

    if (isset ($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$id]=[
            'model'=>$model['model'],
            'price'=>$model['price'],
            'rus_name'=>$model['rus_name'],
            'img'=>$model['img'],
            'quantity'=>1,
        ];
    }

    $_SESSION['totalQuantity']=$_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] +=1 : 1; //если сессия существует, то прибавляем 1 к количеству товаров в корзине
    $_SESSION['totalPrice']=$_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $model['price'] : $model['price']; //если общая цена в сессии есть, то прибавляем цену добавляемого в корзину товара

}

header('Location: ' . $_SERVER['HTTP_REFERER']); //переход на предыдущую страницу