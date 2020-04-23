<?php require "includes/header.php"; 
session_start();
if (isset($_GET["session_quit"])) { 
	session_destroy();
	unset($_GET["session_quit"]);
	header("location: index.php");
	exit();
}?>
	<div class="content-wrapper">
        <h1>Система дистанционного обучения студентов
        <br>
       	DistLearn
        </h1> 
    	<div class = "content-box-row tip">
		<div class = "content">
            <h2>Войти в систему</h2> <hr>
			<form id="log_form" action = ""  method="POST" style=""> 
				<table><tr>
				<td>Введите логин (ваша почта):</td>
				<td><input type="text" class="b2" name = "email" size = "20" maxlength = "32" required></td>
				<td><p id="login_error" class="has-error" ></p></td>	
				</tr>
				<tr>
				<td>Введите пароль:</td>
				<td>
				<input type="password" class="b2" name = "passwd" size = "20" maxlength = "32" required></td>
				<td><p id="pass_error" class="has-error" ></p></td>	
				</tr>
				</table> 
				<hr>
				<button type="button" class="big_btn" id="submit_btn" name="Submit" href="main.php">Войти</button>
				
				<a href="index.php" style="text-decoration: none">Назад</a>
			</form>
			<script type="text/javascript">
				$(document).on("click","#submit_btn",function(e) {
							e.preventDefault();
							//ajax form validation
							$.ajax({
								type: 'post',
								url: 'log_ver.php',
								dataType: 'html',
								data:$("#log_form").serialize(),
								success: function (html) {
									var result = jQuery.parseJSON(html);
									if(result.success){
										document.location.href = "main.php";
									}else{
										$("#login_error").text(result.login_error);
										$("#pass_error").text(result.pass_error);
									}
								}
							});
						});
			</script>
			</div>
        </div>
    </div>


<?php require "includes/footer.php" ?>