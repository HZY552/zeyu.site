<?php
class Admin extends Model{

    public function __construct(){
        $this->table = "admin_gsc215089";
        $this->getConnection();
    }

    public function getClassName(){
        return __CLASS__ . 's';
    }

    public function GetUser($token){
        $sql = "SELECT * FROM ". $this->table ." WHERE password = '".$token."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
}