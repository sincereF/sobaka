<?php require_once('scripts/code.php')?>
<html>
    <link rel="shortcut icon" href="/images/logo.ico">
    <center><img src="/images/logo.ico" height="190px"></img></center>
    <head><link rel="stylesheet" href="styles/styles.css"><title>Личный кабинет</title></head>
    <body align="center">
        <h2>Личный кабинет</h2>
        <form method="POST" >
            <button id = "unlogin" name="unlogin_Btn" type="sumbit" value="Выход">Выйти</button>
        </form>
    </body> 
</html>

<?php
    if($_SESSION["autorize"] == "true"){

        $db = mysqli_connect('localhost', 'root', 'root', 'sardov_demo_web');
        $query = ('SELECT * FROM orders');
        $result = mysqli_query($db, $query);

        echo "<link rel='stylesheet' href='styles/styles.css'>";
        echo '<h2 id = "table">Заказы</h2>';
        echo '<table border="1" align ="center">';
        echo '<tr>';
        echo '<td id = "tdAdmin">ID</td>';
        echo '<td id = "tdAdmin">Номер заказа</td>';
        echo '<td id = "tdAdmin">Дата создания</td>';
        echo '<td id = "tdAdmin">Код клиента</td>';
        echo '<td id = "tdAdmin">Услуги</td>';
        echo '<td id = "tdAdmin">Статус</td>';
        echo '<td id = "tdAdmin">Дата закрытия</td>';
        echo '<td id = "tdAdmin">Код сотрудника</td>';
        echo '<td id = "tdAdmin">Затраченное время</td>';
        echo '</tr>';
        foreach ($result as $order){
            echo '<tr>';
            echo '<td id = "tdBD">'. $order['id_orders'] .'</td>';
            echo '<td id = "tdBD">'. $order['number_order'] .'</td>';
            echo '<td id = "tdBD">'. $order['date_of_creation'] .'</td>';
            echo '<td id = "tdBD">'. $order['code_client'] .'</td>';
            echo '<td id = "tdBD">'. $order['services'] .'</td>';
            echo '<td id = "tdBD">'. $order['status_order'] .'</td>';
            echo '<td id = "tdBD">'. $order['date_closing'] .'</td>';
            echo '<td id = "tdBD">'. $order['code_employee'] .'</td>';
            echo '<td id = "tdBD">'. $order['completion_time_order'] .'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    else{
        header("Location: /index.php");
    } 
?>