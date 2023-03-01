<?php
class Project extends Model{
    public function __construct(){
        $this->table = "project";
        $this->getConnection();
    }

    public function findById(int $id){
        $sql = "SELECT * FROM ". $this->table ." WHERE id_project = '".$id."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }


}