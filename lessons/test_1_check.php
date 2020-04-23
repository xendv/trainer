<?php
    session_start();
    require_once("../functions.php");
    $response = array();
    $response['success'] = true;
    $response['not_filled1'] = "";
    $response['not_filled2'] = "";
    $response['not_filled3'] = "";
    $sum=0;
    
    if(empty($_POST['q1'])){
        $response['not_filled1'] = '* Выберите вариант ответа';
        $response['success'] = false;
    } 
    if(empty($_POST['q2'])){
        $response['not_filled2'] = '* Выберите вариант ответа';
        $response['success'] = false;
    } 
    if(empty($_POST['q3'])){
        $response['not_filled3'] = '* Выберите вариант ответа';
        $response['success'] = false;
    } 
   
    //Проверяем наличие ошибок
    if($response['success']){
        //Подключаемся к БД
        include_once ("../config.php");
        //include_once ("bd.php");
        $link = link_to_db("distlearn");
        $sql ="SELECT `id`, `test_answ`, `test_path` FROM `tests` WHERE `test_path` = 'lessons/less_1_test.php'";
        $res =  mysqli_query($link, $sql);
        if(!$sql){
            $response['success'] = false;
        }
        else {
            if(mysqli_num_rows($res) > 0){
                $row = mysqli_fetch_assoc($res);
                $test_id=$row['id'];
                $number = $row['test_answ'];
                $answ_array = array();
                while ($number > 0) {
                    $answ_array[] = $number % 10;
                    $number = intval($number / 10); 
                }
                $answ_array = array_reverse($answ_array);
                if((int)$_POST['q1'] == $answ_array[0]){
                    $sum = $sum + 5;
                }
                if((int)$_POST['q2'] == $answ_array[1]){
                    $sum = $sum + 5;
                }
                if((int)$_POST['q3'] == $answ_array[2]){
                    $sum = $sum + 5;
                }
                
                
                $sql = "SELECT * FROM `test_results` WHERE `user_id` = '". $_SESSION['user_id']."'";
                $res =  mysqli_query($link, $sql);
                if(mysqli_num_rows($res)>0){
                    $sql ="SELECT `score` FROM `test_results` WHERE `user_id`='".$_SESSION['user_id']."' AND `test_id`='".$test_id."'";
                    $res =  mysqli_query($link, $sql);
                    $prev_res=mysqli_fetch_assoc($res)['score'];
                    if(!$sql){
                        $response['success'] = false;
                    }
                    else{
                        if($prev_res < $sum){
                            $sql ="UPDATE `test_results` SET `score`='".$sum."' WHERE `user_id`='".$_SESSION['user_id']."' AND `test_id`='".$test_id."'";
                            $res =  mysqli_query($link, $sql);
                            if(!$sql){
                                $response['success'] = false;
                            }
                            $_SESSION['user_score'] = $_SESSION['user_score'] + $sum - $prev_res;
                        }
                    }
                }
                else{
                        $_SESSION['user_score'] = $_SESSION['user_score'] + $sum;
                        $sql ="INSERT INTO `test_results` (`user_id`, `test_id`, `score`) VALUES ('".$_SESSION['user_id']."','".$test_id."','". $sum."')";
                        $res =  mysqli_query($link, $sql);
                        if(!$sql){
                            $response['success'] = false;
                        }

                }
                $sql ="UPDATE `users` SET `s_score`='".$_SESSION['user_score']."' WHERE `id`='".$_SESSION['user_id']."'";
                        $res =  mysqli_query($link, $sql);
                        if(!$sql){
                            $response['success'] = false;
                        }
                
            }
            else{
                $response['success'] = false;
            }
        }     
    }
    echo json_encode($response);
?>           