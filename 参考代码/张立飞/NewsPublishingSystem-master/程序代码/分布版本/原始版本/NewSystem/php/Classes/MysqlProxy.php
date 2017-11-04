<?php
    require_once 'MysqlConnect.php';
    require_once 'MysqliConnect.php';
    require_once 'MysqlPDOConnect.php';

    class MysqlProxy {
        private $mysqlConnect;
        private $connectType;
        private $mysql_server_name = "10.28.102.142";
        private $mysql_username = "092214109";
        private $mysql_password = "19960212";
        private $mysql_db_name = "H092214109";

        public function connect($connectType) {
            $this->connectType = $connectType;
            error_reporting(E_ALL^E_NOTICE^E_WARNING^E_DEPRECATED);
            if (strtoupper($connectType) == "MYSQL") {
                $this->mysqlConnect = new MysqlConnect();
            } else if (strtoupper($connectType) == "MYSQLI") {
                $this->mysqlConnect = new MysqliConnect();
            } else if (strtoupper($connectType) == "PDO") {
                $this->mysqlConnect = new MysqlPDOConnect();
            } else {
                $this->mysqlConnect = null;
            }

            if ($this->mysqlConnect != null) {
                $isSuccess = $this->mysqlConnect->connect($this->mysql_server_name, $this->mysql_username, 
                $this->mysql_password, $this->mysql_db_name);

                if ($isSuccess == null) {
                    $this->mysqlConnect = null;
                }
            }
            return $this->mysqlConnect;
        }

        public function query($sqlStr) {
            return $this->mysqlConnect->query($sqlStr);
        }

        public function getNext($result) {
            if (strtoupper($this->connectType) == "MYSQL") {
                return mysql_fetch_row($result);
            } else if (strtoupper($this->connectType) == "MYSQLI") {
                return $result->fetch_assoc();
            } else if (strtoupper($connectType) == "PDO") {
                return $result->fetch(PDO::FETCH_LAZY);
            } else {
                return null;
            }
        }

        public function getResultNumber($result) {
            if (strtoupper($this->connectType) == "MYSQL") {
                return mysql_num_rows($result);
            } else {
                return $this->mysqlConnect->getResultNumber();
            }
        }

        public function freeResourse() {
            return $this->mysqlConnect->freeResourse();
        }
    }
?>