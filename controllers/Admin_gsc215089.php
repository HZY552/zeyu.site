<?php
class Admin_gsc215089 extends Controller{

    public function index(){
        $this->loadModel("Admin");
        $index = $this->Account;
        $this->render('Index',compact('index'));
    }

}