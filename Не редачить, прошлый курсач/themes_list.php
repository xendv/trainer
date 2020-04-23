<?php 
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("Location: login.php");
    } 
    if (isset($_GET["session_clear"])) { 
        session_destroy();
        unset($_GET["session_clear"]);
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> 

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">

    <title>Мои задания | DistLearn</title>
</head>

<body>
<div class="header tr-background">
        <nav class="link-to-index h5" ><a href = "index.php" style = 'text-decoration: none'> DistLearn</a></nav>
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
            <a class="big_btn" href="login.php" name = "logout_btn">Выйти</a>
        </nav>
</div> 
<div class="content-wrapper">

        <div class = "content"><h1>Мои задания</h1>  
        </div>
        <div class = "content-block">
                <div class = "content">
                    <?php
                        echo '<table class="table_blue" border="1">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>Тема</th>';
                        echo '<th>Подтема</th>';
                        echo '<th>Тест</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        $link = link_to_db("distlearn");
                        $sql = "SELECT * FROM `lessons`";
                        $result = mysqli_query($link, $sql);
                        // выводим в HTML-таблицу данные из таблицы MySQL
                       while($data = mysqli_fetch_array($result)){ 
                         echo '<tr>';
                         echo '<td>' . $data['theme'] . '</td>';
                         echo '<td><a href = "'.$data['path'].'">'  . $data['title'] . '</a></td>';
                         echo '<td><a href = "'.$data['test_link'].'">' . 'Тест по теме: '.$data['theme'] . '</td>';
                         echo '</tr>';
                       }
                         echo '</tbody>';
                       echo '</table>';
                    ?>
                </div>
        </div>
</div>
   
<?php require "includes/footer.php" ?>