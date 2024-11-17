<?php 
    
    function test() {
        $sql='SELECT*FROM users';
        $conn=connect();
        $stmt= $conn->prepare($sql);
        $stmt->execute();
        $value=$stmt->fetchAll(pdo::FETCH_ASSOC);
        return $value;
    }

    function check_login_admin($email,$pass){
        try{
            $sql="SELECT*FROM USERS WHERE email='$email' and pass='$pass' and role='admin'";
            $value= select_one($sql);
            return $value;
        }catch(Exception $e){
            return false;
        }
    }
    function logout_admin() {
        $_SESSION['name_admin']=null;
    }

