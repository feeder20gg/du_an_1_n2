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
    function check_login_user($email, $pass) {
        try {
            $sql = "SELECT * FROM USERS WHERE email='$email' AND pass='$pass' AND role='user'";
            $value = select_one($sql);
            if ($value) {
                return $value;
            } else {
                echo "Không tìm thấy tài khoản hoặc mật khẩu không đúng.";
                return false;
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    
    function logout_admin() {
        $_SESSION['logout_admin']=null;
    }
    function logout_user() {
        $_SESSION['name_user']=null;
        $_SESSION['id_user']=null;
    }