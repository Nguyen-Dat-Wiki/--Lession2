<?php 

class Navigation{
    public $page;
    public $total_pages;
    public function __construct($page,$total_pages)
    {
        
    }
}
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

$show_nav = new Navigation($page,$total_pages);
?>