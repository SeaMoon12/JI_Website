<?php

include("connect.php");

class Signup {
    private $error = "";

    public function evaluate($data) {
        foreach ($data as $key => $value) {
            if($key == "email"){
                if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
                    $this->error = $this->error . "Invalid email!";
                }
            }

            if($key == "username"){
                if(is_numeric($value)) {
                    $this->error = $this->error . "Username cannot contain only numbers!";
                }

                if(strstr($value," ")) {
                    $this->error = $this->error . "Username cannot contain only spaces!";
                }
            }
        }

        if(empty($this->error)) {
            // no error
            return $this->create_user($data);
        } else {
            return $this->error;
        }
    }

    public function create_user($data) {

        $email = addslashes($data['email']);
        $username = addslashes(ucfirst($data['username']));
        $date_of_birth = $data['date_of_birth'];
        $password = addslashes($data['password']);
        $gender = addslashes($data['gender']);

        $userid = $this->create_userid();
        $url_address = strtolower($username) . "." ."bukitsion";

        $query = "insert into users 
        (userid, email, username, date_of_birth, 
        password, gender, url_address) values 
        ('$userid', '$email', '$username', '$date_of_birth', 
        '$password', '$gender', '$url_address')";

        // return $query;
        $DB = new Database();
        $DB->write($query);
    }

    private function create_userid() {
        $length = rand(4,19);
        $number = "";
        for ($i = 0; $i < $length; $i++) {
            $rand_num = rand(0,9);
            $number .= $rand_num;
        }

        return $number;
    }
}

// $data['email'] = 'aroko0121@gmail.com';
// $data['username'] = 'aroko21';
// $data['date_of_birth'] = '2024-01-01';
// $data['password'] = 'arokopass';
// $data['gender'] = 'Female';

// $test = new Signup;
// $test->evaluate($data);
// $DB = new Database;
// $DB->write($test->create_user($data));

