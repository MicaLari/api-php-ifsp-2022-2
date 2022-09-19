<?php

class Output{
    function response($arrayResponse, $statusCode = 200){
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: '.ALLOWED_HOSTS);
        echo json_encode($arrayResponse);
        die;
    }
    
    function notFound(){
        $result['message'] = "API endpoint not Found";
        $this->response($result, 404);
    }
}

?>