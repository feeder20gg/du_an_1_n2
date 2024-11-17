<?php 
    session_start();

    include_once 'user/layout/header.php';
    require_once 'model/pdo.php';
    require_once 'model/auth.php';

    $act=isset($_GET['act'])&&$_GET['act']!==''?$_GET['act']: 'home';
    // $act=$_GET['act']||$_GET['act']='' ??'home';
    // echo $act;
    switch($act){
        case 'home':            
            include 'user/home.php';
            break;
        case 'login':
            include 'user/login.php';
            break;
        case 'register':
            include 'user/register.php';
            break;
    
        
    }
    include_once 'user/layout/footer.php';

