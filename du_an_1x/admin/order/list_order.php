<div class="container mt-5">
        <h2 class="mb-4">Danh Sách Đơn Hàng</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Người Dùng</th>
                    <th>Phương Thức Thanh Toán</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Thời Gian Tạo</th>
                    <th>Thời Gian Cập Nhật</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_cart as $order) { ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['pay']); ?></td>
                        <td><?php echo number_format($order['total_price'], 0, ',', '.'); ?> VND</td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($order['created_at'])); ?></td>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($order['updated_at'])); ?></td>
                        <td class="text-nowrap">
                            <a href="?act=detail_order&id=<?php echo $order['id']; ?>" class="btn btn-info btn-sm">Chi Tiết</a>
                            <a href="edit_order.php?id=<?php echo $order['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="delete_order.php?id=<?php echo $order['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')">Xóa</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>