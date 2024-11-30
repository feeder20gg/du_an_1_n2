<div class="container mt-5">
    <h2 class="text-center mb-4">Thêm danh mục mới</h2>
    <form action="?act=add_category" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        <div class="mb-3">
            <label for="name_category" class="form-label">Tên danh mục:</label>
            <input type="text" name="name_category" id="name_category" class="form-control" placeholder="Nhập tên danh mục" required>
        </div>

        <div class="mb-3">
            <label for="description_category" class="form-label">Mô tả:</label>
            <textarea name="description_category" id="description_category" class="form-control" rows="4" placeholder="Nhập mô tả"></textarea>
        </div>

        <div class="mb-3">
            <label for="img_url_category" class="form-label">Hình ảnh:</label>
            <input type="file" name="img_url_category" id="img_url_category" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="?act=list_category" class="btn btn-secondary">Quay lại</a>
            <button type="submit" name="btn" class="btn btn-success">Thêm danh mục</button>
        </div>
    </form>
</div>
