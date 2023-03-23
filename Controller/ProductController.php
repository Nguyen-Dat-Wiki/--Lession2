<?php

include_once '../Model/MySQLUtils.php';
include_once '../Model/Upload.php';
include '../Model/Product.php';

class ProductController{

    // Khởi tạo sự kiện post
    public function __construct($action)
    {
        $mySQLCon = new MySQLUtils();

        switch ($action) {
            // sự kiện thêm product
            case 'addProduct':

                // load ảnh vào srouce
                $upload = new Upload();

                // Get link src image
                $linkUrl = $upload->uploadFile($_FILES['product_img']);
                
                // Nếu là chuỗi thì thực thi, return 0 thì trả về hình đã có
                if (is_string($linkUrl)) {

                    // add product vào db
                    $sql = "INSERT INTO products (product_name, product_category_id, product_img) VALUES (:product_name, :product_category_id, :product_img)";
                    $arr = [
                        'product_name' => $_POST['product_name'],
                        'product_category_id' => $_POST['product_category_id'],
                        'product_img' => $linkUrl,
                    ];
                    $mySQLCon->connect();
                    $mySQLCon->insertData($sql, $arr);
                }
                else {
                    echo '<script>alert("Hinh đã có")</script>';
                    break;
                }
                // Trả về index
                Header('Location:../view/Index.php');
                break;

            /* Cập nhật product */
            case 'editProduct':

                // Trường hợp cập nhật hình ảnh
                if (($_FILES['product_img']['name']) != "") {
                    // load ảnh vào srouce
                    $upload = new Upload();

                    // Get link src image
                    $linkUrl = $upload->uploadFile($_FILES['product_img']);

                     // Nếu là chuỗi thì thực thi, return 0 thì trả về hình đã có
                    if (is_string($linkUrl)) {

                        // cập nhật product vào db
                        $sql = "UPDATE products SET product_name = :product_name, product_category_id = :product_category_id, product_img = :product_img where product_id = :product_id";
                        $arr = [
                            'product_id' => $_POST['product_id'],
                            'product_name' => $_POST['product_name'],
                            'product_category_id' => $_POST['product_category_id'],
                            'product_img' => $linkUrl,
                        ];
                        $mySQLCon->connect();
                        $mySQLCon->updateData($sql, $arr);
                    }
                    else {
                        echo '<script>alert("Hinh đã có")</script>';
                        break;
                    }
                }  
                // Trường hợp kh cập nhật hình ảnh 
                else{
                    $sql = "UPDATE products SET product_name = :product_name, product_category_id = :product_category_id where product_id = :product_id";
                    $arr = [
                        'product_id' => $_POST['product_id'],
                        'product_name' => $_POST['product_name'],
                        'product_category_id' => $_POST['product_category_id'],
                    ];
                    $mySQLCon->connect();
                    $mySQLCon->updateData($sql, $arr);
                }
                // chạy hết sự kiện thì trả về index
                Header('Location:../view/Index.php');
                break;


            /* copy product */
            case 'copyProduct':

                // copy thực thi thêm mới 1 product mới nhưng thông tin cũ
                $sql = "INSERT INTO products (product_name, product_category_id, product_img) VALUES (:product_name, :product_category_id, :product_img)";
                $arr = [
                    'product_name' => $_POST['copy_product_name'],
                    'product_category_id' => $_POST['copy_category_id'],
                    'product_img' => $_POST['copy_product_img'],
                ];
                $mySQLCon->connect();
                $mySQLCon->insertData($sql, $arr);
                Header('Location:../view/Index.php');
                break;
        }
    }
}

// đặt tên cho sự kiện post
$action = '';
// nếu có sự kiện post name upload thì gán action bằng sự kiện đó
if (isset($_POST["upload"])) {
    $action = $_POST["upload"];
} 
$post= new ProductController($action);
?>