<!DOCTYPE html>
<html lang="en">

<head>
    <!-- lấy head, JQuery, model cần thiết -->
    <?php 
        include '../Layouts/Head.php';
        include "../Model/Product.php";
        include '../Layouts/pages/product_content.php';
        include '../Layouts/JQuery.php';
        $products = new Product();
        $product_content = new product_content();
    ?>
    <title>Product</title>
    
</head>

<body>
    <div class="container border p-5">
        
        <!-- Header Menu - icon - search -->
        <?php include '../Layouts/Header.php' ?>

        <!-- khung nội dung -->
        <section class="box">
            <div class="box_content">

                <table class="table border">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody class="card-td">
                        <?php
                            /* Giới hạn 1 trang bao nhiêu */
                            $limit = 5;
                            /* lấy content tìm kiếm (nếu có thì tìm kiếm content còn kh thì lấy toàn bộ) */
                            $content = (isset($_GET['search']) && !empty($_GET['search'])) ? $_GET['search'] : '' ;

                            /* lấy tổng số sản phẩm */
                            $retval1 = $products->countProduct();

                            /* tính tổng số trang cho tổng số sản phẩm dựa theo số giới hạn 1 trang */
                            $total_pages = ceil($retval1[0]['TongProduct'] / $limit);

                            /* Lấy giá trị page hiện tại */
                            (int)$page = (isset($_GET["page"])) ? $_GET['page'] : 1;
                            $product_content->showProduct($products, $limit , $content,$page);
                        ?>
                    </tbody>
                </table>

                <!-- Page nav  -->
                <div class="paganation d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <?php
                            $product_content->show_nav($page,$total_pages);
                        ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </div>


    <?php include '../Layouts/Modal.php' ?>
</body>

</html>