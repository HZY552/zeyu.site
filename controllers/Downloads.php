<?php
class Downloads extends Controller{
    public $JsFile = "download";

    public function index(){
        $this->loadModel("Download");
        $downloads = $this->Download;
        $this->render('Index',compact('downloads'));
    }

    public function infofile($name){
        $this->loadModel("Download");
        $downloads = $this->Download->get_file_name($name);
        $this->render('Infofile',compact('downloads'));
    }

    public function getClassName(){
        return $this->Download->getClassName();
    }

    public function getJsFile(){
        return $this->JsFile;
    }

    public function get_All_rar(){
        $this->loadModel("Download");
        return $this->Download->get_All_rar();
    }

    public function get_All_dossier(){
        $this->loadModel("Download");
        return $this->Download->get_All_dossier();
    }
}