<?php
    require('config.php');

    echo 'Abriu o Router php<br>';

    $url = $_SERVER['REQUEST_URI'];

    echo BASE_PATH.'<br>';

    echo $url;

?>