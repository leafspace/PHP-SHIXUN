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

    require_once 'Classes/MysqlProxy.php';
    $mysqlProxy = new MysqlProxy();
    $mysqlConnect = $mysqlProxy->connect("MYSQL");
    if ($mysqlConnect == null) {
        returnBack();
    }
    $sqlStr = "SELECT * FROM user WHERE username = '".$username."' AND `password` = '".$password."';";
    $result = $mysqlProxy->query($sqlStr);
    
    if ($result === false) {
        returnBack();
    }

    if ($mysqlProxy->getResultNumber($result) > 0) {
        $row = $mysqlProxy->getNext($result);
        session_start();
        $sid = session_id();
        $_SESSION['id'] = $row[0];
        $_SESSION['username'] = $row[1];
        setcookie("id", $row[0], time() + 3600);
        setcookie("username", $row[1], time() + 3600);

        $url = "../auditInfo.php?sid=".$sid;
        Header("Location: $url");
    } else {
        returnBack();
    }
    $mysqlProxy->freeResourse();
?>