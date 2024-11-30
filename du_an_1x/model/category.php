<?php 
    function list_category(): array {
        $sql="SELECT*FROM CATEGORIES";
        $value=select_all($sql);
        return $value;
    }
    function count_product($id){
        $sql="SELECT COUNT(*) FROM PRODUCTS WHERE ID_CATEGORY=$id";
        return select_one($sql)['COUNT(*)'];
    }

    function add_category($a, $b, $c) {
        $sql="INSERT INTO CATEGORIES(name_category,description_category,img_url_category)
        VALUES ('$a', '$b', '$c') ";
        pdo_excute($sql);
        //
    }
    function showCategories() {
        $sql="SELECT*FROM CATEGORIES order by id asc limit 3";
        $value=select_all($sql);
        return $value;
    }