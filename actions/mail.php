<?php

session_start();

require_once '../db/db.php';

if (isset($_POST['order'])) {
    $username=htmlspecialchars($_POST['username']);
    $phone=htmlspecialchars($_POST['phone']);
    $email=htmlspecialchars($_POST['email']);


    $connect->query("INSERT INTO `order` (username, phone, email) VALUES ('$username', '$phone', '$email')");

    $lastId=$connect->query("SELECT MAX(id) FROM `order` WHERE email='$email'")
    ->fetch(PDO::FETCH_ASSOC);
    $lastId=$lastId['MAX(id)'];

    $message="<h2>Здравствуйте! Ваш заказ под номером - [$lastId] принят!</h2>";
    $message.="<h3>Состав заказа:</h3><hr>";

    foreach ($_SESSION['cart'] as $product) {
        $message.="<div>{$product['model']} - <b>{$product['quantity']}</b> шт.</div>";
    }

    $message.="<hr><p>Сумма заказа: <b>{$_SESSION['totalPrice']}</b> рублей.</p>";

    $headers='MIME-Version: 1.0' . "\r\n";
    $headers.='Content-type: text/html; charset=utf-8' . "\r\n"; // Для отправки HTML в письме должен быть установлен заголовок Content-type

    $subject="Ваш заказ под номером - [$lastId] принят!";

    mail($email, $subject, $message, $headers);

    unset($_SESSION['totalPrice']); //удаление из сессии общей цены
    unset($_SESSION['totalQuantity']); //удаление из сессии общего колличества
    unset($_SESSION['cart']); //очистка корзины

    $_SESSION['order']=$lastId; //номер заказа
}

header("Location: {$_SERVER['HTTP_REFERER']}");