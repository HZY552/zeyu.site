<?php
class Moncv extends Model{
    public function __construct(){
        $this->table = "";
        $this->getConnection();
    }
    public function getClassName(){
        return __CLASS__ . 's';
    }
}