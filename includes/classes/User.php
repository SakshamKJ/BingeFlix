<?php
class User {
    private $con, $sqlData;

    public function __construct($con, $username) {
        $this->con = $con;

        $query = $con->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindValue(":username", $username);
        $query->execute();

        $this->sqlData = $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getFirstName() {
        return $this->sqlData["firstName"];
    }

    public function getLastName() {
        return $this->sqlData["lastName"];
    }

    public function getEmail() {
        return $this->sqlData["email"];
    }

    public function getIsSubscribed() {
        return $this->sqlData["subscribe"];
    }

    public function getUsername() {
        return $this->sqlData["username"];
    }

    public function setIsSubscribed($value) {
        $query = $this->con->prepare("UPDATE users SET subscribe=:subscribe
                                    WHERE username=:un");
        $query->bindValue(":subscribe", $value);
        $query->bindValue(":un", $this->getUsername());
        
        if($query->execute()) {
            $this->sqlData["subscribe"] = $value;
            return true;
        }

        return false;
    }
}
?>