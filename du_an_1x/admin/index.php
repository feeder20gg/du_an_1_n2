<?php 
    include_once '../model/pdo.php';
    include_once '../model/auth.php';
    include_once '../model/product.php';
    include_once '../model/category.php';

    $act=isset($_GET['act'])&&$_GET['act']!==''?$_GET['act']: 'ad_controller';
    // $act=$_GET['act']||$_GET['act']='' ??'home';
    // echo $act;

    ob_start();
    switch($act){
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


    