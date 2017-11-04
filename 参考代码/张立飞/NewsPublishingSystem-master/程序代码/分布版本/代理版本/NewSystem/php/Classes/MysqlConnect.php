<?php
    class MysqlConnect {
        function connect() {
            error_reporting(E_ALL^E_NOTICE^E_WARNING^E_DEPRECATED);
            define("mysql_server_name", "10.28.102.142");
            define("mysql_username", "092214109");
            define("mysql_password", "19960212");
            #define("mysql_server_name", "localhost");
            #define("mysql_username", "root");
            #define("mysql_password", "123456");

            $mysqli = new mysqli();
            $mysqli->connect($mysql_server_name, $mysql_username, $mysql_password, "H092214109");
            #$mysqli->connect($mysql_server_name, $mysql_username, $mysql_password, 'news_system');
            if (mysqli_connect_error()) {
                echo mysqli_connect_error();
                return null;
            }
            $mysqli->set_charset("utf8");
            return $mysqli;
        }

        function query($mysqli, $sqlStr) {
            $result = $mysqli->query($sqlStr);
            if ($result === false) {
                echo $mysqli->error;
                return null;
            }
            return $result;
        }

        function freeresourse($mysqli) {
            $mysqli->close();
        }
    }
?>