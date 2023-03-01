<?php
class Login extends Model{

    public function __construct(){
        $this->table = "clients";
        $this->getConnection();
    }

    public function checkUser($email,$password){
        $sql = "SELECT id,password,nom FROM ". $this->table ." WHERE email = '".$email."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }



}