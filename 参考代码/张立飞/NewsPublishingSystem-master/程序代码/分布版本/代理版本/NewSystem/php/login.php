<?php
    function returnBack() {
        $url = "../index.php";
        Header("Location: $url"); 
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    } else {
        returnBack();
    }

    require_once 'Classes/MysqlConnect.php';
    $mysql_Connect = new MysqlConnect();
    $mysqli = $mysql_Connect->connect();
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        returnBack();
    }
    $sqlStr = "SELECT * FROM user WHERE username = '".$username."' AND `password` = '".$password."';";
    $result = $mysql_Connect->query($mysqli, $sqlStr);
    
    if ($result === false) {
        echo $mysqli->error;
        returnBack();
    }

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        session_start();
        $sid = @session_id();
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        $url = "../auditInfo.php?sid=".$sid;
        Header("Location: $url"); 
    } else {
        returnBack();
    }
    $mysql_Connect->freeresourse($mysqli);
?>