<?php 
    if(isset($_SESSION['err_cart'])){
        echo $_SESSION['err_cart'];
        $_SESSION['err_cart']=null;
    }
?>

<div class="login-form">
<form method="POST" action="?act=login">
    <div class="mb-3">
        <label for="email" class="form-label">Địa chỉ email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="pass" id="password" placeholder="Nhập mật khẩu" required>
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

