<?php 
    include_once 'user/layout/header.php';
    require_once 'model/pdo.php';
    require_once 'model/auth.php';


    $act=isset($_GET['act'])&&$_GET['act']!==''?$_GET['act']: 'home';
    // $act=$_GET['act']||$_GET['act']='' ??'home';
    // echo $act;
    switch($act){
        case 'home':            
            include 'user/home.php';
            break;
        case 'login':
            // var_dump(connect());
            // print_r(test());
            $sql="SELECT * FROM USERS";

                $value= select_all($sql);
                print_r($value);

            if(isset($_GET['submit'])){
                

                $email=$_GET['email'];
                $pass=$_GET['pass'];
                

                
            }

            include 'user/login.php';

            break;
        case 'register':
            // $sql="INSERT INTO users (name,role,address,phone_number,user_img,email,pass)
            //     VALUES ('user_3','user','zzz',123213,'img','d@ddd','123')";
            // pdo_excute($sql);
            // $sql="SELECT * FROM USERS where id=1 AND name='Vy Minh Ky'";
            // $result=select_all($sql);
            // print_r($result);
            if(isset($_POST['submit'])){
                $name=$_POST['name'];
                $role='user';
                $address=$_POST['address'];
                $phone_number=(int) $_POST['phone_number'];
                $user_img='img';
                $email=$_POST['email'];
                $pass=$_POST['pass'];
                $check=true;
                if ($name == '' || $role == '' || $address == '' || $phone_number == '' || $email == '' || $pass == '') {
                echo '<h3 style="color:red; font-weight: bold;">Nhập đầy đủ thông tin</h3>'; $check=false;
                } elseif(!ctype_digit($phone_number)){echo 'sai sđt'; $check=false;}


                $sql="INSERT INTO USERS (name,role,address,phone_number,user_img,email,pass)
                    VALUES ('$name', '$role','$address','$phone_number','$user_img','$email','$pass')";
                    
                    if($check=true){
                    pdo_excute($sql);
                    // header(header: 'Location: index.php?act=login');
                    // exit();
                    break;
                    }
                    

            }
            include 'user/register.php';
            break;
    
        
    }
    include_once 'user/layout/footer.php';

