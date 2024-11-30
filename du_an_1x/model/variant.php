<?php 
    function check_variant($id) {
        $sql="SELECT COUNT(*) as count FROM order_detail where id_variant=$id";
        return select_one($sql);
    }
    function deleteVariant($id) {
        $sql="DELETE FROM VARIANTS WHERE ID=$id";
        pdo_excute($sql);
    }
    function editVariant($id,$a,$b,$c,$d) {
        $sql="UPDATE VARIANTS SET id_product=$a, id_ram=$b, price_variant=$c, amount_variant=$d
            WHERE ID=$id";
        pdo_excute($sql);
    }
    function addVariant($a,$b,$c,$d) {
        $sql="INSERT INTO VARIANTS (id_product, id_ram, price_variant, amount_variant)
            VALUES ($a,$b,$c,$d)";
        pdo_excute($sql);
    }
    function getVariantForId($id) {
        $sql="SELECT*FROM VARIANTS WHERE ID=$id";
        return select_one($sql);
    }
    function getInfoProduct() {
        $sql="SELECT PRODUCTS.ID AS product_id,products.name_products from products ";
        return $value=select_all($sql);
    }
    function getInfoRam() {
        $sql="SELECT ram.ID AS ram_id,ram.name as ram_name from ram";
        return $value=select_all($sql);
    }
    function getAllVariant() {
        $sql="SELECT variants.id as variants_id, variants.id_product, variants.id_ram, variants.price_variant, variants.amount_variant,
                     products.id as products_id, products.name_products, products.img_url,
                     ram.id as ram_id, ram.name as ram_name 
            FROM VARIANTS INNER JOIN PRODUCTS ON variants.id_product=PRODUCTS.ID
                 INNER JOIN RAM ON variants.id_RAM=RAM.ID order by products.id asc";
        return $value=select_all($sql);
    }
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

    
    
