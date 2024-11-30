<div class="container mt-5">
    <h2 class="text-center mb-4">Danh sách danh mục</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Quản lý danh mục</h3>
        <a href="?act=add_category" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm danh mục
        </a>
    </div>

    <div class="table-responsive shadow bg-light p-3 rounded">
        <table class="table table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_category as $category): ?>
                    <tr>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['name_category'] ?></td>
                        <td><?= $category['description_category'] ?></td>
                        <td>
                            <img src="../upload/<?= $category['img_url_category'] ?>" alt="Hình ảnh" class="img-thumbnail" style="width: 100px;">
                        </td>
                        <td>
                            <a href="?act=edit_category&id=<?= $category['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a href="?act=delete_category&id=<?= $category['id'] ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
