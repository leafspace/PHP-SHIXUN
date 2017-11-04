<?php
    function returnBack($sid) {
        $url = "../auditInfo.php?sid=".$sid;
        Header("Location: $url"); 
    }

    echo "hello world";
    @session_id($_POST['sid']);
    @session_start();
    $sid = @session_id();

    require_once 'Classes/MysqlProxy.php';
    $mysqlProxy = new MysqlProxy();
    $mysqlConnect = $mysqlProxy->connect("MYSQL");
    if (mysqli_connect_error()) {
        returnBack();
        exit;
    }

    $choiceList = $_POST['choice'];
    for ($i = 0; $i < count($choiceList); $i++) {
        $newsID = $choiceList[$i];
        $audit = $_POST['audit'.$newsID];

        $sqlStr = "UPDATE news SET state = ".$audit." WHERE id = ".$newsID.";";
        $result = $mysqlProxy->query($sqlStr);
        if ($result === false) {
            returnBack($sid);
            exit;
        }
    }
    $mysqlProxy->freeResourse();
    returnBack($sid);
?>