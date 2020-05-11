<?php
    session_start();
    include_once("../functions.php");
    $response = array();
    $response['success'] = true;
    $response['error'] = "";
    $response['result'] = 0;
    
    if((!isset($_POST['id']) || empty($_POST['id']))){
        $response['error'] .= '* Test id exception. No id set';
        $response['success'] = false;
    } else {
        $test_id = filtered_input($_POST['id']);
    }
    
    if($response['success']){
        $link = link_to_db("nnka_db");
        $sql = "SELECT * FROM TestData WHERE PARENT_ID='".$test_id."'";
        $res =  mysqli_query($link, $sql);
        if(!$res){
            $response['success'] = false;
            $response['error'] .= " SQL TestData response failure!";
        } else if (mysqli_num_rows($res) > 0){
            $tasks_completed = 0;
            while ($task = mysqli_fetch_assoc($res)){
                if (isset($_POST[$task['ID']])){
                    if($_POST[$task['ID']] == $task['CORRECT_ANSWER']) {
                        $tasks_completed++;
                    }
                }
            }
            
            // compute result
            $result = intval($tasks_completed/mysqli_num_rows($res)*100);
            $response['result'] = $result;
            
            //update result in database
            /*
            $link = link_to_db("distlearn");
            $sql = "SELECT * FROM `test_results` WHERE `user_id` = '". $_SESSION['user_id']."'";
            $res =  mysqli_query($link, $sql);
            if(mysqli_num_rows($res)>0){
                $sql ="SELECT `score` FROM `test_results` WHERE `user_id`='".$_SESSION['user_id']."' AND `test_id`='".$test_id."'";
                $res =  mysqli_query($link, $sql);
                $prev_res=mysqli_fetch_assoc($res)['score'];
                if(!$res){
                    $response['success'] = false;
                    $response['error'] .= " SQL get test result failure!";
                } else{
                    if($prev_res < $sum){
                        $sql ="UPDATE `test_results` SET `score`='".$sum."' WHERE `user_id`='".$_SESSION['user_id']."' AND `test_id`='".$test_id."'";
                        $res =  mysqli_query($link, $sql);
                        if(!$res){
                            $response['success'] = false;
                            $response['error'] .= " SQL update test result failure!";
                        }
                        $_SESSION['user_score'] = $_SESSION['user_score'] + $sum - $prev_res;
                        }
                    }
                } else {
                    $_SESSION['user_score'] = $_SESSION['user_score'] + $sum;
                    $sql ="INSERT INTO `test_results` (`user_id`, `test_id`, `score`) VALUES ('".$_SESSION['user_id']."','".$test_id."','". $sum."')";
                    $res =  mysqli_query($link, $sql);
                    if(!$res){
                        $response['success'] = false;
                        $response['error'] .= " SQL test results insertion failure!";
                    }
                }
                $sql ="UPDATE `users` SET `s_score`='".$_SESSION['user_score']."' WHERE `id`='".$_SESSION['user_id']."'";
                $res =  mysqli_query($link, $sql);
                    if(!$res){
                        $response['success'] = false;
                        $response['error'] .= " SQL update user score failure!";
                    }
            */        
        } else {
            $response['success'] = false;
            $response['error'] .= " SQL TestData numbering faillure!";
        }
    }
    echo json_encode($response);
?>           