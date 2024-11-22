<div class="container mt-5">
        <h1 class="mb-4 text-center">Đặt Hàng</h1>
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h4>Giỏ Hàng Của Bạn</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($list_cart) && count($list_cart) > 0): ?>
                    <?php $total_all = 0; ?>
                    <table class="table table-bordered table-hover">
                        <thead class="table-secondary">
                            <tr>
                                <th>#</th>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Ram</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_cart as $index => $item): ?>
                                <?php 
                                    $total = $item['price_variant'] * $item['amount_buy']; 
                                    $total_all += $total;
                                ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td>
                                        <img src="<?php echo $item['img_url']; ?>" alt="Product Image" class="img-thumbnail" style="width: 100px; height: auto;">
                                    </td>
                                    <td><?php echo $item['name_products']; ?></td>
                                    <td><?php echo $item['ram_name']; ?></td>
                                    <td><?php echo number_format($item['price_variant'], 0, ',', '.'); ?> VND</td>
                                    <td><?php echo $item['amount_buy']; ?></td>
                                    <td><?php echo number_format($total, 0, ',', '.'); ?> VND</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-end fw-bold">Tổng Cộng:</td>
                                <td class="text-start fw-bold"><?php echo number_format($total_all, 0, ',', '.'); ?> VND</td>
                            </tr>
                        </tfoot>
                    </table>
                <?php else: ?>
                    <p class="text-center">Giỏ hàng của bạn đang trống!</p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Thông Tin Người Dùng -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Thông Tin Người Dùng</h4>
            </div>
            <div class="card-body">
                <form action="?act=order" method="POST">
 <!-- Gửi tổng tiền -->
 <input type="hidden" name="total_price" value="<?php echo $total_all; ?>">

<!-- Gửi thông tin giỏ hàng -->
            <?php foreach ($list_cart as $index => $item): ?>
                <input type="hidden" name="cart[<?php echo $index; ?>][variant_id]" value="<?php echo $item['variant_id']; ?>">
                <input type="hidden" name="cart[<?php echo $index; ?>][price]" value="<?php echo $item['price_variant']; ?>">
                <input type="hidden" name="cart[<?php echo $index; ?>][quantity]" value="<?php echo $item['amount_buy']; ?>">
            <?php endforeach; ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fullname" class="form-label">Họ và Tên</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $info_user['name']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $info_user['email']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $info_user['phone_number']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Địa Chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $info_user['address']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phương thức thanh toán</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="Ship COD" disabled>
                        </div>
                        
                    </div>
                    <div class="d-flex justify-content-end">
            <a href="cart.php" class="btn btn-secondary me-3">Quay Lại Giỏ Hàng</a>
            <button onclick="return confirm('Xác nhận đặt hàng')" name="submit" value="submit" type="submit" class="btn btn-primary">Xác Nhận Đặt Hàng</button>
        </div>
                </form>
            </div>
        </div>

    

        
    </div>