<?php
if (!empty($value)) {
    $groupedOrders = [];
    foreach ($value as $order) {
        $groupedOrders[$order['order_id']][] = $order;
    }
?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Danh sách đơn hàng</h2>
    <table class="table table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Người mua</th>
                <th>Địa chỉ</th>
                <th>Hình thức thanh toán</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groupedOrders as $orderId => $orders): ?>
                <?php foreach ($orders as $index => $order): ?>
                    <tr>
                        <?php if ($index === 0): ?>
                            <td class="text-center align-middle" rowspan="<?= count($orders) ?>">
                                <?= $order['order_id'] ?>
                            </td>
                            <td class="align-middle" rowspan="<?= count($orders) ?>">
                                <?= htmlspecialchars($order['user_name']) ?>
                            </td>
                            <td class="align-middle" rowspan="<?= count($orders) ?>">
                                <?= htmlspecialchars($order['user_address']) ?>
                            </td>
                            <td class="align-middle text-center" rowspan="<?= count($orders) ?>">
                                <?= htmlspecialchars($order['pay']) ?>
                            </td>
                        <?php endif; ?>
                        <td>
                            <?= htmlspecialchars($order['name_products']) ?> (<?= htmlspecialchars($order['name']) ?>)
                            <br>
                            <img src="<?= htmlspecialchars($order['img_url']) ?>" alt="<?= htmlspecialchars($order['name_products']) ?>" class="img-thumbnail" width="80">
                        </td>
                        <td class="text-center"><?= $order['quantity'] ?></td>
                        <td class="text-end"><?= number_format($order['price']) ?> VNĐ</td>
                        <?php if ($index === 0): ?>
                            <td class="align-middle text-center" rowspan="<?= count($orders) ?>">
                                <?= htmlspecialchars($order['created_at']) ?>
                            </td>
                            <td class="align-middle text-center" rowspan="<?= count($orders) ?>">
                                <?php if($order['status']=='Khách đã nhận được hàng'): ?>
                                    <span class="badge bg-success">Đã nhận hàng thành công!</span>
                                <?php else:?>
                                    <span class="badge bg-warning"><?= htmlspecialchars($order['status']) ?></span>
                                <?php endif; ?>
                                <br>
                                <!-- ĐỔi trạng thái phía usser -->
                                <?php if($order['status']=='Chờ xác nhận'): ?>
                                    <a onclick="return confirm('Xác nhận hủy đơn hàng?')" style="color:white;" href="?act=cancel_order&id=<?= $order['order_id'] ?>"class="mt-3 btn btn-sm btn-danger">Hủy đơn hàng</a>
                                <?php elseif($order['status']=='Đơn hàng đã được giao'): ?>
                                    <a onclick="return confirm('Xác nhận đơn hàng?')" style="color:white;" href="?act=confirm_order&id=<?= $order['order_id'] ?>"class="mt-3 btn btn-sm btn-danger">Đã nhận hàng thành công! </a>
                                <?php endif; ?>
                                
                            </td>
                            <td class="align-middle text-end" rowspan="<?= count($orders) ?>">
                                <?= number_format($order['total_price']) ?> VNĐ
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
} else {
    echo '<div class="alert alert-info text-center">Không có đơn hàng nào.</div>';
}
?>
