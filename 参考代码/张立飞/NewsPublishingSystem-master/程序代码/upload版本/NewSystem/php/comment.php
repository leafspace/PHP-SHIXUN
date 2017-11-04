<?php
    header("Content-type: text/html; charset=gbk"); #设置类型转换
    if (!isset($_POST['newsID']) || !isset($_POST['comment-textarea'])) {
        $url = "../index.php";
        Header("Location: $url"); 
    }
    
    $username = $_POST['username'];
    if ($username == "") {
                $username = iconv('utf-8', 'gbk', "无差别在线新闻网-游客");
    }
    require_once 'Classes/MysqlProxy.php';
    $mysqlProxy = new MysqlProxy();
    $mysqlConnect = $mysqlProxy->connect("MYSQL");
    $sqlStr = "INSERT INTO chat VALUES(".$_POST['newsID'].", '".$_POST['comment-textarea']."', '".date("Y-m-d H:i:s")."', '".$username."');";
    $result = $mysqlProxy->query($sqlStr);
    $mysqlProxy->freeResourse();

    $url = "../newsInfo.php?newsID=".$_POST['newsID'];
    Header("Location: $url"); 
?>