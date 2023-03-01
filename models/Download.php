<?php
class Download extends Model {
    public function __construct(){
        $this->table = "articles";
        $this->getConnection();
    }

    public function getClassName(){
        return __CLASS__ . 's';
    }

    public function get_All_rar(){
        $path = dirname(__DIR__) . "\\views\\downloads\\file_downloads\\";

        if (!is_dir($path)){
            return false;
        }

        $dir = opendir($path);
        $arr = array();
        while ($content = readdir($dir)){
            if ($content != '.' && $content != '..'){
                if (substr($content,-3) === "rar" || substr($content,-3) === "zip"){
                    $arr[] = $content;
                }
            }
        }
        closedir($dir);
        return $arr;

    }

    public function get_All_dossier(){
        $path = dirname(__DIR__) . "\\views\\downloads\\file_downloads\\";

        if (!is_dir($path)){
            return false;
        }

        $dir = opendir($path);
        $arr = array();
        while ($content = readdir($dir)){
            if ($content != '.' && $content != '..'){
                $arr[] = pathinfo($path .$content) ;
            }
        }
        closedir($dir);
        return $arr;
    }

    public function get_file_name($name){
        var_dump($name);
        return $name;
    }
}