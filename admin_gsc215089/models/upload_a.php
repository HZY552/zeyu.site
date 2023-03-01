<?php
class upload_a extends Model{

    public function __construct(){
        $this->table = "client";
        $this->getConnection();
    }

    public function get_Class_Name(){
        return strtolower(substr(__CLASS__,0,strrpos(__CLASS__,'_')));
    }
}