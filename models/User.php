<?php
class User {
    
    private $id;
    private $name;
    private $email;
    private $pass;
    private $avatar;

    function __construct($id, $name, $email, $pass, $avatar) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
        $this->avatar = $avatar;
    }

    function create(){
        $conn = Database::connect();
        
        try{
            $stmt = $conn->prepare("INSERT INTO cadastro (name, email, pass, avatar)
            VALUES (:name, :email, :pass, :avatar)");
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->bindParam(':avatar', $this->avatar);
            $stmt->execute();
            $id = $conn->lastInsertId();
            $conn = null;
            return $id;
        }catch(PDOException $e) {
            $db->dbError($e);
        }
    }

    function list(){
        $conn = Database::connect();
        
        try{
            $stmt = $conn->prepare("SELECT * FROM cadastro");
            $stmt->execute();
            $cadastro = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;
            return $cadastro;
        }catch(PDOException $e) {
            $db->dbError($e);
        }
    }

    function byId(){
        $conn = Database::connect();

        try{
            $stmt = $conn->prepare("SELECT * FROM cadastro WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            return $user;
        }catch(PDOException $e) {
            $db->dbError($e);
        }
    }

    function delete(){
        $conn = Database::connect();
        
        try{
            $stmt = $conn->prepare("DELETE FROM cadastro WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $rowsAffected = $stmt->rowCount();
            $conn = null;
            if($rowsAffected){
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e) {
            $db->dbError($e);
        }
    }



}

?>