<?php
class Inscription extends Model{
    public function __construct(){
        $this->table = "clients";
        $this->getConnection();
    }

    public function getClassName(){
        return __CLASS__ . 's';
    }

    public function setbase($email,$password,$nom,$dateinscription){
        $sql = "INSERT INTO ". $this->table . "(email,password,nom,dateinscription) values (?,?,?,?)";
        $query = $this->_connexion->prepare($sql);
        $query->execute(array($email,$password,$nom,$dateinscription));
    }

    public function checkemail($email){
        $sql = "SELECT id FROM ". $this->table ." WHERE email = '".$email."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }



}