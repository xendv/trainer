<?php
    session_start();
    require_once("functions.php");
    $response = array();
    $response['success'] = true;
    $response['pass_error'] = "";
    $response['login_error'] = "";
    $c_login = filtered_input($_POST['email']);

    if(empty($_POST['email']))
    {
        $response['login_error'] = '* Не введен Логин';
        $response['success'] = false;
    } 
               
    if(empty($_POST['passwd'])){
        $response['pass_error'] = '* Не введен Пароль';
        $response['success'] = false;
    }    
     //Проверяем наличие ошибок
     if($response['success']){
        include_once ("config.php");
        //Подключаемся к БД users
        $link = link_to_db("distlearn");
        /*Создаем запрос на выборку из базы 
        данных для проверки подлиности пользователя*/
        $sql = "SELECT * FROM `users` WHERE `login` = '". $_POST['email'] ."'";
        $res = mysqli_query($link, $sql);
        if(mysqli_num_rows($res)<=0){
            $response['login_error'] = '* Логин: '. $c_login .' не найден!';
            $response['success'] = false;
        }
        else{
            //Если логин совпадает, проверяем пароль
            if(mysqli_num_rows($res) > 0){
                //Получаем данные из таблицы
                $row = mysqli_fetch_assoc($res);

                if(md5($_POST['passwd']) == $row['password']){	        
                    session_destroy();
                    session_id($row['id']);
                    session_start();
                    $_SESSION['user_group_id']=$row['group_id'];
                    $_SESSION['user'] = true;
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_login']=$row['login'];
                    $_SESSION['user_f_name']=$row['family_name'];
                    $_SESSION['user_name']=$row['first_name'];
                    $_SESSION['user_m_name']=$row['middle_name'];
                    $_SESSION['user_group_id']=$row['group_id'];
                    $sum=0;
                    //Если это студент, находим его результаты
                    if ($_SESSION['user_group_id'] == "3"){
                        //Пытаемся найти записи о результатах пользователя
                        $sql = "SELECT * FROM `test_results` WHERE `user_id` = '". $_SESSION['user_id'] ."'";
                        $res = mysqli_query($link, $sql);
                        
                        if(mysqli_num_rows($res) > 0){
                            //Если записи есть, суммируем все результаты
                            $sql="SELECT SUM(score) AS us_sum FROM `test_results` WHERE `user_id` = '". $_SESSION['user_id'] ."'";
                            $res = mysqli_query($link, $sql);
                            
                            if(mysqli_num_rows($res) > 0){
                                $row = mysqli_fetch_assoc($res); 
                                $sum = $row['us_sum'];
                                $_SESSION['user_score'] = $sum;
                    
                                
                                $res = mysqli_query($link, $sql);
                                $sql ="UPDATE `users` SET `s_score`='".$sum."' WHERE `login`='".$_SESSION['user_login']."'";
                                $res =  mysqli_query($link, $sql);
                                //header('Location: '.'main.php');
                                //exit;
                            }
                        }
                        else{
                            $_SESSION['user_score'] = 0;
                            $sql ="UPDATE `users` SET `s_score`= '".$_SESSION['user_score']."' WHERE `login`='".$_SESSION['user_login']."'";
                            $res =  mysqli_query($link, $sql);
                        }
                    }
                }
                else{
                    $response['pass_error'] = '* Неверный пароль!';
                    $response['success'] = false;
                }
            }
        }
    }

    echo json_encode($response);
        
?>