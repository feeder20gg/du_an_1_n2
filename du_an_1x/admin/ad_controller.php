<body>
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Thống kê nhanh -->
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h5 class="card-title">Tổng sản phẩm</h5>
                    <h3>250</h3>
                    <p class="card-text"><i class="fas fa-boxes"></i> Số lượng sản phẩm hiện có</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h5 class="card-title">Doanh thu tháng</h5>
                    <h3>$12,000</h3>
                    <p class="card-text"><i class="fas fa-dollar-sign"></i> Doanh thu tháng này</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    <h5 class="card-title">Đơn hàng mới</h5>
                    <h3>58</h3>
                    <p class="card-text"><i class="fas fa-shopping-cart"></i> Đơn hàng cần xử lý</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <h5 class="card-title">Phản hồi mới</h5>
                    <h3>15</h3>
                    <p class="card-text"><i class="fas fa-comments"></i> Phản hồi của khách hàng</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ và bảng -->
    <div class="row">
        <!-- Biểu đồ doanh thu -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5>Biểu đồ doanh thu</h5>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" width="100%" height="50"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Bảng thống kê đơn hàng -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    <h5>Đơn hàng gần đây</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Đơn hàng #1023 - $300 - Đã giao</li>
                        <li class="list-group-item">Đơn hàng #1022 - $150 - Đang xử lý</li>
                        <li class="list-group-item">Đơn hàng #1021 - $450 - Đã hủy</li>
                        <li class="list-group-item">Đơn hàng #1020 - $700 - Đã giao</li>
                        <li class="list-group-item text-center"><a href="#">Xem tất cả</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript: Script cho biểu đồ doanh thu (Chart.js) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('revenueChart').getContext('2d');
    var revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6'],
            datasets: [{
                label: 'Doanh thu',
                data: [3000, 4000, 3200, 5000, 4200, 5500],
                backgroundColor: 'rgba(0, 123, 255, 0.2)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>