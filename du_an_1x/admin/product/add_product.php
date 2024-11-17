<div class="container mt-5">
    <h2 class="text-center">Thêm Sản Phẩm</h2>

    <form action="?act=add_product" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name_category">Danh mục sản phẩm:</label>
            <select name="id_category" class="form-control" name="" id="">
            <option >--Chọn danh mục--</option>
                <?php foreach ($list_category as $value):?>
                    <option value="<?=$value['id']?>"><?=$value['name_category']?></option>
                <?php endforeach;?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="name_products">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name_products" id="name_products" >
        </div>
        
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" name="description" id="description" rows="3" ></textarea>
        </div>
        
        <div class="form-group">
            <label for="amount">Số lượng:</label>
            <input type="number" class="form-control" name="amount" id="amount" >
        </div>
        <?php if(isset($_SESSION['err_product_int'])){
            echo $_SESSION['err_product_int'];
        } ?>
        <div class="form-group">
            <label for="price">Giá sản phẩm:</label>
            <input type="number" class="form-control" name="price" id="price" >
        </div>
        
        <div class="form-group">
            <label for="img_url">Ảnh sản phẩm:</label>
            <input type="file" class="form-control" name="img_url" id="img_url" >
        </div>
        <?php
            if(isset($_SESSION['err_product'])){
                echo $_SESSION['err_product'];
            }
        ?>
        <div class="form-group text-center">
            <button type="submit" name="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </div>
    </form>
</div>