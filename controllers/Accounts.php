<?php
class Accounts extends Controller{

    public $JsFile = "account";

    public function index(){
        $this->loadModel("Account");
        $index = $this->Account;
        $this->render('Index',compact('index'));
    }

    public function getClassName(){
        return $this->Account->getClassName();
    }

    public function getJsFile(){
        return $this->JsFile;
    }

    public function GetUser($token){
        $this->loadModel("Account");
        $index = $this->Account->GetUser($token);
        return $index;
    }



}