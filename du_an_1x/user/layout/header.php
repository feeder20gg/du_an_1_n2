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
<body ng-app="myApp">
    <header>
        <div class="container-fluid ">
            <div class="container">
                <div class="row">
                    <div class="col-2 mt-2">
                        <div class="bg-light rounded d-flex justify-content-center align-items-center "
                            style="width: 100px; height: 60px;">
                            <img src="uploads/logo.jpg" alt="" class="mh-100 mw-100 ">
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
                            <div class="col-4 ">
                                <div class="row">
                                    <div class="col-3 ">
                                        <div class="fs-2 text-primary"><i class="fa-regular fa-user"></i></div>
                                    </div>
                                    <div class="col-9">
                                        Xin chào!<br>
                                        <a href="?act=login" class="text-decoration-none text-primary ">Đăng nhập</a>
                                        <a href="?act=register" class="text-decoration-none text-secondary ">Đăng ký</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 ">
                                <div class="d-flex justify-content-end ">
                                    <button class="btn position-relative">
                                        <a href="?act=cart"><i class="fa-solid fa-cart-shopping fa-2xl"></i></a>
                                        <span
                                            class="badge bg-primary  rounded-pill position-absolute top-0 end-0 ">0</span>
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
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle text-white " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      Danh mục
                                    </a>
                                    <ul class="dropdown-menu text-decoration-underline text-primary">
                                      <li><a class="dropdown-item" href="?act=cart">Giỏ Hàng</a></li>
                                      <li><a class="dropdown-item" href="#!trangchu">Sản Phẩm mới nhất</a></li>
                                      <li><a class="dropdown-item" href="#!timtheodanhmuc">Tìm kiếm theo danh mục</a></li>

                                      <li><a class="dropdown-item" href="#">Sale 20%    </a></li>
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
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        

    </header>