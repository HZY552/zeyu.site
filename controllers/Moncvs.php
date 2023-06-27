<?php

class Moncvs extends Controller{

    public function index(){
        $this->loadModel("Moncv");
        $moncv = $this->Moncv;
        $this->render('Index',compact('moncv'));
    }

    public $JsFile = "moncv";

    public function getClassName(){
        return $this->Moncv->getClassName();
    }

    public function getJsFile(){
        return $this->JsFile;
    }
}