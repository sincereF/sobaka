<?php session_start(); #СОЗДАЕМ СЕССИЮ
if (isset($_POST['login_Btn'])){
    if($_POST['login'] != null and $_POST['password'] != null){
        try{
            $login = "admin";
            $pass = "admin";
            #$result=mysqli_query($db, $query); #ЗАПУСК ЗАПРОСА
            #$row = mysqli_fetch_array($result); #ПОЛУЧАЕМ МАССИВ С БД

            if ($_POST['login'] == $login and $_POST['password'] == $pass){ #ПАРСИМ МАССИВ С БД 
                header('Location: /admin.php'); #ПЕРЕКИДЫВАЕТ НА СЛЕД СТРАНИЦУ
                #$_SESSION['order_id'] = $row['order_id']; #$row['firstname'] ВЫБИРАЕМ НУЖНЫЕ МОМЕНТЫ В БД [firstname] - НАЗВАНИЕ СТОЛБЦА
                $_SESSION['autorize'] = "true";
            }
            else{
                echo '<html><head><title>Ошибка</title></head><body align="center" style="font-size:30px"><p>Ошибка, неверные данные для входа</p><form method="POST"><button style="font-size:30px; background-color: rgb(197, 223, 85);" name="backbtn">Назад</button></form></body></html>';
            }
        }
        catch (error $ex){
            echo "error connect db".$ex;
        }
    }
    else{
        echo '<html><head><title>Ошибка</title></head><body align="center" style="font-size:30px"><p>Ошибка, вы не ввели данные для входа</p><form method="POST"><button style="font-size:30px; background-color: rgb(197, 223, 85);" name="backbtn">Назад</button></form></body></html>';
    }
}
if (isset($_POST['backbtn'])){
    header('Location: /index.php'); 
}
if (isset($_POST['unlogin_Btn'])){
    session_destroy(); #УНИЧТОЖАЕМ СЕССИЮ
    header('Location: /index.php');
}
?>

