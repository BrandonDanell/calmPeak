

<?php
// google search api key = AIzaSyB_gAXIUniRNRdz3qUoBQp8sMPDcMHxi8c
// search engine name = Calm-peak-16802.herokuapp
// cx parameter = e40f58dfba11527b6

require_once 'KLogger.php';

class Dao {
    private $host = "us-cdbr-east-05.cleardb.net";
    private $db = "heroku_15d90bba4adeb7d";
    private $user = "b9613e5a23dcb2";
    private $pass = "8fb575ac";

    private $logger = null;

    public function __construct() {
        $this->logger = new KLogger ( "log.txt" , KLogger::WARN );
    }
    
    public function getConnection() {

        $this->logger->LogDebug("getting a connection...");

        try {

            return new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
            
        } catch (PDOException $e) {
            $e->getMessage();
            $this->logger->LogFatal("The database exploded " . print_r($e,1));
            exit;
        }
    }

    public function getAllUser() {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM user");
    }

    public function checkLogin($email, $password) {
        $conn = $this->getConnection();
        $saveQuery =
            "SELECT password
            FROM
            user
            WHERE
            strcmp(:email, user.email) = 0
            AND
            strcmp(:password, password) = 0";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":email", $email);
        $q->bindParam(":password", $password);
        $q->execute();
        $result = $q->fetch(PDO::FETCH_OBJ);
        if($result->password == $password) {
            return true;
        } else {
            return false;
        }
    }

    public function signup($email, $password) {
        $conn = $this->getConnection();
        $saveQuery =
            "INSTERT INTO user
            (email, password)
             VALUES 
             (:email, :password)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":email", $email, PDO::PARAM_STR);
        $q->bindParam(":password", $password, PDO::PARAM_STR);
        $q->execute();
    }

    public function getFavorites($email) {
        $conn = $this->getConnection();
        $saveQuery =
            "SELECT *
            FROM
            favorites
            WHERE
            email = :email";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":email", $email);
        $q->execute();
        $result = $q->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>
