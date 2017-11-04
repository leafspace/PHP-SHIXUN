<?php
    class MysqlConnect {
        private $mysql;

        public function connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_db_name) {
            $this->mysql = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);
            mysql_query("set names 'gbk'");
            mysql_select_db($mysql_db_name);
            return $this->mysql;
        }

        public function query($sqlStr) {
            $result = mysql_query($sqlStr);
            if ($result == false) {
                return null;
            }
            return $result;
        }

        public function getResultNumber($result) {
            return mysql_num_rows($result);
        }

        public function freeResourse() {
            mysql_close($mysql);
        }
    }
?>