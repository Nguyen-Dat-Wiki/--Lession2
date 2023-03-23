<?php 


class product_content{


    /* show product */
    public function showProduct($products, $limit , $content,$page){

        /* tính phần bù */
        $record_index = ($page - 1) * $limit;

        /* Lấy các sản phẩm dựa theo tìm kiếm  */
        $selected = $products->selectDataLimitPage($record_index, $limit,$content);
        /* show product */
        foreach ($selected as $product) {
            echo '<tr>';
            echo '    <td class="" hidden>'. $product['product_id']  .'</td>';
            echo '    <th scope="row">'. $product['product_id'] .'</th>';
            echo '    <td>'. $product['product_name'].'</td>';
            echo '    <td>'. $product['category_name'].'</td>';
            echo '    <td><img src="'. $product['product_img'] .'" width="150px" alt=""></td>';
            echo '    <td>';
            echo '        <i id="addProduct" class="fa fa-edit fa-lg btn-add" data-toggle="modal" data-target="#addProductModal"></i>';
            echo '        <i id="editProduct" class="fa fa-minus-circle fa-lg btn-edit" data-toggle="modal" data-target="#editProductModal"></i>';
            echo '        <i id="copyProduct" class="fa fa-copy fa-lg btn-copy" data-toggle="modal" data-target="#copyProductModal"></i>';
            echo '        <i id="viewProduct" class="fa fa-eye fa-lg btn-view" data-toggle="modal" data-target="#viewProductModal"></i>';
            echo '    </td>';
            echo '    <td class="" hidden>'. $product['category_id']  .'</td>';
            echo '</tr>';
        }
    }
    /* show nav */
    public function show_nav($page,$total_pages){

        /* tổng số btn có thể hiện trong thanh navigation */
        $temp = (int)$total_pages / 3;

        /* tổng page > 1 thì hiện, kh thì kh cần hiện */
        if($total_pages > 1){
            for ($i = 1; $i <= $total_pages; $i++) {

                /* nếu page = 1 thì kh cần hiện btn để lùi page */
                if ($page == 1) {
                    echo '<ul class="pagination">';
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == 1) {
                            echo '<li><a class="btn btn-success active" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                        } else if ($i <= 5) {
                            echo '<li><a class="btn btn-primary" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                        } else if ($i = $total_pages) {
                            echo '<li><a class="btn btn-primary" href="index.php?page=' . ($page + 1) . '">...</a></li>';
                        }
                    };

                    echo '<li><a href="index.php?page=' . ($page + 1) . '" class="btn btn-primary">next</a></li>';
                    echo '</ul>';
                } 
                else {
                    echo '<ul class="pagination">';

                    /* Ẩn các page phía trước 1 đơn vị, page 3 thì chỉ hiển thị page 2 và 4 */
                    echo '<li><a href="index.php?page=' . ($page - 1) . '" class="btn btn-primary">Previous</a></li>';

                    for ($i = $page - 2; $i <= $total_pages; $i++) {
                        if ($i == 0) {
                            echo 'Lỗi';
                        }
                        /* khi page >= 2 thì hiện các btn page sau   */
                        else if ($i <= $total_pages - ($temp++ - $page)) {
                            if ($i == $page) {
                                echo '<li><a class="btn btn-success active" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                            } else {
                                echo '<li><a class="btn btn-primary" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                            }
                        }
                        else if ($i = $total_pages) {
                            echo '<li><a class="btn btn-primary" href="index.php?page=' . ($page + 1) . '">...</a></li>';
                        }
                    };
                    /* Nếu page hiện tại < tổng page thì hiện btn tăng, kh thì kh hiện */
                    if ($page < $total_pages) 
                        echo '<li><a href="index.php?page=' . ($page + 1) . '" class="btn btn-primary" >NEXT</a></li>';
                    echo '</ul>';
                }
            }
        }
    }
    
}


?>