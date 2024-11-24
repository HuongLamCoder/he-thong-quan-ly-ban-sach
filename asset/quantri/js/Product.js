// Reset
document.getElementById('openSelectAuthorModalBtn').addEventListener('click', function(e) {
    var selectAuthorModal = new bootstrap.Modal(document.getElementById('selectAuthorModal'));
    selectAuthorModal.show(); // Hiển thị modal chọn tác giả
});

document.getElementById('productModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('productForm').reset();
    let textMessage = document.querySelectorAll('.text-message');
    textMessage.forEach(element => {
        element.textContent = '';
    });
    location.reload();
});

function formValidate(){
    var name = $('#productForm input[name="product-name"]').val();
    var publisher = $('#productForm input[name="product-publisher"]').val();
    var supplier = $('#productForm input[name="product-supplier"]').val();
    var idTG = $('#productForm input[name="product-idTG"]');
    var category = $('#productForm input[name="product-category"]').val();
    var original_price = $('#productForm input[name="product-original-price"]').val();
    var publish_year = $('#productForm input[name="product-publish-year"]').val();
    var weight = $('#productForm input[name="product-weight"]').val();
    var alert = '';
}

$(document).ready(function() {
    $('#upload-img').on('change', function(event) {
        let url = URL.createObjectURL(event.target.files[0]);
        $('#img-preview').attr('src', url);
    });

    const modalTitle = document.getElementById('productModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');
    $('.open_add_form').click(function() {
        modalTitle.textContent = 'Thêm sản phẩm';
        modalSaveBtn.textContent = 'Thêm sản phẩm';
        submit_btn.setAttribute('name', 'action');
        submit_btn.setAttribute('value', 'submit_btn_add');
        document.getElementById('productForm').querySelectorAll('.edit').forEach(element => {
            element.style.display = 'none';
        })
    });

    $('.open_edit_form').click(function () { 
        modalTitle.textContent = 'Chỉnh sửa sản phẩm';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'action');
        submit_btn.setAttribute('value', 'submit_btn_update');
        var discount_id = $(this).closest('tr').find('.product_id').text();
        $.ajax({
            url: '../controller/quantri/ProductController.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'action': 'edit_data',
                'product_id': product_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                $('#discountForm input[name="discount_id"]').val(obj.idMGG);
                $('#discountForm input[name="discount-percent"]').val(obj.phantram);
                $('#discountForm input[name="discount-date-start"]').val(obj.ngaybatdau);
                $('#discountForm input[name="discount-date-end"]').val(obj.ngayketthuc);
            },
        });
    });

    $('#productForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        
        var alert = formValidateDiscount(phantram, ngaybatdau, ngayketthuc);
        if(alert ===''){
            // Serialize form data
            var formData = new FormData( $('#discountForm')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: '../controller/quantri/ProductController.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success){
                        if(obj.btn == 'add'){
                            toast({
                                title: 'Thành công',
                                message: 'Thêm sản phẩm thành công',
                                type: 'success',
                                duration: 3000
                            });
                        } else {
                            toast({
                                title: 'Thành công',
                                message: 'Cập nhật sản phẩm thành công',
                                type: 'success',
                                duration: 3000
                            });
                        }
                    } else {
                        if(obj.btn == 'add'){
                            toast({
                                title: 'Lỗi',
                                message: 'Thêm sản phẩm thất bại',
                                type: 'error',
                                duration: 3000
                            });
                        } else {
                            toast({
                                title: 'Lỗi',
                                message: 'Cập nhật sản phẩm thất bại',
                                type: 'error',
                                duration: 3000
                            });
                        }
                    }
                },
            });
        }
        else {
            // ĐIỀU CHỈNH CODE CHO TỪNG VALIDATE
            toast({
                title: 'Lỗi',
                message: alert,
                type: 'error',
                duration: 3000
            });
        }
    });
});