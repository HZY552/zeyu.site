<?php
define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
//On gérère une constante qui contiendra le chemin vers Indexs.php

// on sépare les paramètres
require_once (ROOT.'app/Model.php');
require_once (ROOT.'app/Controller.php');

global $params;


if (empty($_GET['p'])){
    $_GET['p'] = 'indexs';
    $params = explode('/',$_GET['p']);
    $controller = 'indexs';
    $action = 'Index';
    require_once (ROOT.'controllers/'.$controller.'.php');
    $controller = new $controller();
    call_user_func_array([$controller,$action],$params);
}else{
    $params = explode('/',$_GET['p']);

    if ($params[0] != ""){
        $controller = ucfirst($params[0]);
        if ($controller != "Admin_gsc215089"){
            if (isset($params[1]) && $params[1] != ""){
                $action = $params[1];
            }else{
                $action = 'Index';
            }



            if( file_exists(ROOT.'controllers/'.$controller.'.php') ){
                require_once (ROOT.'controllers/'.$controller.'.php');
                $controller = new $controller();

                if(method_exists($controller,$action)){
                    unset($params[0]);
                    unset($params[1]);
                    call_user_func_array([$controller,$action],$params);
                }else{
                    http_response_code(404);
                    echo "La page demandée n'existe pas";
                }
            }else{
                http_response_code(404);
                echo "La page demandée n'existe pas";
            }
        }else{

            if (isset($params[1]) && $params[1] != ""){
                $action = $params[1];
            }else{
                $action = 'Index';
            }

            if( file_exists(ROOT.'controllers/'.$controller.'s.php') ){
                require_once (ROOT.'controllers/'.$controller.'s.php');
                $controller = $controller . "s";
                $controller = new $controller();

                if(method_exists($controller,$action)){
                    unset($params[0]);
                    unset($params[1]);
                    call_user_func_array([$controller,$action],$params);
                }else{
                    http_response_code(404);
                    echo "La page demandée n'existe pas";
                }
            }else{
                http_response_code(404);
                echo "La page demandée n'existe pas";
            }
        }
    }else{

    }
}
// Est-ce qu'un paramètre existe

?>




