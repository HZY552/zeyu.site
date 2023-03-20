<?php

class Veillestecs extends Controller{

    public function index(){
        $this->loadModel("Veillestec");
        $index = $this->Veillestec;
        $this->render('Index',compact('index'));
    }

    public $JsFile = "vt";

    public function getClassName(){
        return $this->Veillestec->getClassName();
    }

    public function getJsFile(){
        return $this->JsFile;
    }
}