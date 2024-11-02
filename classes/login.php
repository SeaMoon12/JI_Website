<?php

class Login{
    private $error = "";

    public function evaluate($data) {

        $email = addslashes($data['email']);
        $password = addslashes($data['password']);

        $query = "select * from users where email = '$email' limit 1";

        $DB = new Database();
        $result = $DB -> read($query);

        if($result){
            $row = $result[0];
            if ($password == $row["password"]) {
                // create session
                $_SESSION["userid"] = $row["userid"];
            } else {
                $this->error .= "Wrong password";
            }
        } else {
            $this->error .= "No email found";
        }
        return $this->error;
    }
}