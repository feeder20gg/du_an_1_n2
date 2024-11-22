<?php 
    function select_cart($user_id) {
        $sql="SELECT carts.id_user,carts.amount_buy,
                     variants.price_variant,variants.id as variant_id,
                     products.name_products,products.img_url, ram.name as ram_name
              from carts inner join variants on carts.id_variant=variants.id
                         inner join products on variants.id_product=products.id
                         inner join ram on variants.id_ram=ram.id
              where id_user=$user_id";
        return select_all($sql);
    }
    function addCart($a,$b,$c) {
        $sql="INSERT INTO CARTS (id_user, id_variant, amount_buy)
              Values($a,$b,$c) ";
        pdo_excute($sql);
    }

    function add_alike_cart($user_id,$variant_id, $amount_buy) {
        $sql="UPDATE carts SET AMOUNT_BUY=$amount_buy where id_user=$user_id and id_variant=$variant_id";
        pdo_excute($sql);
    }
    function delete_item($user_id,$id) {
        $sql="DELETE FROM CARTS WHERE id_user=$user_id and id_variant=$id";
        pdo_excute($sql);
    }

    function clear_cart($id_user) {
        $sql="DELETE FROM CARTS WHERE id_user=$id_user";
        pdo_excute($sql);
    }