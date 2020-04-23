<?php
 /**
 * Подключение к базе данных
 */
require_once("conf.php");
 
 //Соединение с БД MySQL
 $link = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die("Не удалось подключиться!");
 if (!$link) { 
    echo "Ошибка подключения к базе данных. Код ошибки: ".mysqli_connect_error(); 
    exit; 
 } 
 mysqli_set_charset ($link , 'utf8');
?>