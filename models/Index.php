<?php
class Index extends Model{

    public function __construct(){
        $this->table = "clients";
        $this->getConnection();
    }

    public function getClassName(){
        return __CLASS__ . 's';
    }

    public function getUserEmail($token){
        $sql = "SELECT * FROM ". $this->table ." WHERE password = '".$token."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function getImg(){
        $sql = "SELECT * FROM img";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getEtucation(){
        $sql = "SELECT * FROM etucation";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getProject(){
        $sql = "SELECT * FROM project";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function send($name,$tele,$email,$sujet,$message){
        $sql = "INSERT INTO contact " . "(nom,tele,email,sujet,message,date) values (?,?,?,?,?,?)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array($name,$tele,$email,$sujet,$message,date('Y-m-d H:i:s', time())));
    }
}