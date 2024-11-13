<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/du_an_1x/lib/bootstrap.min.css">
    <script src="/du_an_1x/lib/bootstrap.bundle.min.js"></script>
    <script src="/du_an_1x/lib/font-fontawesome-ae333ffef2.js"></script>
    <!-- <script src="/mvc-oop-basic/views/admin/lib_admin/angular.min.js"></script>
    <script src="/mvc-oop-basic/views/admin/lib_admin/angular-route.js"></script> -->

    <style>
        .custom-menu-bg {
            background-color: #e0f7fa; 
        }
        th{font-size: 12px;}
    </style>
    



</head>
<body ng-app="myApp">
    <nav class="navbar navbar-expand-sm bg-primary shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="?act=ad_controller">
                <img src="uploads/logo.jpg" style="height: 40px;" alt="Logo">
            </a>
            <ul class="navbar-nav ms-auto me-3">  
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-bell"></i></a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hi!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button> <!-- Icon tìm kiếm -->
            </form>
        </div>
    </nav>

    <div class="d-flex">
        <div class="custom-menu-bg" class="bg-light" style="width: 250px; height: calc(100vh - 56px);">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="?act=ad_product"><i class="fa fa-product-hunt"></i> Quản lí sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?act=ad_category"><i class="fa fa-list"></i> Quản lí danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?act=ad_oder"><i class="fa fa-shopping-cart"></i> Quản lí đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?act=ad_clien"><i class="fa fa-users"></i> Quản lý khách hàng</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!khuyenmai"><i class="fa fa-gift"></i> Quản lý khuyến mại</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!bannermarketing"><i class="fa fa-flag"></i> Quản lý banner marketing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!hoadon"><i class="fa fa-file-invoice"></i> Quản lý hóa đơn, in hóa đơn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"><i class="fa fa-ban"></i> Disabled</a>
                </li>
            </ul>
        </div>
    
        <div class="container mt-3" style="width: calc(100% - 300px);">
            
            <div class="container mt-3">

                <?=$content?>
            </div>
        </div>
        
    </div>
</body>

</html>