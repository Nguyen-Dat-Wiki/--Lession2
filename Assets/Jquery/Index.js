$(document).ready(function() {
    
    /* bắt sự kiện click edit*/
    $('.btn-edit').on('click', function() {

        $('#editProductModal').modal('show');

        // bắt form tr tại vị trí đó    
        $tr = $(this).closest('tr');

        var data_edit = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        // đổ dữ liệu vào input 
        data_edit[3]=$tr.children("td").children("img").attr('src');
        $('#product_id').val(data_edit[0]);  
        $('#product_name').val(data_edit[1]);
        $("#product_category_id").val(data_edit[5]).change();
        $('#category_id').val(data_edit[2]);
        $('#product_img').attr('src',data_edit[3]);
    });
    /* bắt sự kiện click copy*/
    $('.btn-copy').on('click', function() {

        $('#copyProductModal').modal('show');

        // bắt form tr tại vị trí đó    
        $tr = $(this).closest('tr');

        var data_copy = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        data_copy[3]=$tr.children("td").children("img").attr('src');

        /* đổ dữ liệu khi copy vào pop-up */
        show_data(data_copy);
    }); 
    /* bắt sự kiện click xem*/
    $('.btn-view').on('click', function() {

        $('#viewProductModal').modal('show');

        // bắt form tr tại vị trí đó    
        $tr = $(this).closest('tr');

        var data_copy = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        data_copy[3]=$tr.children("td").children("img").attr('src');

        /* đổ dữ liệu khi xem vào pop-up */
        show_data(data_copy);
    }); 
});


// func đổ dữ liệu
function show_data(data_copy) {
    
    $('input[name=copy_product_id]').val(data_copy[0]);  
    $('input[name=copy_product_name]').val(data_copy[1]);
    $('input[name=copy_category_name]').val(data_copy[2]);
    $('.copy_product_img').attr('src',data_copy[3]);
    
    // gửi request
    $('input[name=copy_product_img]').val(data_copy[3]);
    $('#copy_category_id').val(data_copy[5]);
}