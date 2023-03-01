<?php
class Articles extends Controller {
    public $JsFile = "article";

    public function index(){
        $this->loadModel("Article");
        $article = $this->Article->getAll();
        $this->render('Index',compact('article'));
    }

    public function getJsFile(){
        return $this->JsFile;
    }

    public function title($title){
        $this->loadModel('Article');
        $article = $this->Article->findByTitle($title);
        $this ->render('title',compact('article'));
    }

    public function id($id){
        $this->loadModel('Article');
        $article = $this->Article->findById($id);
        $this ->render('id',compact('article'));
    }

    public function getClassName(){
        return __CLASS__;
    }





}