<?php
class Indexs extends Controller{

    public $JsFile = "index";

    public function index(){
        $this->loadModel("Index");
        $index = $this->Index;
        $this->render('Index',compact('index'));
    }

    public function getClassName(){
        return $this->Index->getClassName();
    }

    public function getJsFile(){
        return $this->JsFile;
    }

    public function getUserEmail($token){
        $this->loadModel("Index");
        return $this->Index->getUserEmail($token);
    }

    public function getImg(){
        $this->loadModel("Index");
        $index = $this->Index->getImg();
        return $index;
    }

    public function getEtucation(){
        $this->loadModel("Index");
        $index = $this->Index->getEtucation();
        return $index;
    }

    public function getProject(){
        $this->loadModel("Index");
        $index = $this->Index->getProject();
        return $index;
    }

    public function send_contact($name,$email,$tele,$sujet,$message){
        $this->loadModel('Index');
        $contact = $this->Index->send($name,$tele,$email,$sujet,$message);

    }

}