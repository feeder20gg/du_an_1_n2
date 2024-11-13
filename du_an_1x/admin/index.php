<?php 
    include_once '../model/pdo.php';

    $act=isset($_GET['act'])&&$_GET['act']!==''?$_GET['act']: 'ad_controller';
    // $act=$_GET['act']||$_GET['act']='' ??'home';
    // echo $act;

    ob_start();
    switch($act){
        case 'categories':
            include 'category/list_category.php';
            break;
        case 'ad_controller':
            $sql="SELECT*FROM USERS WHERE role='user'";
            $value=select_one($sql);
            print_r($value);
            include_once 'ad_controller.php';
    }
    $content=ob_get_clean();

    require_once 'layout_admin/layout.php';
