<div class="container mt-2">

            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                </div>
              
                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="upload/banner_new1.jpg" alt="Los Angeles" class="d-block w-100">
                  </div>
                  <div class="carousel-item">
                    <img src="upload/banner_new2.jpg" alt="Chicago" class="d-block w-100">
                  </div>
                </div>
            </div>
        </div>
<main class="container">
    <!-- Phần Hero Banner -->
    <div class="hero">
        <h1 class="mt-3">Chào mừng đến với Laptop Central!</h1>
        <p>Khám phá các sản phẩm laptop và phụ kiện chất lượng cao.</p>
        <!-- <a href="#!khuyenmai" class="btn btn-warning">Xem khuyến mãi</a> -->
    </div>

    <h2 class="category-title">Danh mục sản phẩm</h2>
    <div class="row mb-4">
    <?php foreach ($list_category as $category): ?>
        <div class="col-md-4">
            <div class="category-card">
                <!-- Hiển thị tên danh mục -->
                <h4><?= htmlspecialchars($category['name_category']); ?></h4>
                
                <!-- Hiển thị hình ảnh -->
                <img style="height: 180px;" 
                     src="upload/<?= htmlspecialchars($category['img_url_category']); ?>" 
                     class="img-fluid" 
                     alt="<?= htmlspecialchars($category['name_category']); ?>">
                
                <p><?= htmlspecialchars($category['description_category']); ?></p>
                
                <a href="?act=search&id=<?=$category['id']?>" 
                   class="btn btn-primary">Khám phá</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    <main class="container my-5">
    <h2 class="category-title text-center mb-4">Sản phẩm mới nhất</h2>
    <div class="row g-4">
        <?php foreach ($list_product as $product): ?>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <img style="" src="<?= $product['img_url'] ?>" class="card-img-top" alt="<?= $product['name_products'] ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-truncate name-limited" title="<?= $product['name_products'] ?>">
                        <?= $product['name_products'] ?>
                    </h5>
                    <p class="card-text text-muted description-limited" title="<?= $product['description'] ?>">
                        <?= $product['description'] ?>
                    </p>
                    <p class="text-danger fw-bold mb-3">Giá: <?= number_format($product['price']) ?> VNĐ</p>
                    <a href="?act=product_detail&id=<?= $product['products_id'] ?>" class="btn btn-primary mt-auto">
                        Xem chi tiết
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>



    <!-- Phần Sản phẩm nổi bật -->
    <!-- <h2 class="category-title">Sản phẩm nổi bật</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="product-card">
                <img src="uploads/lenovo-ideapad-slim-3-15amn8-r5-82xq00j0vn-thumb-600x600.jpg" class="card-img-top" alt="Laptop 1">
                <h5 class="card-title">Laptop Dell XPS 13</h5>
                <p class="card-text">Màn hình 13.3 inch, Intel Core i7, RAM 16GB, SSD 512GB.</p>
                <p class="text-danger">Giá: 25.000.000 VNĐ</p>
                <a href="?act=product_detail" class="btn btn-primary">Xem chi tiết</a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="product-card">
                <img src="uploads/lenovo-ideapad-slim-3-15amn8-r5-82xq00j0vn-thumb-600x600.jpg" class="card-img-top" alt="Laptop 2">
                <h5 class="card-title">Laptop HP Spectre x360</h5>
                <p class="card-text">Màn hình 13.3 inch, Intel Core i7, RAM 16GB, SSD 1TB.</p>
                <p class="text-danger">Giá: 30.000.000 VNĐ</p>
                <a href="?act=product_detail" class="btn btn-primary">Xem chi tiết</a>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="product-card">
                <img src="uploads/lenovo-ideapad-slim-3-15amn8-r5-82xq00j0vn-thumb-600x600.jpg" class="card-img-top" alt="Laptop 3">
                <h5 class="card-title">Laptop ASUS ROG Zephyrus G14</h5>
                <p class="card-text">Màn hình 14 inch, AMD Ryzen 9, RAM 32GB, SSD 1TB.</p>
                <p class="text-danger">Giá: 40.000.000 VNĐ</p>
                <a href="?act=product_detail" class="btn btn-primary">Xem chi tiết</a>
            </div>
        </div>
    </div> -->

    <!-- Phần Đánh giá khách hàng -->
    <h2 class="category-title">Đánh giá khách hàng</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="testimonial">
                <p>"Tôi rất hài lòng với laptop tôi đã mua ở đây. Chất lượng tuyệt vời!"</p>
                <p><strong>- Nguyễn Văn A</strong></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial">
                <p>"Dịch vụ khách hàng rất tốt và sản phẩm giao hàng nhanh chóng."</p>
                <p><strong>- Trần Thị B</strong></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial">
                <p>"Rất nhiều lựa chọn tốt với mức giá hợp lý. Tôi sẽ quay lại!"</p>
                <p><strong>- Lê Văn C</strong></p>
            </div>
        </div>
    </div>

    <!-- Phần Thương hiệu nổi bật -->
    <h2 class="category-title">Thương hiệu nổi bật</h2>
    <div class="row brand-logos">
        <div class="col-2"><img src="upload/2_logo_dell_73317f8e0f.png" alt="Brand 1"></div>
        <div class="col-2"><img src="upload/5_logo_hp_ff12ba7fcb.png" alt="Brand 2"></div>
        <div class="col-2"><img src="upload/9_logo_acer_e50fcdd1b5.png" alt="Brand 3"></div>
        <div class="col-2"><img src="upload/133_logo_apple_a96d38701f.png" alt="Brand 4"></div>
        <div class="col-2"><img src="upload/10_logo_msi_951916b801.png" alt="Brand 5"></div>
        <div class="col-2"><img src="upload/4_logo_lenovo_327abc091e.png" alt="Brand 6"></div>
    </div>
</main>
