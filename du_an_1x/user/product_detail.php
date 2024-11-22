<div class="container product-detail">
    <div class="mt-5 row">
        <div class="col-md-6">
            <img style="width:500px;" 
                 src="<?= htmlspecialchars($list_variant[0]['img_url']) ?>" 
                 alt="<?= htmlspecialchars($list_variant[0]['name_products']) ?>" 
                 class="product-image">
        </div>

        <div class="col-md-6">
            <h2><?= htmlspecialchars($list_variant[0]['name_products']) ?></h2>

            <p class="text-danger h4">Giá: <?= number_format($list_variant[0]['price_variant'], 0, ',', '.') ?> VNĐ</p>

            <div class="mb-3">
                <label for="ram">Dung lượng RAM:</label>
                <select id="ram" class="form-select">
                    <?php 
                    foreach ($list_variant as $variant): ?>
                        <option value="<?= htmlspecialchars($variant['variant_id']) ?>" data-ram-id="<?= htmlspecialchars($variant['ram_id']) ?>" data-price="<?= htmlspecialchars($variant['price_variant']) ?>" data-quantity="<?= htmlspecialchars($variant['amount_variant']) ?>">
                            <?= htmlspecialchars("RAM: {$variant['ram_name']} | Giá: " . number_format($variant['price_variant']) . " VNĐ | Số lượng: {$variant['amount_variant']}") ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" class="form-control" value="1">
                <!-- <small id="quantity-error" class="text-danger" style="display:none;">Số lượng bạn chọn vượt quá số lượng có sẵn!</small> -->
            </div>
            <?php 
                if(isset($_SESSION['err_cart'])){
                    echo $_SESSION['err_cart'];
                    $_SESSION['err_cart']=null;
                }
                if(isset($_SESSION['err_cart_2'])){
                    echo $_SESSION['err_cart_2'];
                    $_SESSION['err_cart_2']=null;
                }
            ?>
            <form action="?act=cart" method="POST" onsubmit="return validateQuantity()">

                <input type="hidden" name="variant_id" id="variant-id" value="<?= htmlspecialchars($list_variant[0]['variant_id']) ?>">
                <input type="hidden" name="ram_id" id="ram-id" value="<?= htmlspecialchars($list_variant[0]['ram_id']) ?>">
                <input type="hidden" name="quantity" id="quantity-id" value="1">
                <input type="hidden" name="product_id" id="product_id" value="<?= htmlspecialchars(trim($list_variant[0]['product_id'])) ?>">

                <button type="submit" name="submit" value="submit" class="btn btn-primary mb-2">Thêm vào giỏ hàng</button>
            </form>
            
            <h5>Thông tin sản phẩm:</h5>
            <ul>
                <li>ID sản phẩm: <?= htmlspecialchars($list_variant[0]['product_id']) ?></li>
                <li>Mô tả: <?= htmlspecialchars($list_variant[0]['description']) ?></li>
                <li>Tổng số lượng còn lại: <?= array_sum(array_column($list_variant, 'amount_variant')) ?></li>
            </ul>
        </div>
    </div>
</div>

<script>
document.getElementById('ram').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    document.getElementById('variant-id').value = selectedOption.value;  // Cập nhật variant_id
    document.getElementById('ram-id').value = selectedOption.getAttribute('data-ram-id'); // Cập nhật ram_id
    document.getElementById('quantity-id').value = document.getElementById('quantity').value; // Cập nhật quantity nếu có thay đổi
});

document.getElementById('quantity').addEventListener('input', function() {
    document.getElementById('quantity-id').value = this.value;
});

// function validateQuantity() {
//     // Lấy số lượng đã chọn và số lượng có sẵn của biến thể
//     var quantity = parseInt(document.getElementById('quantity').value);
//     var selectedOption = document.getElementById('ram').options[document.getElementById('ram').selectedIndex];
//     var availableQuantity = parseInt(selectedOption.getAttribute('data-quantity'));

//     // Kiểm tra nếu số lượng vượt quá số lượng tồn kho
//     if (quantity > availableQuantity) {
//         // Hiển thị thông báo lỗi và không gửi biểu mẫu
//         document.getElementById('quantity-error').style.display = 'block';
//         return false; // Dừng việc gửi biểu mẫu
//     }

//     // Nếu số lượng hợp lệ, ẩn thông báo lỗi và gửi biểu mẫu
//     document.getElementById('quantity-error').style.display = 'none';
//     return true;
// }
</script>
