<?php
class Inscriptions extends Controller{

    public $JsFile = "inscription";

    public function index(){
        $this->loadModel("Inscription");
        $inscription = $this->Inscription;
        $this->render('Index',compact('inscription'));
    }

    public function getClassName(){
        return $this->Inscription->getClassName();
    }

    public function getJsFile(){
        return $this->JsFile;
    }

    public function insert($email,$password,$nom,$dateinscription){
        $this->loadModel('Inscription');
        if (!empty($email) && !empty($password) && !empty($nom)){
            $password = password_hash($password,PASSWORD_BCRYPT);
            $inscription = $this->Inscription->setbase($email,$password,$nom,$dateinscription);
            $this ->render('Index',compact('inscription'));
            return true;
        }else{
            return false;
        }

    }

    public function success(){
        $this->loadModel('Inscription');
        $inscription = $this->Inscription;
        $this ->render('success',compact('inscription'));
    }

    public function checkmail($email){
        $this->loadModel('Inscription');
        $inscription = $this->Inscription->checkemail($email);
        return $inscription;
    }

    public function checkUserName($username){
        if ($username !== null && $username === " "){
            return false;
        }else{
            if(preg_match("/[ '.,:;*?~`!@#$%^&+=)({}]|\]|\[|\/|\\\|\"|\|/",$username)){
                return false;
            }else{
                return true;
            }
        }
    }

    public function checkPassword($password,$password1){
        if ($password === $password1){
            return true;
        }else{
            return false;
        }
    }

}