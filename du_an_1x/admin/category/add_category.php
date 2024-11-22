<h3>Thêm danh mục</h3>
<form action="?act=add_category" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name_category" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="name_category" name="name_category" placeholder="Nhập tên danh mục" required>
                        </div>

                        <div class="mb-3">
                            <label for="description_category" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="description_category" name="description_category" rows="3" placeholder="Nhập mô tả danh mục" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="img_url_category" class="form-label">Ảnh banner</label>
                            <input type="file" class="form-control" id="img_url_category" name="img_url_category" accept="image/*" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="btn" value="btn" class="btn btn-success">
                                <i class="fas fa-plus"></i> Thêm danh mục
                            </button>
                        </div>
                    </form>