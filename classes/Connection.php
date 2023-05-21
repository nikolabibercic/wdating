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
            return new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password);
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>