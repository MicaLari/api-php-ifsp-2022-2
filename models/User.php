<?php
class User{
    private $id;
    private $name;
    private $email;
    private $pass; 
    private $avatar;

    function __construct($id, $name,  $email,  $pass, $avatar){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
        $this->avatar = $avatar;
    }


}


?>