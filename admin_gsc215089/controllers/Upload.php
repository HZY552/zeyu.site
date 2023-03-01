<?php
class Upload extends Controller{

    public $JsFile = "upload";

    public function index(){
        $this->loadModel("upload_a");
        $index = $this->upload_a;
        $this->render('Index',compact('index'));
    }

    public function getClassName(){
        return $this->upload_a->get_Class_Name();
    }

    public function getJsFile(){
        return $this->JsFile;
    }

    public function get_all_files(){
        $path = dirname(dirname(dirname(__FILE__))) . '\views\downloads\file_downloads';
        static $array = [];
        $dir = scandir($path);
        foreach ($dir as $file) {
            if (is_dir("$path/$file") && $file !== '.' && $file !== '..') {
                dir_list("$path/$file");
            } else {
                if ($file !== '.' && $file !== '..') {
                    $array[] = $file;
                }
            }
        }

        return $array;
    }

    public function check_extension(){ //判断文件后缀
        $file_name = $_FILES["file"]["name"];
        $extension = $this->get_file_extension($file_name);
        $Deny_list = array("exe","php","js","css","java","py");
        for ($i = 0;$i <= count($Deny_list)-1; $i++){
            if ($extension == $Deny_list[$i]){
                $res = false;
                break;
            }else{
                $res = true;
            }

        }
        return $res;
    }

    public function check_size(){ //检查文件大小 最大大小为100MB
        $file_size = $_FILES["file"]["size"];
        if ($file_size[0] > 104857600){ //此处单位为Bytes
            return false;
        }else{
            return true;
        }
    }

    public function send_upload(){
        if ($this->check_extension() && $this->check_size()){
            $down_load_path = dirname(__FILE__, 3) . "/views/downloads/file_downloads/";
            move_uploaded_file($_FILES["file"]["tmp_name"][0],$down_load_path . $_FILES["file"]["name"][0]);
            $file_path = $down_load_path . $_FILES["file"]["name"][0];
            $extension = $this->get_file_extension($_FILES["file"]["name"][0]);
            if ($extension !== "zip" && $extension !== "rar"){
                $zip = new ZipArchive();
                $zip->open($down_load_path . $_FILES["file"]["name"][0] . ".zip",ZipArchive::CREATE);
                $zip->addFile($file_path,basename($file_path));
                $zip->close();
                unlink($down_load_path . $_FILES['file']['name'][0]);
            }
            return true;
        }else{

            return false;
        }
    }

    public function convert_size($size){
        $unit = array('B','KB','MB','GB','TB','PB');
        return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];

    }

    public function get_file_extension($str){
        return substr(strrchr($str[0],'.'),1);
    }

    public function send_uploads(){
        $list_extensions = $this->get_extensions();
        $list_sizes = $this->get_sizes();
        $Deny_list = array("exe","php","js","css","java","py");
        $files = $_FILES["file"];
        for ($i = 0; $i <= count($files["name"])-1; $i++){
            if (in_array($list_extensions[$i],$Deny_list) !== true){
                $check_extension = true;
            }else{
                $check_extension = false;
                break;
            }
        }

        for ($i = 0; $i <= count($files["name"])-1; $i++){
            if ($list_sizes[$i] > 104857600){
                $check_size = false;
                break;
            }else{
                $check_size = true;
            }
        }

        if ($check_extension && $check_size){
            $down_load_path = dirname(__FILE__, 3) . "/views/downloads/file_downloads/";
            for ($i = 0; $i <= count($files["name"])-1; $i++){
                move_uploaded_file($files["tmp_name"][$i],$down_load_path . $files["name"][$i]);
                $file_path = $down_load_path . $files["name"][$i];
                $extension = $this->get_file_extension($files["name"][$i]);
                if ($extension !== "zip" && $extension !== "rar"){
                    $zip = new ZipArchive();
                    $zip->open($down_load_path . $files["name"][$i] . ".zip",ZipArchive::CREATE);
                    $zip->addFile($file_path,basename($file_path));
                    $zip->close();
                    unlink($down_load_path . $files['name'][$i]);
                }
            }


        }
    }

    public function get_extensions(){
        $list_files = $_FILES["file"];
        $list_extension = array();
        for ($i = 0;$i <= count($list_files["name"])-1; $i++){
            $extension = substr(strrchr($list_files["name"][$i],'.'),1);
            array_push($list_extension,$extension);
        }
        return $list_extension;
    }

    public function get_sizes(){
        $list_files = $_FILES["file"];
        $list_size = array();
        for ($i = 0;$i <= count($list_files["name"])-1; $i++){
            $size = $list_files["size"][$i];
            array_push($list_size,$size);
        }
        return $list_size;
    }
}