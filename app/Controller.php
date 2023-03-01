<?php
abstract class Controller{

    public function loadModel(string $model){
        require_once (ROOT.'models/'.$model.'.php');
        $this->$model = new $model();
    }

    public function render(string $fichier,array $data = []){
        extract($data);

        //on démarre le buffer

        ob_start();

        require_once (ROOT.'views/'. strtolower(get_class($this)). '/'.$fichier.'.php' );
        $content = ob_get_clean();
        require_once(ROOT . 'views/layouts/default.php');

    }

    public function render_admin(string $fichier,array $data = []){
        extract($data);

        ob_start();

        require_once (ROOT. substr(strtolower(get_class($this)),0,5). '/'.$fichier.'.php' );
        $content = ob_get_clean();
        require_once(ROOT . 'admin_gsc215089/layouts/default.php');
    }
}