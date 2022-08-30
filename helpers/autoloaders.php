<?php

function myLoaders($class_name){
    if(file_exists(CONTROLLERS_FOLDER . $class_name . '.php')){
        require CONTROLLERS_FOLDER . $class_name . '.php';
    }
    if(file_exists(HELPERS_FOLDER . $class_name . '.php')){
        require HELPERS_FOLDER . $class_name . '.php';
    }
}
//Automatoriza o carregamento das classes
spl_autoload_register('myLoaders');

?>