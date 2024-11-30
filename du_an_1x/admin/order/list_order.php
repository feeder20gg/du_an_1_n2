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
                    <td>
                        <!-- Form chứa dropdown cho việc thay đổi trạng thái -->
                        <form action="?act=edit_order" method="POST" style="display:inline;">
                            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                            <select name="status" class="form-control" style="width: auto; display: inline-block;" onchange="this.form.submit()">
                                <option value="Đã hủy đơn" <?php echo ($order['status'] == 'Đã hủy đơn') ? 'selected' : ''; ?>>Đã hủy đơn</option>
                                <option value="Chờ xác nhận" <?php echo ($order['status'] == 'Chờ xác nhận') ? 'selected' : ''; ?>>Chờ xác nhận</option>
                                <option value="Đã xác nhận" <?php echo ($order['status'] == 'Đã xác nhận') ? 'selected' : ''; ?>>Đã xác nhận</option>
                                <option value="Đang giao hàng" <?php echo ($order['status'] == 'Đang giao hàng') ? 'selected' : ''; ?>>Đang giao hàng</option>
                                <option value="Đơn hàng đã được giao" <?php echo ($order['status'] == 'Đơn hàng đã được giao') ? 'selected' : ''; ?>>Đơn hàng đã được giao</option>
                                <option value="Khách đã nhận được hàng" <?php echo ($order['status'] == 'Khách đã nhận được hàng') ? 'selected' : ''; ?>>Khách đã nhận được hàng</option>
                            </select>
                        </form>
                    </td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($order['created_at'])); ?></td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($order['updated_at'])); ?></td>
                    <td class="text-nowrap">
                        <a href="?act=detail_order&id=<?php echo $order['id']; ?>" class="btn btn-info btn-sm">Chi Tiết</a>
                        <a href="?act=delete_order&id=<?php echo $order['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?')">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
