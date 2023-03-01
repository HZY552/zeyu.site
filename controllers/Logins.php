<?php
class Logins extends Controller{
    public $JsFile = "login";
    public function index(){
        $this->loadModel("Login");
        $login = $this->Login;
        $this->render('Index',compact("login"));
    }

    public function getClassName(){
        return __CLASS__;
    }

    public function getJsFile(){
        return $this->JsFile;
    }

    public function checkUser($email,$password){
        $this->loadModel("Login");
        $login = $this->Login->checkUser($email,$password);


        if ($login != false && password_verify($password,$login['password']) == true){
            session_start();
            $_SESSION['username'] = $login['nom'];
            $_SESSION['token'] = $login['password'];
            $this->render('Index',compact('login'));
            return true;
        }else{
            return false;
        }
    }
}