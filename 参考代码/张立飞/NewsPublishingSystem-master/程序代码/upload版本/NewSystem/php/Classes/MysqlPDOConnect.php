<?php
	class MysqlPDOConnect {
        private $mysqlPDO;
        
        public function connect($mysql_server_name, $mysql_username, $mysql_password, $mysql_db_name) {
            $this->mysqlPDO = new PDO("mysql:host=$mysql_server_name;dbname=$mysql_db_name", "$mysql_username", "$mysql_password");
            return $this->mysqlPDO;
        }

        public function query($sqlStr) {
            return $this->mysqlPDO->prepare($query)->execute();
            /*
        	if (strtoupper(substr($sqlStr, 0, 6)) == "SELECT") {
				$result = $this->mysqlPDO->query($sqlStr);
        	} else { 
				if($this->mysqlPDO -> exec($sqlStr)) { 
				} else {
					$result = null;
				}
        	}
            return $result;
            */
        }

        public function getResultNumber($result) {
            return 2;
        }

        public function freeResourse() {
            $this->mysqlPDO = null;
        }
    }
?>