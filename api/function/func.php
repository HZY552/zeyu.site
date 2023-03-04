<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class func{

    private $conn;
    public function __construct(){
        require_once "../config/database.php";
        require_once "check.php";
        $database = new database();
        $this->conn = $database->getConnection();

        $this->check = new check();
    }

    public function get_UrlOptions(){
        $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        $url_parse = parse_url($url);
        parse_str($url_parse['query'],$res);
        return $res;
    }

    public function check_Token(){
        //token_origin = $2y$10$z498Zm8y7V8WZSpzDs9ioeF.bZ4hwoXmZC.6nnNVnZfY.pNj29oR6;
        $url = $this->get_UrlOptions();
        $res = password_verify('Jiojio000608.',$url["token"]);
        return $res;
    }

    public function call_function($name_function,$options){
        //options type = array
        //$name_function type = string
        return call_user_func_array(array($this,$name_function),$options);
    }

    public function set_options(){
        $url = $this->get_UrlOptions();
        $options = array();
        foreach ($url as $u){
            array_push($options,$u);
        }
        unset($options[0]);
        unset($options[1]);
        return $options;
    }

    //http://localhost/api/function/func.php?func=get_All_from_Table&token=$2y$10$z498Zm8y7V8WZSpzDs9ioeF.bZ4hwoXmZC.6nnNVnZfY.pNj29oR6&t=clients
    public function get_All_from_Table($name_table){
        $sql = "SELECT * FROM " . $name_table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //http://localhost/api/function/func.php?func=get_By_value&token=$2y$10$z498Zm8y7V8WZSpzDs9ioeF.bZ4hwoXmZC.6nnNVnZfY.pNj29oR6&t=clients&condition=id&id=100083
    public function get_By_value($name_table,$condition,$value){
        $sql = "SELECT * FROM " . $name_table . " WHERE " . $condition . " = ". $value;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //http://localhost/api/function/func.php?func=inscription&token=$2y$10$z498Zm8y7V8WZSpzDs9ioeF.bZ4hwoXmZC.6nnNVnZfY.pNj29oR6&t=clients&values=hou,zeyu,1998-05-12,houzeyu7@gmail.com,33 rue louise weiss 75013 paris,Jiojio000608.,0695867276
    public function inscription($name_table,$options){
        $values = array();
        foreach (explode(",",$options) as $v){
            if (!empty($v) && $v !== "" && $v !== " "){
                array_push($values,$v);
            }
        }
        if (sizeof($values) === 7){
            if ($this->check->check_Email($values[3]) &&
                $this->check->check_Date($values[2]) &&
                $this->check->check_Number(intval($values[6])) &&
                $this->check_DoubleUser($values[3]) &&
                $this->check->check_Password($values[5])){
                $sql = "INSERT INTO " . $name_table . "(nom,prenom,date_de_naissance,email,address,password,tele) VALUES (?,?,?,?,?,?,?)";
                $stmt = $this->conn->prepare($sql);
                return $stmt->execute($values);
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    private function check_DoubleUser($email){
        $sql = "SELECT id from clients WHERE email = " . "'" .$email . "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $num_user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($num_user){
            return false;
        }else{
            return true;
        }
    }

    public function test(){
        $val = "Jiojio000608.";
        var_dump(!$this->check->check_Password($val));
        return $this->check->check_Password($val);
    }
}

$function = new func();
$token = $function->check_Token();

if ($token === true){
    $url = $function->get_UrlOptions();
    $options = $function->set_options();
    var_dump($options);
    $res = $function->call_function($url['func'],$options);
    echo json_encode($res);
}else{
    header('HTTP/1.0 403 Forbidden');
    json_encode("403");
}

