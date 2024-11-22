<?php
    ob_start();
    require_once 'model/pdo.php';
    require_once 'model/auth.php';
    require_once 'model/product.php';
    require_once 'model/variant.php';
    require_once 'model/cart.php';
    require_once 'model/info_order.php';


    
    session_start();
    include_once 'user/layout/header.php';

    $act=isset($_GET['act'])&&$_GET['act']!==''?$_GET['act']:'home';
    // $act=$_GET['act']||$_GET['act']='' ??'home';
    // echo $act;
    switch($act){
        case 'order':
            if (isset($_POST['submit'])) {
                $id_user = (int) $_SESSION['id_user'];
                $total_price = (int) $_POST['total_price'];
                $fullname = $_POST['fullname'];
                $phone = (int) $_POST['phone'];
                $address = $_POST['address'];
                $cart = $_POST['cart'];
        
                // Bước 1: Thêm thông tin vào bảng orders
                $id_order =add_order($id_user, 'Ship COD', $total_price, 'Chờ xác nhận', $fullname, $address, $phone);
        
                // Bước 2: Lấy id_order vừa tạo
                // $id_order =  pdo_get_last_insert_id();
                // if (!$id_order) {
                //     die("Lỗi: Không thể lấy ID của đơn hàng vừa tạo.");
                // }
        
                // Bước 3: Thêm chi tiết vào bảng order_detail
                foreach ($cart as $item) {

                    $variant_id = (int) $item['variant_id'];
                    $price = (int) $item['price'];
                    $quantity = (int) $item['quantity'];
                    if ($id_order > 0) {
                        add_order_detail($id_order, $variant_id, $quantity, $price);
                        clear_cart($id_user);
                    } 
                }
        
                // Chuyển hướng hoặc hiển thị thông báo thành công
                header("Location: ?act=home");
                exit;
            }
            break;
        case 'info_order':
            if(isset($_SESSION['id_user'])){
                $user_id=(int) $_SESSION['id_user'];
                $list_cart=select_cart($user_id);
                $info_user=select_infoUser($user_id);
                print_r($info_user);
                
            }
            include 'user/info_order.php';
            break;
        case 'delete_item':
            if(isset($_SESSION['id_user'])&&$_GET['id']){
                $user_id=(int)$_SESSION['id_user'];
                $id=$_GET['id'];
                delete_item($user_id,$id);
                header('location: ?act=cart_detail');
            }
            break;
        case 'cart_detail':
            if(isset($_SESSION['id_user'])){
                $user_id=(int) $_SESSION['id_user'];
                $list_cart=select_cart($user_id);
                print_r($list_cart);
            }else{
                $_SESSION['err_cart']= '<h3 style= "color:red; font-weight: bold;">Đăng nhập để thêm sản phẩm vào giỏ hàng</h3>';
                header('location:?act=login');
            }
            include 'user/cart_detail.php';
            break;
        case 'cart':
            if(isset($_SESSION['id_user'])&& $_POST['submit']){
                // print_r($_POST);
                $user_id=(int) $_SESSION['id_user'];
                $amount_buy=(int) $_POST['quantity'];
                $variant_id=(int) $_POST['variant_id'];
                $product_id=$_POST['product_id'];
                $amount_storage=select_variant_id($variant_id)['amount_variant'];
                
                if($amount_buy<=$amount_storage){
                    if($value=check_var($user_id,$variant_id)){
                        $total_amount_buy=(int) $value['amount_buy']+$amount_buy ;
                        if($total_amount_buy<=$amount_storage){
                            add_alike_cart($user_id,$variant_id,$total_amount_buy);
                            header('location:?act=cart_detail');
                        }else{
                            $_SESSION['err_cart_2']='<p style= "color:red; font-weight: bold;">Số lượng sản phẩm trong giỏ hàng và mới thêm vượt quá số lượng có sẵn!</p>';
                            header('location: ?act=product_detail&id='.$product_id);
                        }

                    }else{addCart($user_id,$variant_id,$amount_buy);
                        header('location:?act=cart_detail');}

                }else{
                    $_SESSION['err_cart']='<p style= "color:red; font-weight: bold;">Số lượng sản phẩm vượt quá số lượng có sẵn!</p>';
                    header('location: ?act=product_detail&id='.$product_id);
                }
            }else{
                $_SESSION['err_cart']= '<h3 style= "color:red; font-weight: bold;">Đăng nhập để thêm sản phẩm vào giỏ hàng</h3>';
                header('location:?act=login');
            }
            break; 
        case 'home':            
            // header('location:index.php?act=login');
            $list_product=list_product();
            // print_r($list_product);
            include 'user/home.php';
            break;
        case 'product_detail':
            // selectProductVariants();
            if(isset($_GET['id'])){
                $id= (int) $_GET['id'];
                $list_variant=selectProductVariants($id);
                print_r($list_variant);
            }
            include 'user/product_detail.php';

            break;
        //Dang nhap tai khoan
        case 'logout':
            logout_user();
            break;
        case 'login':
            if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $pass = $_POST['pass'];
            
                if(check_login_user($email, $pass)){
                    $value = check_login_user($email, $pass);
                    $_SESSION['name_user'] = $value['name'];
                    $_SESSION['id_user'] = $value['id'];
                    
                    // Điều hướng
                    header('location:index.php');
                    exit;
                } else {
                    echo "<p class='text-danger text-center'>Đăng nhập thất bại. Vui lòng thử lại.</p>";
                }
            }
                include 'user/login.php';
    
                break;
            
            // Dang ki tai khoan
        case 'register':
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $role = 'user';
                $address = $_POST['address'];
                $phone_number = (int) $_POST['phone_number'];
                $user_img = 'img';
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $check = true;
            
                // Kiểm tra đầu vào
                if ($name == '' || $role == '' || $address == '' || $phone_number == '' || $email == '' || $pass == '') {
                    echo 'Nhập đầy đủ thông tin';
                    $check = false;
                } elseif (!ctype_digit($_POST['phone_number'])) {
                    echo 'Sai số điện thoại';
                    $check = false;
                }
        
                // Thêm dữ liệu nếu kiểm tra thành công
                if ($check) {
                    $sql = "INSERT INTO USERS (name, role, address, phone_number, user_img, email, pass)
                            VALUES ('$name', '$role', '$address', '$phone_number', '$user_img', '$email', '$pass')";
                    pdo_excute($sql);
            
                    // Chuyển hướng 
                    header('Location: ?act=login');
                    // exit();                    
                    }
            }
            include 'user/register.php';
            break;
    }
 include_once 'user/layout/footer.php';
 ob_end_flush(); 
 ?>

