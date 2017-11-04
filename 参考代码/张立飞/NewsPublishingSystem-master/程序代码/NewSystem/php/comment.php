<?php
    if (!isset($_POST['newsID']) || !isset($_POST['comment-textarea'])) {
        $url = "../index.php";
        Header("Location: $url"); 
    }
    
    $username = $_POST['username'];
    if ($username == "") {
        $username = "无差别在线新闻网-游客";
    }
    require_once 'Classes/MysqlConnect.php';
    $mysql_Connect = new MysqlConnect();
    $mysqli = $mysql_Connect->connect();
    $sqlStr = "INSERT INTO chat VALUES(".$_POST['newsID'].", '".$_POST['comment-textarea']."', '".date("Y-m-d H:i:s")."', '".$username."');";
    $result = $mysql_Connect->query($mysqli, $sqlStr);
    $mysql_Connect->freeresourse($mysqli);

    $url = "../newsInfo.php?newsID=".$_POST['newsID'];
    Header("Location: $url"); 
?>