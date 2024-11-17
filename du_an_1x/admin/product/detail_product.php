<div class="container mt-5">
    <h2 class="text-center">Chi tiết Sản Phẩm</h2>

    <form>
        <div class="form-group">
            <label for="name_category">Danh mục sản phẩm:</label>
            <select name="id_category" class="form-control" disabled>
                <option value="">--Chọn danh mục--</option>
                <?php foreach ($list_category as $category): ?>
                    <option disabled value="<?= $category['id'] ?>" <?= ($value['id_category'] == $category['id']) ? 'selected' : '' ?>>
                        <?= $category['name_category'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="name_products">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name_products" id="name_products" value="<?= $value['name_products'] ?>" disabled>
        </div>

        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" name="description" id="description" rows="3" disabled><?= $value['description'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="amount">Số lượng:</label>
            <input type="number" class="form-control" name="amount" id="amount" value="<?= $value['amount'] ?>" disabled>
        </div>

        <div class="form-group">
            <label for="price">Giá sản phẩm:</label>
            <input type="number" class="form-control" name="price" id="price" value="<?= $value['price'] ?>" disabled>
        </div>

        <div class="form-group">
            <label for="img_url">Ảnh sản phẩm:</label>
                <img src="../<?= $value['img_url'] ?>" alt="Ảnh sản phẩm: " style="width: 300px; margin-top: 10px;">
            </div>
        </div>
        <div class="form-group text-center mb-3 mt-2">
        <a href="?act=edit_product_form&id=<?= $value['id'] ?>" class="btn btn-warning">Sửa sản phẩm</a>
        <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" href="?act=delete_product&id=<?= $product['products_id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
        </div>
    </form>
</div>
