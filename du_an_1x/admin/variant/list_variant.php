<div class="container mt-5">
    <h2 class="mb-4 text-center">Danh sách biến thể sản phẩm</h2>
    <?php 
        if(isset($_SESSION['err_deleteV'])){
            echo $_SESSION['err_deleteV'];
            $_SESSION['err_deleteV']='';
        }
    ?>
    <div class="text-end mb-3">
        <a href="?act=add_variant" class="btn btn-primary">Thêm biến thể</a>
    </div>
    <div class="table-responsive shadow bg-light p-3 rounded">
    <table class="table table-hover table-bordered">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>ID_product</th>
                <th>Tên sản phẩm</th>
                <th>RAM</th>
                <th>Giá</th>
                <th style="width:80px;">Số lượng</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_variant as $index => $variant): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $variant['id_product'] ?></td> 
                    <td><?= htmlspecialchars($variant['name_products']) ?></td>
                    <td><?= htmlspecialchars($variant['ram_name']) ?></td>
                    <td><?= number_format($variant['price_variant'], 0, ',', '.') ?> VNĐ</td>
                    <td><?= $variant['amount_variant'] ?></td>
                    <td>
                        <img src="<?= '../'.htmlspecialchars($variant['img_url']) ?>" alt="Hình ảnh sản phẩm" class="img-thumbnail" style="max-width: 100px;">
                    </td>
                    <td class="text-nowrap">
                        <a href="?act=edit_variant&id=<?=$variant['variants_id']?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="?act=delete_variant&id=<?= $variant['variants_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>