<div class="container mt-5">
    <h2 class="text-center">Danh sách sản phẩm</h2>
    <div class="mb-3">
        <a href="?act=add_product" class="btn btn-success">Thêm sản phẩm</a>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Mô tả</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $product): ?>
                <tr>
                    <td><?= $product['products_id'] ?></td>
                    <td><?= $product['name_products'] ?></td>
                    <td><?= $product['name_category'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['amount'] ?></td>
                    <td><?= number_format($product['price']) ?> VND</td>
                    <td><img src="<?='../'.$product['img_url'] ?>" alt="Product Image" width="100"></td>
                    <!-- <td><img src="../upload/23-730x408-1.jpg" alt=""></td> -->
                    <td class="text-nowrap "> 
                    <a href="?act=detail_product&id=<?= $product['products_id'] ?>" class="btn btn-info">Chi tiết</a>
                    <a href="?act=edit_product_form&id=<?= $product['products_id'] ?>" class="btn btn-warning">Sửa</a>
                    <a onclick="return confirm('Xác nhận xóa sản phẩm?')" href="?act=delete_product&id=<?= $product['products_id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
