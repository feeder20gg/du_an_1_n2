<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../lib/bootstrap.min.css">
</head>
<body>
<h2 class="mt-5 text-center">ADMIN LOGIN</h2>

<!--Đăng nhập admin -->
<div class="login-form mt-5" style="margin:auto; width: 30%; border: 1px solid #ddd; padding: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px;">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email đang nhập</label>
            <input type="email" class="form-control"name='email' id="email" placeholder="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" name="pass" id="password" placeholder="pass" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Lưu mật khẩu</label>
        </div>
        <div class="text-center">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Đăng nhập</button>
        </div>
        <div class="text-center mt-3">
            <a href="#">Quên mật khẩu?</a>
        </div>
        <div class="text-center mt-2">
            <p>Bạn chưa có tài khoản? <a href="?act=register">Đăng ký ngay</a></p>
        </div>
    </form>
</div>


    <?php 
        include_once '../model/pdo.php';
        include_once '../model/auth.php';
        session_start();
        if(isset($_POST['submit'])){
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            
            if(check_login_admin($email,$pass)){
                $value=check_login_admin($email,$pass);
                $_SESSION['name_admin']=$value['name'];
                header('location:index.php');
            }
        }
    ?>
</body>
</html>