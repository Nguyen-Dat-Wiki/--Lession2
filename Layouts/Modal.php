<!-- Add Product -->


<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Thêm sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../Controller/ProductController.php" method='POST' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="menu">Tên sản phẩm</label>
                        <input class="form-control form-control-lg" name="product_name" type="text"
                            placeholder="Tên sản phẩm" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="product_category_id">
                            <?php 
                                /* đổ dữ liệu danh mục vào select */
                                include "../Model/Categogy.php";
                                $category = new Categogy();
                                $selected = $category->selectData();
                                foreach ($selected as $key => $category) {
                                    echo '<option value="'.$category['category_id'] .'">';
                                    echo '    '.$category['category_name'] .'';
                                    echo '</option>';
                                }
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">Ảnh Sản Phẩm</label>
                        <input type="file" name="product_img" value='' class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="upload" value="addProduct" class="btn btn-primary">Thêm sản
                        phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Sửa sản phẩm -->



<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Sửa sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../Controller/ProductController.php" method='POST' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="menu">Tên sản phẩm</label>
                        <input class="form-control form-control-lg" id='product_name' name="product_name" type="text"
                            placeholder="Tên sản phẩm" autocomplete="off">
                        <input type="hidden" name="product_id" id='product_id'>
                    </div>
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" id="product_category_id" name="product_category_id">
                            <?php 
                            /* đổ dữ liệu danh mục vào select */
                            foreach ($selected as $key => $category) {
                                echo '<option class="category_id" value="'.$category['category_id'] .'">';
                                echo '    '.$category['category_name'] .'';
                                echo '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">Ảnh Sản Phẩm</label>
                        <input type="file" name="product_img" value='' id="upload" class="form-control">
                        <img id="product_img" src="" alt="" width="100px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="upload" value="editProduct" class="btn btn-primary">Sửa sản
                        phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- Copy Product -->




<div class="modal fade" id="copyProductModal" tabindex="-1" role="dialog" aria-labelledby="copyModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Sao chép sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../Controller/ProductController.php" method='POST' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="menu">Tên sản phẩm</label>
                        <input class="form-control form-control-lg" id="copy_product_name" readonly="readonly" name="copy_product_name" type="text"
                            placeholder="Tên sản phẩm" autocomplete="off">
                        <input type="hidden" name="product_id" id='copy_product_id'>
                    </div>
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <input class="form-control form-control-lg" type="text" readonly="readonly" value=""  id='copy_category_name' name="copy_category_name">
                        <input class="form-control form-control-lg" type="text" hidden value=""  id='copy_category_id' name="copy_category_id">
                    </div>
                    <div class="form-group">
                        <label for="file">Ảnh Sản Phẩm</label>
                        <input type="text" hidden name="copy_product_img" value='' class="form-control copy_product_img">
                        <img class="copy_product_img" src="" alt="" width="100px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="upload" value="copyProduct" class="btn btn-primary">Sao chép sản
                        phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- xem chi tiet  -->
<div class="modal fade" id="viewProductModal" tabindex="-1" role="dialog" aria-labelledby="viewProductModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Sao chép sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../Controller/ProductController.php" method='POST' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="menu">Tên sản phẩm</label>
                        <input class="form-control form-control-lg" id="copy_product_name" readonly="readonly" name="copy_product_name" type="text"
                            placeholder="Tên sản phẩm" autocomplete="off">
                        <input type="hidden" name="product_id" id='copy_product_id'>
                    </div>
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <input class="form-control form-control-lg" type="text" readonly="readonly" value=""  id='copy_category_name' name="copy_category_name">
                        <input class="form-control form-control-lg" type="text" hidden value=""  id='copy_category_id' name="copy_category_id">
                    </div>
                    <div class="form-group">
                        <label for="file">Ảnh Sản Phẩm</label>
                        <img class="copy_product_img" src="" alt="" width="100px">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






