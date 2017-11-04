<?php

    require_once 'php/Classes/MysqlProxy.php';
    $mysqlProxy = new MysqlProxy();
    $mysqlConnect = $mysqlProxy->connect("MYSQL");
    $sqlStr = "SELECT id, title, time, opened, information, image FROM news WHERE state = 1 ORDER BY time DESC;";
    $result = $mysqlProxy->query($sqlStr);
    $mysqlProxy->freeResourse();

    $num_rows = $mysqlProxy->getResultNumber($result);
    for ($i = 0; $i < $num_rows; $i++) {
        $row = $mysqlProxy->getNext($result);
        echo "$row[0] | $row[1] | $row[2]";
        echo "<br/>";
    }
?>
