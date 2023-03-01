<?php
class Article extends Model{
    public function __construct(){
        $this->table = "articles";
        $this->getConnection();
    }

    public function findByTitle(string $title){
        $sql = "SELECT * FROM ". $this->table ." WHERE title = '".$title."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function findById(int $id){
        $sql = "SELECT * FROM ". $this->table ." WHERE id = '".$id."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }


}