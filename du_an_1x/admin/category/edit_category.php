<div class="container mt-5">
    <h2 class="text-center mb-4">Chỉnh sửa danh mục</h2>
    <form action="?act=edit_category&id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        <div class="mb-3">
            <label for="name_category" class="form-label">Tên danh mục:</label>
            <input type="text" name="name_category" id="name_category" class="form-control" value="<?= $category['name_category'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="description_category" class="form-label">Mô tả:</label>
            <textarea name="description_category" id="description_category" class="form-control" rows="4"><?= $category['description_category'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="img_url_category" class="form-label">Hình ảnh hiện tại:</label><br>
            <img src="../upload/<?= $category['img_url_category'] ?>" alt="Hình ảnh danh mục" class="img-thumbnail mb-3" style="width: 150px;">
        </div>

        <div class="mb-3">
            <label for="img_url_category" class="form-label">Chọn ảnh mới:</label>
            <input type="file" name="img_url_category" id="img_url_category" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="?act=list_category" class="btn btn-secondary">Quay lại</a>
            <button type="submit" name="btn" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>
