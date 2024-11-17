<?php 
    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=du_an_1_n2", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
    }

    function pdo_excute($sql){
        $conn=connect();
        $stmt=$conn->prepare($sql);
        $stmt->execute();
    }


    function select_all($sql) {
        $conn=connect();
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $value=$stmt->fetchAll(pdo::FETCH_ASSOC);
        return $value;
    }

    function select_one($sql){
        $conn=connect();
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $value=$stmt->fetch(pdo::FETCH_ASSOC);
        return $value;
    }
    