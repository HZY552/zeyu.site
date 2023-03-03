<?php
class Mesparcour extends Model{
    public function __construct(){
        $this->table = "project";
        $this->getConnection();
    }

    public function findByType(string $type){
        $sql = "SELECT * FROM ". $this->table ." WHERE fait_ou = '".$type."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchall();
    }

    public function findAllprojects(){
        $sql = "SELECT * FROM ". $this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchall();
    }


}