<div class="container mt-5">
    <h2 class="mb-4 text-center">Thêm biến thể sản phẩm</h2>
    <form action="?act=add_variant" method="POST">
        <div class="mb-3">
            <label for="id_product" class="form-label">Chọn sản phẩm</label>
            <select class="form-select" id="id_product" name="id_product" required>
                <option value="">-- Chọn sản phẩm --</option>
                <?php foreach ($infoProduct as $product): ?>
                    <option value="<?= $product['product_id'] ?>"><?= 'ID:'. htmlspecialchars($product['product_id']).'| Tên sản phẩm:'. htmlspecialchars($product['name_products']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_ram" class="form-label">Chọn RAM</label>
            <select class="form-select" id="id_ram" name="id_ram" required>
                <option value="">-- Chọn RAM --</option>
                <?php foreach ($infoRam as $ram): ?>
                    <option value="<?= $ram['ram_id'] ?>"><?= htmlspecialchars($ram['ram_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="price_variant" class="form-label">Giá biến thể</label>
            <input type="number" class="form-control" id="price_variant" name="price_variant" placeholder="Nhập giá" min="0" required>
        </div>

        <div class="mb-3">
            <label for="amount_variant" class="form-label">Số lượng</label>
            <input type="number" class="form-control" id="amount_variant" name="amount_variant" placeholder="Nhập số lượng" min="0" required>
        </div>

        <div class="text-center">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Thêm biến thể</button>
            <a href="?act=list_variant" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
