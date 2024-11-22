<div class="container-fluid mt-4">
    <!-- Nút Thêm danh mục -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Quản lý danh mục sản phẩm</h3>
        <a href="?act=add_category" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm danh mục</a>
    </div>

    <!-- Bảng danh sách danh mục -->
    <div class="table-responsive shadow">
        <table class="table table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Banner</th>
                    <th>Số lượng sản phẩm</th>

                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list_category as $category):?>
                    <tr>
                        <td><?=$category['id']?></td>
                        <td><?=$category['name_category']?></td>
                        <td><?=$category['description_category']?></td>
                        <td><?=$category['img_url_category']?></td>
                        <td><?=count_product($category['id'])?></td>
                        <td>
                        <button class="btn btn-info btn-sm"><i class="fas fa-trash-alt"></i> Chi tiết</button>

                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Xóa</button>
                        </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>

<!-- JavaScript để bật cảnh báo khi nhấn Xóa -->
<script>
    document.querySelectorAll('.btn-danger').forEach(button => {
        button.addEventListener('click', function () {
            if (!confirm('Bạn có chắc chắn muốn xóa danh mục này?')) {
                event.preventDefault();
            }
        });
    });
</script>
