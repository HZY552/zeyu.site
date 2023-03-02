<?php

class Tableaus extends Controller{

    public function index(){
        $this->loadModel("Tableau");
        $tableau = $this->Tableau;
        $this->render('Index',compact('tableau'));
    }

    public $JsFile = "tableau";

    public function getClassName(){
        return $this->Tableau->getClassName();
    }

    public function getJsFile(){
        return $this->JsFile;
    }
}