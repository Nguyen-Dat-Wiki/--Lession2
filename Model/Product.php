<?php

include_once '../Model/MySQLUtils.php';
class Product{
    /* select data có page */
    public function selectDataLimitPage($record_index, $limit,$content=''){
        $mySQLCon = new MySQLUtils();
        $mySQLCon->connect();
        // nếu kh có content search thì lấy tất cả theo page có limit
        if ($content == '') {
            $sql = "SELECT * from products,categorys 
                where products.product_category_id = categorys.category_id 
                Group by product_id 
                LIMIT $record_index, $limit";
        }
        // lấy tất cả product có content search theo name product hoặc name category
        else{
            $sql = "SELECT * from products,categorys 
                where products.product_category_id = categorys.category_id 
                and (products.product_name LIKE '%$content%' OR categorys.category_name LIKE '%$content%') 
                Group by product_id 
                LIMIT $record_index, $limit";
        }
        $select = $mySQLCon->getAllData($sql);
        return $select;
    }
    // lấy chi tiết 1 sản phẩm
    public function selectDetail($id){
        $mySQLCon = new MySQLUtils();
        $mySQLCon->connect();
        $sql = "SELECT * from products where product_id=$id";
        $select = $mySQLCon->getAllData($sql);
        return $select;
    }

    // đếm tất cả product có trong db để phục vụ func chia page 
    public function countProduct(){
        $mySQLCon = new MySQLUtils();
        $mySQLCon->connect();
        $sql = "SELECT COUNT(*) as TongProduct FROM products"; 
        $select = $mySQLCon->getAllData($sql);
        return $select;
    }
}
?>