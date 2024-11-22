<?php 
    function order_detail($id) {
            $sql="SELECT orders.id_user, orders.pay, orders.total_price, orders.status, orders.user_name, orders.user_address, orders.user_phone, orders.created_at, orders.updated_at,
                        order_detail.id_variant,order_detail.quantity,order_detail.price,
                        products.name_products,products.img_url, ram.name
            FROM orders inner join order_detail on orders.id=order_detail.id_order
                        inner join variants on order_detail.id_variant=variants.id
                        inner join products on variants.id_product=products.id
                        inner join ram on variants.id_ram=ram.id
            where orders.id =$id";
        return select_all($sql);
              
    }
    function select_order() {
        $sql="SELECT*FROM ORDERS";
        return select_all($sql);
    }
    function select_infoUser($id) {
        $sql="SELECT*FROM USERS WHERE ID=$id";  
        return select_one($sql);
    }
    
    // function add_order($a,$b,$c,$d,$e,$f,$g){
    //     $sql="INSERT INTO orders(id_user, pay, total_price, status, user_name, user_address, user_phone)
    //           VALUES ($a,'$b',$c,'$d','$e','$f',$g)";
    //     pdo_excute($sql);
    //     $conn = connect();
    //     return $conn->lastInsertId();
    // }
    function add_order($a, $b, $c, $d, $e, $f, $g) {
        $conn = connect();
        if ($conn) {
            $sql = "INSERT INTO orders (id_user, pay, total_price, status, user_name, user_address, user_phone)
                    VALUES ($a, '$b', $c, '$d', '$e', '$f', $g)";
                    pdo_excute($sql);
    
            $sql_get_id = "SELECT id FROM orders WHERE id_user = $a ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql_get_id);
            $row = $result->fetch(PDO::FETCH_ASSOC);
    
            return $row['id']; 
        }
        return false;
    }
    
    function add_order_detail($a, $b,$c,$d) {
        $sql="INSERT INTO order_detail(id_order, id_variant, quantity, price)
              VALUES ($a, $b,$c,$d)";
        pdo_excute($sql);

    }

    // function pdo_get_last_insert_id() {
    //     $conn = connect();
    //     return $conn->lastInsertId();
    // }

    