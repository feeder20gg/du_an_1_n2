<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <script src="lib/bootstrap.bundle.min.js"></script>
    <script src="lib/font-fontawesome-ae333ffef2.js"></script>
</head>
<style>
     th {
        vertical-align: middle;  
        text-align: center;      
    }
     .name-limited {
        font-size: 1rem; 
        font-weight: bold;
        display: -webkit-box;
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
        min-height: 2.4rem; /* Đảm bảo chiều cao cố định để đồng bộ */
    }

    /* Giới hạn chiều cao và số dòng của mô tả sản phẩm */
    .description-limited {
        font-size: 0.9rem;
        color: #6c757d;
        display: -webkit-box;
        -webkit-line-clamp: 2; /* Tối đa 2 dòng */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
        min-height: 2.4rem; /* Đảm bảo chiều cao cố định để đồng bộ */
    }

    /* Đảm bảo tất cả thẻ card có chiều cao đồng nhất */
    .card {
        display: flex;
        flex-direction: column;
    }

    .card-body {
        flex-grow: 1; /* Đẩy nội dung nút xuống cuối */
    }

    .card-title,
    .card-text {
        margin-bottom: 0.5rem; /* Khoảng cách giữa các phần */
    }
        /* .hero {
            background-image: url('/img/hero-banner.jpg');
            background-size: cover;
            height: 400px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 30px;
        } */
        .category-card {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }
        .category-card:hover {
            transform: scale(1.05);
        }
        .testimonial {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }
        .brand-logos img {
            width: 100px;
            margin: 10px;
        }

        .registration-form {
    max-width: 600px;
    margin: 20px auto;
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #f8f9fa;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng */
    transition: box-shadow 0.3s ease; /* Hiệu ứng chuyển tiếp khi hover */
}

.registration-form:hover {
    box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2); /* Tăng cường hiệu ứng đổ bóng khi hover */
}

h2 {
    margin-bottom: 20px;
    color: #007bff;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}
.login-form {
    max-width: 500px;
    margin: 20px auto;
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #f8f9fa;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng */
    transition: box-shadow 0.3s ease; /* Hiệu ứng chuyển tiếp khi hover */
}

.login-form:hover {
    box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2); /* Tăng cường hiệu ứng đổ bóng khi hover */
}

h2 {
    margin-bottom: 20px;
    color: #007bff;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.text-center a {
    color: #007bff;
    text-decoration: none;
}

.text-center a:hover {
    text-decoration: underline;
}


    </style>
<body>
    <header>
        <div class="container-fluid ">
            <div class="container">
                <div class="row">
                    <div class="col-2 mt-2">
                        <div class="bg-light rounded d-flex justify-content-center align-items-center "
                            style="width: 100px; height: 60px;">
                            <img src="upload/logo.png" alt="" class="mh-100 mw-100 ">
                        </div>
                    </div>
                    <div class="col-4 mt-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" class="form-control" placeholder="Từ khóa tìm kiếm"
                                aria-label="Từ khóa tìm kiếm" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-6  mt-3">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="fs-2 text-primary "><i class="fa-solid fa-phone"></i></div>
                                    </div>
                                    <div class="col-9">
                                        Tư vấn<br>
                                        <strong class="text-primary ">0123456789</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
    <div class="row">
        <div class="col-3">
            <div class="fs-2 text-primary"><i class="fa-regular fa-user"></i></div>
        </div>
        <div class="col-9">
            <?php
            if (isset($_SESSION['name_user'])) {
                $name_user = $_SESSION['name_user'];
                echo "<p class=' text-success'>Hi, $name_user</strong>".'<br>';
                echo "<a href='?act=logout' class='text-decoration-none text-danger'>Đăng xuất</a>";
            } else {
                echo "<a href='?act=login' class='text-decoration-none text-primary '>Đăng nhập</a>".'<br>';
                echo "<a href='?act=register' class='text-decoration-none text-secondary'>Đăng ký</a>";
            }
            ?>
        </div>
    </div>
</div>

                            <div class="col-4 ">
                                <div class="d-flex justify-content-end ">
                                    <button class="btn position-relative">
                                    <?php
                                        $count=0;
                                        if(isset($_SESSION['id_user'])){
                                            $count=countTypeCart((int)$_SESSION['id_user'])['count'];
                                        }
                                        ?>
                                        <a href="?act=cart_detail"><i class="fa-solid fa-cart-shopping fa-2xl"></i></a>
                                        <span class="badge bg-primary  rounded-pill position-absolute top-0 end-0 "><?=$count?></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-primary mt-2  ">
            <div class="container bg-primary">
                <nav class="navbar navbar-expand-lg  ">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link text-white " href="?act=home">Trang chủ</a>
                                </li>
                                <!-- <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle text-white " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      Danh mục
                                    </a>
                                    <ul class="dropdown-menu text-decoration-underline text-primary">
                                      <li><a class="dropdown-item" href="?act=cart">Giỏ Hàng</a></li>
                                      <li><a class="dropdown-item" href="#!trangchu">Sản Phẩm mới nhất</a></li>
                                      <li><a class="dropdown-item" href="#!timtheodanhmuc">Tìm kiếm theo danh mục</a></li>

                                      <li><a class="dropdown-item" href="#">Sale 20%</a></li>
                                    </ul>
                                </li> -->
                                <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Danh mục
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
        $listAllCategory=list_category();
         foreach ($listAllCategory as $category): ?>
            <li>
                <a class="dropdown-item" href="?act=search&id=<?php echo $category['id']; ?>">
                    <?php echo $category['name_category']; ?>
                </a>    
            </li>
        <?php endforeach; ?>
    </ul>
</li>

                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Giới thiệu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Liên hệ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Tin tức</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="?act=order_list">Đơn hàng đã đặt</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>