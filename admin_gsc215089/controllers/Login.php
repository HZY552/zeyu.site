<?php
class Login extends Controller{

    public $JsFile = "index";

    public function index(){
        $this->loadModel("Login_a");
        $index = $this->Login_a;
        $this->render('Index',compact('index'));
    }

    public function getClassName(){
        return $this->Login_a->get_Class_Name();
    }

    public function getJsFile(){
        return $this->JsFile;
    }
}