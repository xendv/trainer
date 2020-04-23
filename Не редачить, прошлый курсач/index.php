<?php session_start();

if (isset($_GET["session_quit"])) { 
    session_destroy();
    unset($_GET["session_quit"]);
    header("Refresh:0; url=?");
}

require "includes/header.php"; 
include "config.php";
?>
    <div class="content-wrapper">
        <h1>Система дистанционного обучения студентов
        <br>
        DistLearn
        </h1> 
        <div class = "tip ">
            <h2>Добро пожаловать в систему для дистанцинной работы студентов<br><br>
            Для входа необходимо зарегистрироваться!</h2> 
            <a class="big_btn" href="registration.php">Регистрация</a>
            <br>
            <text>Если у вас уже есть аккаунт, наймите на кнопку "<a href="login.php">Войти</a>"</text> 
        </div>
    </div>

<?php
require "includes/footer.php" ?>