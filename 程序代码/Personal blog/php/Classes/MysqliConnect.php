<?php
    class MysqliConnect {
        private $mysqli;

        public function connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_db_name) {
            $this->mysqli = new mysqli();
            $this->mysqli->connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_db_name);
            if (mysqli_connect_error()) {
                return null;
            }
            $this->mysqli->set_charset("utf8");
            return $this->mysqli;
        }

        public function query($sqlStr) {
            $result = $this->mysqli->query($sqlStr);
            if ($result == false) {
                return null;
            }
            return $result;
        }

        public function getResultNumber($result) {
            return $result->num_rows;
        }

        public function freeResourse() {
            $this->mysqli->close();
        }
    }
?>