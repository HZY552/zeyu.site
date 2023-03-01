<?php
class Projects extends Controller {
    public $JsFile = "index";

    public function index(){
        $this->loadModel("Project");
        $project = $this->Project;
        $this->render('Index',compact('project'));
    }

    public function getJsFile(){
        return $this->JsFile;
    }

    public function id($id){
        $this->loadModel('Project');
        $project = $this->Project->findById($id);
        $this ->render('id',compact('project'));
    }

    public function getClassName(){
        return __CLASS__;
    }

}