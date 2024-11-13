<div class="container-fluid mt-4">
    <!-- Nút Thêm danh mục -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Quản lý danh mục sản phẩm</h3>
        <button class="btn btn-primary"><i class="fas fa-plus"></i> Thêm danh mục</button>
    </div>

    <!-- Bảng danh sách danh mục -->
    <div class="table-responsive shadow">
        <table class="table table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Danh mục 1: Laptop -->
                <tr>
                    <td>1</td>
                    <td>Laptop</td>
                    <td>120</td>
                    <td>Các dòng laptop của nhiều thương hiệu</td>
                    <td>2024-01-10</td>
                    <td>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Xóa</button>
                    </td>
                </tr>

                <!-- Danh mục 2: Phụ kiện -->
                <tr>
                    <td>2</td>
                    <td>Phụ kiện</td>
                    <td>85</td>
                    <td>Phụ kiện cho laptop và máy tính</td>
                    <td>2024-02-15</td>
                    <td>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Xóa</button>
                    </td>
                </tr>

                <!-- Danh mục 3: Màn hình -->
                <tr>
                    <td>3</td>
                    <td>Màn hình</td>
                    <td>50</td>
                    <td>Các loại màn hình từ nhiều thương hiệu</td>
                    <td>2024-03-22</td>
                    <td>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Xóa</button>
                    </td>
                </tr>

                <!-- Thêm các danh mục khác tại đây -->
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
