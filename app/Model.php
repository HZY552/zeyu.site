<?php
abstract class Model{
    //Informations de mase de données
    private $host = "89.156.15.147";
    private $db_name = "server";
    private $username = "pc";
    private $password = "Houzeyu970512.";

    //Propriété contenant la connxion

    protected $_connexion;

    //Propriétés contenant les information de requêtes
    public $table;
    public $id;

    public function getConnection(){

        $this->_connexion = null;

        if ($_SERVER['HTTP_HOST'] == 'localhost'){
            $this->username = "pc";
            $this->password = "jiojio000608.";
        }

        try{
            $this->_connexion = new PDO('mysql:host='.$this->host .';dbname='.$this->db_name,$this->username,$this->password);
            $this->_connexion->exec('set names utf8');
        }catch (PDOException $exception){
            echo 'Erreur : '.$exception->getMessage();
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM ". $this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public  function  getOne(){
        $sql = "SELECT * FROM ". $this->table ." WHERE id =".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }


}