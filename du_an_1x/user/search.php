<div class="row g-4">
        <?php foreach ($value as $product): ?>
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