<?php

class Database {

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "test_db";

    function connect() {
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        return $connection;
    }

    function read($query) {
        $connec = $this->connect();
        $result = mysqli_query($connec, $query);

        if(!$result) {
            return false;
        } else {
            $data = null;
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }

            return $data;
        }
    }

    function write($query) {
        $connec = $this->connect();
        $result = mysqli_query($connec, $query);

        if(!$result){
            return false;
        } else {
            return true;
        }
    }
}