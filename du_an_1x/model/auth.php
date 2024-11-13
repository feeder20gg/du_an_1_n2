<?php 
    
    function test() {
        $sql='SELECT*FROM users';
        $conn=connect();
        $stmt= $conn->prepare($sql);
        $stmt->execute();
        $value=$stmt->fetchAll(pdo::FETCH_ASSOC);
        return $value;
    }

    function check_login($email,$pass){
        $sql="SELECT name, email, pass FROM users where email='$email' and pass='$pass";
        $value= select_one($sql);
        
    }