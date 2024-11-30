<?php 
    session_start();
    include_once '../model/pdo.php';
    include_once '../model/auth.php';
    include_once '../model/product.php';
    include_once '../model/category.php';
    include_once '../model/info_order.php';
    include_once '../model/variant.php';


    if(!isset($_SESSION['name_admin'])||$_SESSION['name_admin']==''){
        header('location:login_admin.php');
    }
                                                                                                                                                                                                                                                                    
    $act=isset($_GET['act'])&&$_GET['act']!==''?$_GET['act']: 'ad_controller';
    // $act=$_GET['act']||$_GET['act']='' ??'home';
    // echo $act;

    ob_start();
    switch($act){
        case 'delete_order':
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                cancel_order($id);
                header('location:?act=list_order');
            }
            break;
        case 'edit_order':
            if($_SERVER['REQUEST_METHOD']=='POST'){
                var_dump($_POST);
                $order_id = (int) $_POST['order_id'];
                $status = $_POST['status'];
                edit_status($order_id,$status);
                header('location:?act=list_order');
            }
            break;
        case 'detail_order':
            if(isset($_GET['id'])){
                $id=(int)$_GET['id'];
                $value=order_detail($id);
                print_r($value);
            }
            include 'order/detail_order.php';
            break;
        case'list_order':
            $list_cart=select_order();
            print_r($list_cart);
            include 'order/list_order.php';
            break;
        // case 'list_category':
        //     $list_category=list_category();
        //     print_r(count_product(5));
        //     include 'category/list_category.php';
        //     break;
        // case 'add_category':
        //     if(isset($_POST['btn'])){
        //         // print_r($_POST);
        //         $name_category=$_POST['name_category'];
        //         $description_category=$_POST['description_category'];
        //         $img_name=$_FILES['img_url_category']['name'];
        //         echo $img_name;
        //     }

        //     include 'category/add_category.php';
        //     break;
        case 'delete_variant':
            if(isset($_GET['id'])){
                $id=(int)$_GET['id'];
                $count=(check_variant($id))['count'];
                if($count==0){
                    deleteVariant($id);
                    header('location:?act=list_variant');
                }else{
                    header('location:?act=list_variant');
                    $_SESSION['err_deleteV']="san pham nay van con trong don hang";
                }
                
            }
            break;
        case 'list_variant':
            $list_variant=getAllVariant();
            print_r($list_variant);
            include 'variant/list_variant.php';
            break;
        case 'edit_variant':
            if(isset($_GET['id'])){
                $id=(int) $_GET['id'];
                $infoProduct=getInfoProduct();
                $infoRam=getInfoRam();
                $variant=getVariantForId($id);
                if(isset($_POST['submit'])){
                    print_r($_POST);
                    $id_product=(int) $_POST['id_product'];
                    $id_ram=(int)$_POST['id_ram'];
                    $price_variant=(int)$_POST['price_variant'];
                    $amount_variant=(int)$_POST['amount_variant'];
                    $check=true;


                    if($id_product==''||$id_ram==''||$price_variant==''||$amount_variant==''){
                        $check=false;
                    }
                    if($check==true){
                        editVariant($id, $id_product,$id_ram,$price_variant,$amount_variant);
                        header('location:?act=list_variant');
                    }
                }
            }
            include 'variant/edit_variant.php';

            break;
        case 'add_variant':
            $infoProduct=getInfoProduct();
            $infoRam=getInfoRam();
            if(isset($_POST['submit'])){
                print_r($_POST);
                $id_product=(int) $_POST['id_product'];
                $id_ram=(int)$_POST['id_ram'];
                $price_variant=(int)$_POST['price_variant'];
                $amount_variant=(int)$_POST['amount_variant'];
                $check=true;
                if($id_product==''||$id_ram==''||$price_variant==''||$amount_variant==''){
                    $check=false;
                }
                if($check==true){
                    addVariant($id_product,$id_ram,$price_variant,$amount_variant);
                    header('location:?act=list_variant');
                }
            }

            include 'variant/add_variant.php';
            break;

        case 'delete_product':
            if(isset($_GET['id'])){
                $id= (int) $_GET['id'];
                $value=select_product($id);
                
                unlink('../'.$value['img_url']);
                delete_product($id);

                header('location: ?act=list_product');
            }
            break;
        case 'detail_product':
            if(isset($_GET['id'])){
                $id = (int)$_GET['id'];
                $value=select_product($id);
                $value['img_url'];
                $list_category = list_category();
            }
            include 'product/detail_product.php';
            break;
        case 'edit_product_form':
            if(isset($_GET['id'])){
                $id = (int)$_GET['id'];
                $value=select_product($id);
                $list_category = list_category();

                if(isset($_POST['submit'])){
                    $id_category= $_POST['id_category'];
                    $name_products= $_POST['name_products'];
                    $description= $_POST['description'];
                    $amount= $_POST['amount'];
                    $price= $_POST['price'];

                    $img_url_old=$value['img_url'];
                    $img_url_new='upload/'.$_FILES['img_url']['name'];

                    $img_file_upload='../'.$img_url_new;

                    $img_url_data;
                    if(empty($_FILES['img_url']['name'])){
                        $img_url_data=$value['img_url'];
                    }else{
                        if(move_uploaded_file($_FILES['img_url']['tmp_name'],$img_file_upload)){
                            $img_url_data=$img_url_new;
                            unlink('../'.$value['img_url']);
                        }
                    }
                    $check=true;
                    $_SESSION['err_product']='';
                    if($name_products==''||$img_url_data==''||$description==''||$amount==''||$price==''||$id_category==''){
                        $_SESSION['err_product']='<h3 style="color:red; font-weight: bold;">Nhập đầy đủ thông tin</h3>';
                        $check=false;
                    }elseif($amount<0||$price<0){
                        $_SESSION['err_product_int']='<br> <h5 style="color:red; font-weight: bold;">Giá và số lượng > 0</h5>';
                        $check=false;
                    }

                    if($check==true){
                    update_product($id,$name_products,$img_url_data,$description,$amount,$price,$id_category);
                    header('location:?act=list_product');
                    }
                }
            }
            
            include 'product/edit_product.php';
            break;
            case 'list_category':
                $list_category=list_category();
                print_r(count_product(5));
                include 'category/list_category.php';
                break;
                case 'add_category':
                    if (isset($_POST['btn'])) {
                        $name_category = $_POST['name_category'];
                        $description_category = $_POST['description_category'];
                        
                        // Upload file ảnh
                        if (isset($_FILES['img_url_category']) && $_FILES['img_url_category']['error'] == 0) {
                            $upload_dir = __DIR__ . '/../upload/';
                            $img_name = basename($_FILES['img_url_category']['name']);
                            $upload_path = $upload_dir . $img_name;
                
                            if (move_uploaded_file($_FILES['img_url_category']['tmp_name'], $upload_path)) {
                                // Thêm danh mục vào cơ sở dữ liệu
                                add_category($name_category, $description_category, $img_name);
                                
                            } else {
                                echo 'Lỗi: Không thể tải ảnh lên.';
                            }
                        } else {
                            echo 'Lỗi: Chưa chọn ảnh.';
                        }
                    }
                    include 'category/add_category.php';
                    break;
                
                    case 'edit_category':
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $category = select_one("SELECT * FROM categories WHERE id = $id");
                    
                            if (isset($_POST['btn'])) {
                                $name_category = $_POST['name_category'];
                                $description_category = $_POST['description_category'];
                    
                                // Upload ảnh mới nếu có
                                if (isset($_FILES['img_url_category']) && $_FILES['img_url_category']['error'] == 0) {
                                    $upload_dir = __DIR__ . '/../upload/';
                                    $img_name = basename($_FILES['img_url_category']['name']);
                                    $upload_path = $upload_dir . $img_name;
                    
                                    if (move_uploaded_file($_FILES['img_url_category']['tmp_name'], $upload_path)) {
                                        $img_url = $img_name;
                                    } else {
                                        echo 'Lỗi: Không thể tải ảnh lên.';
                                    }
                                } else {
                                    $img_url = $category['img_url_category']; // Giữ ảnh cũ nếu không thay đổi
                                }
                    
                                // Cập nhật cơ sở dữ liệu
                                $sql = "UPDATE categories SET name_category = '$name_category', 
                                                              description_category = '$description_category', 
                                                              img_url_category = '$img_url' 
                                        WHERE id = $id";
                                pdo_excute($sql);
                                header("Location: ?act=list_category");
                            }
                        }
                        include 'category/edit_category.php';
                        break;
                        case 'delete_category':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $category = select_one("SELECT * FROM categories WHERE id = $id");
                        
                                // Xóa file ảnh
                                $upload_dir = __DIR__ . '/../upload/';
                                if (file_exists($upload_dir . $category['img_url_category'])) {
                                    unlink($upload_dir . $category['img_url_category']);
                                }
                        
                                // Xóa danh mục trong cơ sở dữ liệu
                                $sql = "DELETE FROM categories WHERE id = $id";
                                pdo_excute($sql);
                        
                                header("Location: ?act=list_category");
                            }
                            break;    
        case'list_product':
            $list=list_product();
            // print_r($list);
            include 'product/list_product.php';
            break;
        case 'add_product':
            $list_category=list_category();
            if(isset($_POST['submit'])){
                $name_products=$_POST['name_products'];
                // $img_url=$_POST['img_url'];
                $description=$_POST['description'];
                $amount=(int)$_POST['amount'];
                $price= (int)$_POST['price'];
                $id_category=(int) $_POST['id_category'];
                $check=true;
                $img_url=$_FILES['img_url'];

                $img_namefile='../upload/'.basename($img_url['name']);
                $img_data=substr( $img_namefile,3);
                // echo $img_url['tmp_name'];
                $check=true;
                    $_SESSION['err_product']='';
                    if($name_products==''||$_FILES['img_url']['name']==''||$description==''||$amount==''||$price==''||$id_category==''){
                        $_SESSION['err_product']='<h3 style="color:red; font-weight: bold;">Nhập đầy đủ thông tin</h3>';
                        $check=false;
                    }elseif($amount<0||$price<0){
                        $_SESSION['err_product_int']='<br> <h5 style="color:red; font-weight: bold;">Giá và số lượng > 0</h5>';
                        $check=false;
                    }
                    if($check==true){
                    if(move_uploaded_file($img_url['tmp_name'],$img_namefile)){
                        add_product($name_products,$img_data,$description,$amount,$price,$id_category);
                        header('location:?act=list_product');
                    }
                    }
                
                // var_dump($img_url);
                // if($name_products==''||$img_url==''||$description==''||$amount==''||$price==''||$id_category==''){

                // }
            }
            include 'product/add_product.php';
            break;
        case 'logout':
            logout_admin();
            header('location:login_admin.php');
            break;
        case 'categories':
            include 'category/list_category.php';
            break;
        case 'ad_controller':
            $sql="SELECT*FROM USERS WHERE role='user'";
            $value=select_one($sql);
            include_once 'ad_controller.php';
        
    }
    $content=ob_get_clean();

    require_once 'layout_admin/layout.php';


    