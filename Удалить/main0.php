<?php 
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("Location: login.php");
    } elseif ($_SESSION["user_group_id"]!="3") {
        header("Location: t_main.php");
    }
    //elseif ($_SESSION["user_group_id"]=="1") {
      //  header("Location: index.php");
    //}
    if (isset($_GET["session_quit"])) { 
        session_destroy();
        unset($_GET["session_quit"]);
        unset($_SESSION);
        header("location: index.php");
        exit();
    }
?>

<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> 

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">

    <title>Главная|DistLearn</title>
</head>

<body>
<div class="header tr-background">
        <nav class="link-to-index h5" ><a href = "main.php" style = 'text-decoration: none'> DistLearn</a></nav>
        <nav class="header_cell">
            <text style="header_cell" >Вы зашли под логином
            <?php echo $_SESSION['user_login']?>
        </text>
        </nav>
        <nav class="header_cell">
        <a class="big_btn" href="themes_list.php">Мои задания</a>
        </nav>
        <nav class="header_cell">
        <a class="big_btn" href="main.php">Личный кабинет</a>
        </nav>
        <nav class="header_cell">
            <a class="big_btn" href="login.php?session_quit=1" name = "logout_btn">Выйти</a>
        </nav>
</div> 

        <div class = "content"><h1>Личный кабинет обучающегося</h1>  
        </div>
        <div class = "content-wrapper flex-wrap: wrap">
        <div class = "content-block-row">
                <div class = "content">
                    <text style="text-align: center">Для перехода к доступным заданиям
                        нажмите на кнопку "Мои задания"<br>
                    </text>
                    <hr>
                    <h3>
                        Текущий балл: <?php echo $_SESSION['user_score']?>
                    </h3>
                </div>
            </div>
        <div class="content-row  flex-wrap: wrap">

            <div class = "content-block-row">
                <div class = "content">
                    <h4>Данные и прогресс обучающегося</h4>
                    <hr>
                    <text class="table_s" >
                    <table class="table_blue">
                        <tr><td>Логин:</td> <td><?php echo $_SESSION['user_login']?></td></tr>
                        <tr><td>Фамилия: </td> <td><?php echo $_SESSION['user_f_name']?></td></tr>
                        <tr><td>Имя:  </td> <td><?php echo $_SESSION['user_name']?></td></tr>
                        <tr><td>Отчество: </td> <td> <?php echo $_SESSION['user_m_name']?></td></tr>
                        <tr><td>Текущий балл: </td> <td><?php echo $_SESSION['user_score']?></td></tr>
                    </table>
                        
                    </text>
                </div>
            </div>

            <div class = "content-block-row">
                <div class = "content">
                    <h4 style="text-align: center">Сменить настройки пользователя</h4><hr>
                    <form  action="change_pass_ver.php" method="POST" style=""> 
                        <table><tr>
                            <td>Текущий пароль:</td>
                            <td><input type="password" class="b2" name = "curr_pass" size = "32" maxlength = "32" required></td></tr>
                            <tr><td>Новый пароль:</td>
                            <td><input type="password" class="b2" name = "new_pass" size = "32" maxlength = "32" required></td></tr>
                            <tr><td>Подтвердите новый пароль:</td>
                            <td><input type="password" class="b2" name = "new_pass2" size = "32" maxlength = "32" required></td></tr>
                        </table> 
                        <hr>
                        <input type="submit" class="big_btn" name="change_pass"  value="Сменить пароль" href="#">
                    </form> 
                </div>
            </div>
        </div>
        </div>
   
<?php require "includes/footer.php" ?>