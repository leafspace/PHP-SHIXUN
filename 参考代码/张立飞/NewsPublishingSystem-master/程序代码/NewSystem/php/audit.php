<?php
    function returnBack($sid) {
        $url = "../auditInfo.php?sid=".$sid;
        Header("Location: $url"); 
    }

    echo "hello world";
    @session_id($_POST['sid']);
    @session_start();
    $sid = @session_id();

    require_once 'Classes/MysqlConnect.php';
    $mysql_Connect = new MysqlConnect();
    $mysqli = $mysql_Connect->connect();
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        returnBack();
        exit;
    }

    $choiceList = $_POST['choice'];
    for ($i = 0; $i < count($choiceList); $i++) {
        $newsID = $choiceList[$i];
        $audit = $_POST['audit'.$newsID];

        $sqlStr = "UPDATE news SET state = ".$audit." WHERE id = ".$newsID.";";
        $result = $mysql_Connect->query($mysqli, $sqlStr);
        if ($result === false) {
            echo $mysqli->error;
            returnBack($sid);
            exit;
        }
    }
    $mysql_Connect->freeresourse($mysqli);
    returnBack($sid);
?>