<?php 
    function list_category() {
        $sql="SELECT*FROM CATEGORIES";
        $value=select_all($sql);
        return $value;
    }