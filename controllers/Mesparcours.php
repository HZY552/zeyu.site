<?php
class Mesparcours extends Controller {

    public $JsFile = "mesparcours";

    public function index(){
        $this->loadModel("Mesparcour");
        $mesparcour = $this->Mesparcour->findAllprojects();
        $this->render('Index',compact('mesparcour'));
    }

    public function getJsFile(){
        return $this->JsFile;
    }
    public function type($type){
        $this->loadModel('Mesparcour');
        $mesparcour = $this->Mesparcour->findByType($type);
        $this ->render('type',compact('mesparcour'));
    }

    public function getClassName(){
        return __CLASS__;
    }

}