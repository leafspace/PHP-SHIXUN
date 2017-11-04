<?php
	class MysqlPDOConnect {
        function connect() {
            error_reporting(E_ALL^E_NOTICE^E_WARNING^E_DEPRECATED);
            define("mysql_server_name", "10.28.102.142");
            define("mysql_username", "092214109");
            define("mysql_password", "19960212");
            define("mysql_db_name", "H092214109");
            #define("mysql_server_name", "localhost");
            #define("mysql_username", "root");
            #define("mysql_password", "123456");

            $mysqlPDO = new POD("mysql:host=$mysql_server_name;dbname=$mysql_db_name", "$mysql_username", "$mysql_password");
            return $mysqlPDO;
        }

        function query($mysqlPDO, $sqlStr) {
        	if (substr($sqlStr, ) == "SELECT") {
				$result = $mysqlPDO->query($sqlStr);
        	} else { 
				if($mysqlPDO -> exec($sqlStr)) { 
				} else {
					$result = "Mysql Insert OR Update error ！";
				}
        	}
            return $result;
        }

        function freeresourse($mysqli) {
            $mysqli->close();
        }
    }
?>