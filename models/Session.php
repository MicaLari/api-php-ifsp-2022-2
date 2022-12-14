<?php
class Session{

    public $id;
    public $id_user;
    public $token;
    public $client;

    function __construct($id, $id_user, $token, $client) {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->token = $token;
        $this->client = $client;
    }

    public function create(){
        $conn = Database::connect();
            
        try{
            $stmt = $conn->prepare("INSERT INTO session (id_user, token, client)
            VALUES (:id_user, :token, :client)");
            $stmt->bindParam(':id_user', $this->id_user);
            $stmt->bindParam(':token', $this->token);
            $stmt->bindParam(':client', $this->client);
            $stmt->execute();
            $id = $conn->lastInsertId();
            $conn = null;
            return $id;
        }catch(PDOException $e) {
               Database::dbError($e);
        }
    }

    function delete(){
        $conn = Database::connect();

        try{
            $stmt = $conn->prepare("DELETE FROM session WHERE id_user = :id_user AND token = :token;");
            $stmt->bindParam(':id_user', $this->id_user);
            $stmt->bindParam(':token', $this->token);
            $stmt->execute();
            $rowsAffected = $stmt->rowCount();
            $conn = null;
            if ($rowsAffected) {
                return true;
            } else {
                return false;
            }
            
        }catch(PDOException $e) {
            Database:: dbError($e);
        }
    }

}

?>