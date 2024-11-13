<h2 class="text-center">Đăng ký tài khoản</h2>

<!-- Phần Đăng ký -->
<div class="registration-form">
    <form action="?act=register" method="post">
        <div class="mb-3">
            <label for="fullName" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="name" id="fullName" placeholder="Nhập họ và tên" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Địa chỉ email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control"  name="pass" id="password" placeholder="Nhập mật khẩu" required>
        </div>
        <!-- <div class="mb-3">
            <label for="confirmPassword" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" class="form-control" id="confirmPassword" placeholder="Xác nhận mật khẩu" required>
        </div> -->
        <div class="mb-3">
            <label for="phoneNumber" class="form-label">Số điện thoại</label>
            <input type="tel" class="form-control" name="phone_number" id="phoneNumber" placeholder="Nhập số điện thoại" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ giao hàng</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ giao hàng" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="terms" required>
            <label class="form-check-label" for="terms">Tôi đồng ý với các điều khoản và điều kiện</label>
        </div>
        <div class="text-center">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Đăng ký</button>
        </div>
    </form>
</div>
