<?php

class Connection {

    //Parametri za konekciju na localhost
    public $host = 'localhost';
    public $dbname = 'wdating';
    public $username = 'root';
    public $password = '';
    
    //Parametri za konekciju na Unlimited hosting
    //public $host = '';
    //public $dbname = '';
    //public $username = '';
    //public $password = '';

    public function connect(){
        try {
            $db = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,'');
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>