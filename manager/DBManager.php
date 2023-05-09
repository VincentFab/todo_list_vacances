<?php
    class DBManager {
        private $mysql;

        public function __construct() {
            try {
                $this->mysql = new PDO(
                    'mysql:host=localhost;dbname=todo;charset=utf8',
                    'root',
                    'root'
                );
            }catch(PDOException $e){
                die("Error: " .  $e->getMessage());
            }
        }

        public function getConnection() {
            return $this->mysql;
        }
    }
?>