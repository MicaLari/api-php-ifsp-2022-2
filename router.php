<?php
    //importa o arquivo de configuração
    require 'config.php';
    require HELPERS_FOLDER.'autoloaders.php';
    //pega a Url requisitada
    $url = $_SERVER['REQUEST_URI'];
    //Remove a base da url
    $CleanUrl = str_replace(BASE_PATH, '' , $url);
    $urlArray = explode('/',$CleanUrl);
     
    if(isset($urlArray[0]) &&
        $urlArray[0] != '' &&
        isset($urlArray[1]) && 
        $urlArray[1] != ''
        ){
        $controller = $urlArray[0].'Controller';
        $action = $urlArray[1];
    }else{
        echo 'Endereço da API inválido!';
        die; //Para o codigo
    }
        
    if(file_exists(CONTROLLERS_FOLDER.$controller.'.php')){
        $obj = new $controller();
        if(method_exists($obj, $action)){
            $obj->$action();
            die;
        }
    }

    echo 'Endereço da API inválido!';
?>