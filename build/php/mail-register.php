<?php

/* Сюда впишите свою эл. почту */
$address = "sales.novachats@gmail.com";

/* Тема письма*/
$sub = "Новый пользователь на сайте $nameSite"; 

/*адрес сайта*/
$nameSite = "reg-novachats@com";

/*Получаем данные*/
if (isset($_POST['company']) && !empty($_POST['company']) ) {
    $message  .= "Название организации: ".$_POST['company'];
}
if (isset($_POST['email']) && !empty($_POST['email']) ) {
    $message  .= "\nE-mail: ".$_POST['email'];
}
if (isset($_POST['phone']) && !empty($_POST['phone']) ) {
    $message  .= "\nТелефон: ".$_POST['phone'];
}

/*Заголовки*/
$header = "Content-type:text/plain; charset = utf-8\r\nFrom:$nameSite";

/* А эта функция как раз занимается отправкой письма на указанный вами email */
mail ($address,$sub,$message,$header);
?>