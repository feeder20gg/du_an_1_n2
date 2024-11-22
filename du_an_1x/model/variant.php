<?php 
    function selectProductVariants($id) {
        $sql="SELECT products.id as product_id, products.name_products, products.img_url, products.description,
                     VARIANTS.id as variant_id,VARIANTS.id_product, VARIANTS.id_ram, VARIANTS.price_variant, VARIANTS.amount_variant,
                     ram.id as ram_id, ram.name as ram_name
                    --  cpu.id as cpu_id, cpu.name as cpu_name
        FROM VARIANTS inner join products on variants.id_product=products.id
                      inner join ram on  variants.id_ram=ram.id
                    --   inner join cpu on  variants.id_cpu=cpu.id

        where products.id=$id";
        return select_all($sql);
    }

    function select_variant_id($id) {
        $sql="SELECT*FROM variants where id=$id";
        return select_one($sql);
    }

    function check_var($user_id,$variant_id) {
        $sql="SELECT*FROM CARTS WHERE ID_USER=$user_id AND ID_VARIANT=$variant_id";
        return select_one($sql);
    }
    
