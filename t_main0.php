<?php 
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("Location: login.php");
    } elseif ($_SESSION["user_group_id"]=="3") {
        header("Location: main.php");
    }
    if (isset($_GET["session_quit"])) { 
        session_destroy();
        unset($_GET["session_quit"]);
        header("location: index.php");
        exit();
    }
    require_once("functions.php");
?>

<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS  
    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <title>Главная|DistLearn</title>
</head>

<body vlink="rgb(57, 195, 219)" alink="rgb(57, 195, 219)">
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


<div class = "content-wrapper2">
<div class = "content-block">
    <div class = "content ">
        <h1>Личный кабинет 
        <?php if($_SESSION["user_group_id"]=="1")echo 'администратора</h1>';
        else echo 'преподавателя</h1>';
        ?>
    </div>
    
            <div class = "content">
                <h4>Данные и прогресс обучающихся</h4>
                <hr>
                <?php
                    echo '<table class="table_blue" border="1">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Фамилия</th>';
                    echo '<th>Имя</th>';
                    echo '<th>Отчество</th>';
                    echo '<th>Логин</th>';
                    echo '<th>Итоговый балл</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody><normal-text>';
                    $link = link_to_db("distlearn");
                    $sql = "SELECT * FROM `users` WHERE `group_id`=3";
                    $result = mysqli_query($link, $sql);
                    // выводим в HTML-таблицу данные из таблицы MySQL
                    while($data = mysqli_fetch_array($result)){ 
                        echo '<tr>';
                        echo '<td>'.$data['family_name'].'</td>';
                        echo '<td>'. $data['first_name'].'</td>';
                        echo '<td>'.$data['middle_name'].'</td>';
                        echo '<td>'.$data['login'].'</td>';
                        echo '<td>'.$data['s_score'].'</td>';
                        echo '</tr>';
                    }
                    echo '<normal-text></tbody>';
                    echo '</table>';
                    
                ?>    
            </div>
            <div class = "content">
            <h4 style="text-align: center">Добавить ученика</h4>
            <hr>
            <form  id="reg_form" action="" method="POST" style=""> 
                <table>
                    <tr>
                        <td><label>Электронная почта:</label></td>
                        <td><input type="text" class="b2" name = "login" size = "32" maxlength = "32" required></td>
                        <td><p id="login_error" class="has-error" ></p></td>
                    </tr>
                    <tr>
                        <td><label>Пароль:</label></td>
                        <td><input type="password" class="b2" name = "pass" size = "32" maxlength = "15" required></td>
                        <td><p id="pass_error" class="has-error" ></p></td>
                    </tr>
                    <tr>
                        <td><label>Подтвердите пароль:</label></td>
                        <td><input type="password" class="b2" name = "pass2" size = "32" maxlength = "32" required></td>
                        <td><p id="pass2_error" class="has-error" ></p></td>
                    </tr>
                    <tr>
                        <td><label>Фамилия:</label></td>
                        <td><input type="text" class="b2" name = "f_name" size = "32" maxlength = "32" required></td>
                        <td><p id="f_name_error" class="has-error" ></p></td>
                    </tr>
                    <tr>
                        <td><label>Имя:</label></td>
                        <td><input type="text" class="b2" name = "name" size = "32" maxlength = "32" required></td>
                        <td><p id="name_error" class="has-error" ></p></td>
                    </tr>
                    <tr>
                        <td><label>Отчество:</label></td>
                        <td><input type="text" class="b2" name = "m_name" size = "32" maxlength = "32" required></td>
                        <td><p id="m_name_error" class="has-error" ></p></td>
                    </tr>
                </table>
                <?php 
                    if($_SESSION["user_group_id"]=="1"){
                        echo '<input type="checkbox" name="make_t">Сделать учителем</input>';
                    }
                ?>
                <hr> 
                <input type="submit" class="big_btn" style="margin: 0 auto" id="add_btn" name="Submit" value="Зарегистрировать ученика" href="#" >
            </form>
            <script type="text/javascript">
                $(document).on("click","#add_btn",function(e) {
                    e.preventDefault();
                    //ajax form validation
                    $.ajax({
                        type: 'post',
                        url: 'reg_ver.php',
                        dataType: 'html',
                        data:$("#reg_form").serialize(),
                        success: function (html) {
                            var result = jQuery.parseJSON(html);
                            if(result.success){
                                document.location.href = "t_main.php";
                            }else{
                                $("#login_error").text(result.login_error);
                                $("#pass_error").text(result.pass_error);
                                $("#pass2_error").text(result.pass2_error);
                                $("#f_name_error").text(result.f_name_error);
                                $("#name_error").text(result.name_error);
                                $("#m_name_error").text(result.m_name_error);
                            }
                        }
                    });
                });
            </script>
        </div>

        <div class = "content">
            <h4 style="text-align: center">Удалить пользователя</h4>
            <hr>
            <form  id="del_form" action="" method="POST" style=""> 
                <table>
                    <tr>
                        <td><label>Электронная почта:</label></td>
                        <td><input type="text" class="b2" name = "del_login" size = "32" maxlength = "32" required></td>
                        <td><p id="del_login_error" class="has-error" ></p></td>
                    </tr>
                </table>
                <hr> 
                <input type="submit" class="big_btn" style="margin: 0 auto" id="del_btn" name="Submit" value="Удалить" href="#" >
            </form>
            <script type="text/javascript">
                $(document).on("click","#del_btn",function(e) {
                    e.preventDefault();
                    //ajax form validation
                    $.ajax({
                        type: 'post',
                        url: 'del_ver.php',
                        dataType: 'html',
                        data:$("#del_form").serialize(),
                        success: function (html) {
                            var result = jQuery.parseJSON(html);
                            if(result.success){
                               document.location.href = "t_main.php";
                            }else{
                                $("#del_login_error").text(result.del_login_error);
                            }
                        }
                    });
                });
            </script>
        </div>
         </div>
    <?php
    if($_SESSION["user_group_id"]=="1"){
        echo '<div class = "content-block">';
        echo '<div class = "content">';
        echo '<h4>Данные преподавателей</h4>';
        echo '<hr>';
        echo '<table class="table_blue" border="1">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Фамилия</th>';
                    echo '<th>Имя</th>';
                    echo '<th>Отчество</th>';
                    echo '<th>Логин</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody><normal-text>';
                    $link = link_to_db("distlearn");
        $sql = "SELECT * FROM `users` WHERE `group_id`=2";
        $result = mysqli_query($link, $sql);
        while($data = mysqli_fetch_array($result)){ 
            echo '<tr>';
            echo '<td>'.$data['family_name'].'</td>';
            echo '<td>'. $data['first_name'].'</td>';
            echo '<td>'.$data['middle_name'].'</td>';
            echo '<td>'.$data['login'].'</td>';
            echo '</tr>';
        }
        echo '<normal-text></tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
    }
    ?>
    <div class = "content-block">
        <div class = "content min-width: 70%">
            <h4>Данные текущего пользователя</h4>
            <hr>
            <text class="table_s" >
            <table  class="table_blue">
                <tr><td>Логин:</td> <td><?php echo $_SESSION['user_login']?></td></tr>
                <tr><td>Фамилия: </td> <td><?php echo $_SESSION['user_f_name']?></td></tr>
                <tr><td>Имя:  </td> <td><?php echo $_SESSION['user_name']?></td></tr>
                <tr><td>Отчество: </td> <td> <?php echo $_SESSION['user_m_name']?></td></tr>
            </table>   
            </text>
        </div>
    </div>

    <div class = "content-block">
        <div class = "content">
            <h4 style="text-align: center">Сменить настройки текущего пользователя</h4>
            <hr>
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
                <input type="submit" class="big_btn" style="margin: 0 auto"  name="change_pass"  value="Сменить пароль" href="#">
            </form> 
        </div>
    </div>
</div>
<?php require "includes/footer.php" ?>