<?php
    require_once './config/config.php';
    
    class Connect {    

        protected $connection;

        function __construct(){
            $this->connectDatabase();
        }

        private function connectDatabase(){
            try 
            {
                $this->connection = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
            } 
            catch (PDOException $e) 
            {
                echo "Erro ao tentar conectar ao banco de dados!".$e->getMessage();
                die();
            }
        } 

    }
?>
