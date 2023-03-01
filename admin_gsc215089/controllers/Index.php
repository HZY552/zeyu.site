<?php
class Index extends Controller{

    public $JsFile = "index";

    public function index(){
        $this->loadModel("Index_a");
        $index = $this->Index_a;
        $this->render('Index',compact('index'));
    }

    public function getClassName(){
        return $this->Index_a->get_Class_Name();
    }

    public function getJsFile(){
        return $this->JsFile;
    }
}