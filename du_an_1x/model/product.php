<?php 
    function search($id) {
        $sql="SELECT products.id as products_id,
            name_products,img_url,description,amount,price,id_category
            FROM PRODUCTS where id_category=$id";
        $list=select_all($sql);
        return $list;
    }
    function list_product() {
        $sql="SELECT categories.id as category_id, products.id as products_id, name_category,
            name_products,img_url,description,amount,price,id_category
            FROM PRODUCTS INNER JOIN CATEGORIES on products.id_category=categories.id";
        $list=select_all($sql);
        return $list;
    }   
    function showProducts(){
        $sql="SELECT products.id as products_id,
            name_products,img_url,description,amount,price
            FROM PRODUCTS order by id desc limit 4";
        $list=select_all($sql);
        return $list;
    }
    function add_product($a,$b,$c,$e,$f,$g){
        $sql="INSERT INTO PRODUCTS(name_products,img_url,description,amount,price,id_category)
        VALUES ('$a','$b','$c',$e,$f,$g)";
        pdo_excute($sql);
    }

    function select_product($id) {
        $sql="SELECT*FROM PRODUCTS WHERE id=$id";
        $value= select_one($sql);
        return $value;
    }

    function update_product($id,$a,$b,$c,$e,$f,$g) {
        $sql="UPDATE PRODUCTS SET name_products ='$a',img_url='$b',description='$c',amount=$e,price=$f,id_category=$g
            WHERE id=$id";
        pdo_excute($sql);
    }

    function delete_product($id) {
        $sql="DELETE FROM PRODUCTS WHERE id=$id";
        pdo_excute($sql);
    }

?>