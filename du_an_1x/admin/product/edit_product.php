<div class="container mt-5">
    <h2 class="text-center">Edit Sản Phẩm</h2>

    <form action="?act=edit_product_form&id=<?= $value['id'] ?>" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="name_category">Danh mục sản phẩm:</label>
            <select name="id_category" class="form-control" >
                <option value="">--Chọn danh mục--</option>
                <?php foreach ($list_category as $category): ?>
                    <option value="<?= $category['id'] ?>" <?= ($value['id_category'] == $category['id']) ? 'selected' : '' ?>>
                        <?= $category['name_category'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="name_products">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name_products" id="name_products" value="<?= $value['name_products'] ?>" >
        </div>
        
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" name="description" id="description" rows="3" ><?= $value['description'] ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="amount">Số lượng:</label>
            <input type="number" class="form-control" name="amount" id="amount" value="<?= $value['amount'] ?>" >
        </div>
        <?php if(isset($_SESSION['err_product_int'])){
            echo $_SESSION['err_product_int'];
        } ?>
        <div class="form-group">
            <label for="price">Giá sản phẩm hiển thị:</label>
            <input type="number" class="form-control" name="price" id="price" value="<?= $value['price'] ?>" >
        </div>
        
        <div class="form-group">
            <label for="img_url">Ảnh sản phẩm:</label>
            <input type="file" class="form-control" name="img_url" id="img_url">
            <small>Nếu không chọn ảnh mới, ảnh cũ sẽ được giữ nguyên.</small>
            <div>
                <img src="../<?= $value['img_url'] ?>" alt="Ảnh sản phẩm" style="width: 100px; margin-top: 10px;">
            </div>
        </div>
        <?php
            if(isset($_SESSION['err_product'])){
                echo $_SESSION['err_product'];
            }
        ?>
        <div class="form-group text-center mt-3 mb-3">
            <button type="submit" name="submit" value="submit" class="btn btn-primary" onclick="return confirm('Xác nhận sửa sản phẩm?')">Cập nhật sản phẩm</button>
        </div>
    </form>
</div>
