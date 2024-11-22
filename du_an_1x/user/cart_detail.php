<div class="container mt-5">
        <h1 class="mb-4 text-center">Giỏ Hàng</h1>

        <?php if (!empty($list_cart) && count($list_cart) > 0): ?>
            <?php $total_all = 0;?>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Hình Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Ram</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Tiền</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_cart as $index => $item): ?>
                        <?php 
                            $total = $item['price_variant'] * $item['amount_buy']; 
                            $total_all += $total; // Cộng dồn tổng tiền
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
                            <td>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" href="?act=delete_item&id=<?php echo $item['variant_id']; ?>" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" class="text-end fw-bold">Tổng Cộng:</td>
                        <td colspan="2" class="text-start fw-bold"><?php echo number_format($total_all, 0, ',', '.'); ?> VND</td>
                    </tr>
                </tfoot>
            </table>
        <?php else: ?>
            <p class="text-center">Giỏ hàng của bạn đang trống!</p>
        <?php endif; ?>

        <div class="d-flex justify-content-end mt-4">
            <a href="?act=home" class="btn btn-secondary">Tiếp Tục Mua Sắm</a>
            <a href="?act=info_order" class="btn btn-success ms-3">Đặt hàng</a>
        </div>
    </div>