<?php
session_start();
    //Подключаем код с функциями
    require_once("functions.php");

    $err=''; 
    if(empty($_POST['curr_pass']) )
        $err = $err.'Поле Пароль не может быть пустым!<br/>';

    if(empty($_POST['new_pass']))
        $err = $err.'Поле Пароль не может быть пустым!<br/>';

    if(empty($_POST['new_pass2']))
        $err = $err.'Поле Пароль не может быть пустым!<br/>';

    if(!empty($err))
        echo ($err);
    else{
        include_once ("config.php");
        //Подключаемся к БД users
        $link = link_to_db("distlearn");
        /*Создаем запрос на выборку из базы 
        данных для проверки подлиности пользователя*/
        $sql = "SELECT `login`,`password` FROM `users` WHERE `login` = '". $_SESSION['user_login'] ."'";
        $res = mysqli_query($link, $sql);               
        //Если логин совпадает, проверяем пароль
        if(mysqli_num_rows($res) > 0){
            //Получаем данные из таблицы
            $row = mysqli_fetch_assoc($res);
            //print_r($row);

            if(md5($_POST['curr_pass']) != $row['password'])
                $err = $err.'Введен неправильный пароль!<br/>';
            if(!empty($err))
                echo ($err);
            else{        
                //Проверка данных
    
                if(empty(filtered_input($_POST['new_pass'])))
                    $err = $err.'В целях безопасности Пароль не может состоять из одних пробелов!<br/>';

                if(empty($_POST['new_pass2']))
                    $err = $err.'Поле Подтверждения пароля не может быть пустым!<br/>';
            
                //Проверяем наличие ошибок и выводим пользователю
                if(!empty($err))
                    echo ($err);
                else{
                    /*Продолжаем проверять введеные данные
                    Проверяем на совподение пароли*/
                    if($_POST['new_pass'] != $_POST['new_pass2'])
                        $err = 'Пароли не совпадают';

                    //Проверяем наличие ошибок и выводим пользователю
                    if(!empty($err))
                        echo ($err);
                    else{
                        //Хешируем пароль
                        $pass = md5($_POST['new_pass']);

                        //Вносим данные в БД users
                        $sql ="UPDATE `users` SET `password`='".$pass."' WHERE `login`='".$_SESSION['user_login']."'";
                        $res =  mysqli_query($link, $sql);
                            
                        if($sql)
                            //header('Location:'. 'main.php') 
                            echo "Пароль успешно изменен!";          
                        else{
                            echo "Не удалось поменять пароль!";
                            //header('Location:'. 'main.php');
                        }
                    }
                }
            }
        }
        else echo "Пользователь  не найден!";
    }
?>           