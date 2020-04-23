<?php 
    session_start();
    if(!isset($_SESSION['user_login'])){
        header("Location: login.php");
    } 

    if (isset($_GET["0"])) { 
        session_destroy();
        unset($_GET["session_clear"]);
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
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <!-- Styles -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <title>Урок 1 Тест | DistLearn</title>
</head>

<body>  
    <!--header-->
    <div class="header tr-background">
        <nav class="link-to-index h5" ><a href = "main.php" style = 'text-decoration: none'> DistLearn</a></nav>
        <nav class="header_cell">
            <text style="header_cell" >Вы зашли под логином
            <?php echo $_SESSION['user_login']?>
        </text>
        </nav>
        <nav class="header_cell">
        <a class="big_btn" href="../themes_list.php">Мои задания</a>
        </nav>
        <nav class="header_cell">
        <a class="big_btn" href="../main.php">Личный кабинет</a>
        </nav>
        <nav class="header_cell">
            <a class="big_btn" href="../login.php" name = "logout_btn">Выйти</a>
        </nav>
    </div> 
    <!--header-->

    <div class="welcome_block">
        <h1>Тест: Технические и компьютерные термины</h1>  
    </div>
    <div class = "content-block-row flex-direction: column">
        <div class = "content">
        <normal-text>
            <form id="test_1_form" style="table-blue" action="" method="POST">
            
                <div>
                    <table class="table_blue" border="1">
                        <thead>
                            <tr><label>Как расшифорывается DNS? </label></tr>
                        </thead>
                        <tbody>
                            <tr><td> <label><input name="q1" type="radio" value="1"> Domain Name System - система доменных имен </label> </td></tr>
                            <tr><td> <label><input name="q1" type="radio" value="2"> Distant Network Structure - удаленная сетевая структура </label> </td></tr>
                            <tr><td> <label><input name="q1" type="radio" value="3"> Dominant Name System - доминирующая система имен </label></td></tr>
                        </tbody>
                    </table>
                    <p id="not_filled1" class="has-error"></p>
                </div>
                <hr>

                <div>
                    <table class="table_blue" border="1">
                        <thead>
                            <tr><label>Выберите неправильное утверждение о Cookie </label></tr>
                        </thead>
                        <tbody>
                            <tr><td> <label><input name="q2" type="radio" value="1"> Они отправляются веб-сервером </label> </td></tr>
                            <tr><td> <label><input name="q2" type="radio" value="2"> Они никак не связаны с данными пользователя </label></td></tr>
                            <tr><td> <label><input name="q2" type="radio" value="3"> Они хранятся компьютере пользователя </label> </td></tr>
                            
                        </tbody>
                    </table>
                    <p id="not_filled2" class="has-error"></p>
                </div>
                <hr>
                
                <div>
                    <table class="table_blue" border="1">
                        <thead>
                            <tr><label>DPI это..</label></tr>
                        </thead>
                        <tbody>
                            <tr><td> <label><input name="q3" type="radio" value="1"> Обозначение числа в шестнадцатеричной системе счисления </label> </td></tr>
                            <tr><td> <label><input name="q3" type="radio" value="2"> Степень яркости лампочки </label> </td></tr>
                            <tr><td> <label><input name="q3" type="radio" value="3"> Количество точек на дюйм </label> </td></tr>
                        </tbody>
                    </table>
                    <p id="not_filled3" class="has-error"></p>
                </div>
                <hr>

            </form>
            </normal-text>
            <button type="button" class="big_btn" style="margin: 0 auto" id="check_btn" name="Submit" href="#">Отправить на проверку</button>
            <br>
            <script type="text/javascript">
				$(document).on("click","#check_btn",function(e) {
							e.preventDefault();
							//ajax form validation
							$.ajax({
								type: 'post',
								url: 'test_1_check.php',
								dataType: 'html',
								data:$("#test_1_form").serialize(),
								success: function (html) {
									var result = jQuery.parseJSON(html);
									if(result.success){
										document.location.href = "../main.php";
									}else{
										$("#not_filled1").text(result.not_filled1);
										$("#not_filled2").text(result.not_filled2);
										$("#not_filled3").text(result.not_filled3);
									}
								}
							});
						});
			</script>
            <a style="text-align: left" href="less_1_2.php"><<<<<<< Предыдущая страница: Компьютерные термины</a>       
        </div>
     
    </div>

<?php require "../includes/footer.php" ?>
