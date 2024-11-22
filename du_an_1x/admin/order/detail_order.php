<?php if (isset($value) && count($value) > 0): ?>
    <!-- Thông tin đơn hàng -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Thông tin đơn hàng</h4>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                <li><strong>Tên người nhận:</strong> <?php echo $value[0]['user_name']; ?></li>
                <li><strong>Địa chỉ:</strong> <?php echo $value[0]['user_address']; ?></li>
                <li><strong>Số điện thoại:</strong> <?php echo $value[0]['user_phone']; ?></li>
                <li><strong>Phương thức thanh toán:</strong> <?php echo $value[0]['pay']; ?></li>
                <li><strong>Tổng giá trị:</strong> <?php echo number_format($value[0]['total_price'], 0, ',', '.'); ?> VND</li>
                <li><strong>Trạng thái:</strong> <?php echo $value[0]['status']; ?></li>
            </ul>
        </div>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="card">
        <div class="card-header">
            <h4>Danh sách sản phẩm</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Ram</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($value as $item): ?>
                        <tr>
                            <td><?php echo $item['name_products']; ?></td>
                            <td>
                                <img src="<?php echo '../'.$item['img_url']; ?>" alt="<?php echo $item['name_products']; ?>" width="100" class="img-fluid">
                            </td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VND</td>
                            <td><?php echo number_format($item['quantity'] * $item['price'], 0, ',', '.'); ?> VND</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <p class="alert alert-warning">Không có dữ liệu đơn hàng.</p>
<?php endif; ?>
