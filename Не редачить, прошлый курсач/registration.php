<?php require "includes/header.php" ?>
	<div class="content-wrapper">
        <h1>Система дистанционного обучения студентов
        <br>
       	DistLearn
        </h1> 
        
    	<div class = "tip">
            <h2>Форма для регистрации</h2> 
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
				<hr> 
				<button type="button" class="big_btn" id="submit_btn" name="Submit" href="#">Зарегистрироваться</button>
				<a style="text-decoration: none" href="index.php">Назад</a>
			</form>
			<script type="text/javascript">
				$(document).on("click","#submit_btn",function(e) {
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
										document.location.href = "main.php";
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
		
    </div>



<?php require "includes/footer.php" ?>