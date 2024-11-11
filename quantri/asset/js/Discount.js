// Reset
document.getElementById('discountModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('discountForm').reset();
    let textMessage = document.querySelectorAll('.text-message');
    textMessage.forEach(element => {
        element.textContent = '';
    });
    location.reload();
});

// Function to check and update discount status daily
function validDateUpdateDiscountDaily(curr_status, ngaybatdau, ngayketthuc) {
    var curr_date = new Date();
    var start = ngaybatdau;
    var end =  ngayketthuc;
    start.setHours(0, 0, 0, 0);
    end.setHours(0, 0, 0, 0);
    curr_date.setHours(0,0,0,0);  
    let status =''; 
    if (curr_status == 'huy') {
        status = 'huy';
    } else if (curr_date < start) {
        status = 'cdr';
    } else if (curr_date >= start && curr_date <= end) {
        status = 'hd';
    } else if (curr_date > end) {
        status = 'hh';
    }
    return status;
}
function updateDiscountstatusDaily() {
    // Set interval to run this check every 24 hours (86400000 milliseconds)
    setInterval(() => {
        // Loop through each discount and update status
        $('.discount_row').each(function() {
            const discountId = $(this).find('.discount_id').text();
            let start = new Date($(this).find('.discount_start_date').text());
            let end = new Date($(this).find('.discount_end_date').text());
            
            // Check the current status class
            const currentstatusClass = $(this).find('.discount_status').attr('class').split(' ').find(className => ['hd', 'cdr', 'huy', 'hh'].includes(className));
            const classStatusElement = $(this).find('.discount_status');
            var status = validDateUpdateDiscountDaily(currentstatusClass, start, end);

            // Only update the status if it has changed
            if (currentstatusClass !== status) {
                classStatusElement.removeClass('hh cdr huy hd');
                classStatusElement.addClass(status);
                
                // Send AJAX request to update the status in the database
                $.ajax({
                    url: 'controller/Discount.php',
                    type: 'POST',
                    data: {
                        'update_status': true,
                        'discount_id': discountId,
                        'status': status,
                    },
                    success: function(response) {
                        console.log(response);
                        // const obj = JSON.parse(response);
                    }
                });
            }
        });
    }, 86400000); // Run every 24 hours 
}
// Function to check and update discount status daily

/* function validate discount form */
function formValidateDiscount(phantram, ngaybatdau, ngayketthuc) {
    //Kiểm tra hợp lệ
    let alert = '';
    var curr_date = new Date();
    //phantram

    if(phantram < 0 || phantram>100 || isNaN(phantram)) {   //nếu tên rỗng
        alert = "<span class='red'>Phần trăm không hợp lệ</span>";
        return alert;
    }

    //thoi gian
    let start = new Date(ngaybatdau);
    let end = new Date(ngayketthuc);
    start.setHours(0, 0, 0, 0);
    end.setHours(0,0,0,0);
    curr_date.setHours(0,0,0,0);    

    if(ngaybatdau == "" || ngayketthuc == ""){
        alert = "<span class='red'>Thời gian không để trống!</span>";
        return alert;
    }

    if(start <= curr_date){
        alert = "<span class='red'>Thời gian bắt đầu không được nhỏ hơn ngày hiện tại!</span>";
        return alert;
    }

    if(ngaybatdau >= ngayketthuc){
        alert = "<span class='red'>Thời gian kết thúc không nhỏ hơn thời gian bắt đầu!</span>";
        return alert;
    }

    return alert;
}
/* function validate discount form */
// ------------------------------------------------------------------------------------

/* add-data form */
$(document).ready(function() {
    updateDiscountstatusDaily();
    const modalTitle = document.getElementById('discountModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');
    /* Start: add form */
    $('.open_add_form').click(function() {
        modalTitle.textContent = 'Thêm mã giảm giá';
        modalSaveBtn.textContent = 'Thêm mã giảm giá';
        submit_btn.setAttribute('name', 'submit_btn_add');
   });
    /* End: add form */

    /* Start: edit form */
    $('.open_edit_form').click(function(e) {
        e.preventDefault();

        var discount_id = $(this).closest('tr').find('.discount_id').text();
        modalTitle.textContent = 'Sửa mã giảm giá';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'submit_btn_update');
        $.ajax({
            url: 'controller/Discount.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'edit_data': true,
                'discount_id': discount_id,
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

    $('#discountForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var phantram = $('#discountForm input[name="discount-percent"]').val();
        var ngaybatdau = $('#discountForm input[name="discount-date-start"]').val();
        var ngayketthuc = $('#discountForm input[name="discount-date-end"]').val();
        var alert = formValidateDiscount(phantram, ngaybatdau, ngayketthuc);
        if(alert ===''){
            // Serialize form data
            var formData = new FormData( $('#discountForm')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/Discount.php', // URL to handle form submission
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
                                message: 'Thêm mã giảm giá thành công',
                                type: 'success',
                                duration: 3000
                            });
                        } else {
                            toast({
                                title: 'Thành công',
                                message: 'Cập nhật mã giảm giá thành công',
                                type: 'success',
                                duration: 3000
                            });
                        }
                    } else {
                        if(obj.btn == 'add'){
                            toast({
                                title: 'Lỗi',
                                message: 'Thêm mã giảm giá thất bại',
                                type: 'error',
                                duration: 3000
                            });
                        } else {
                            toast({
                                title: 'Lỗi',
                                message: 'Cập nhật mã giảm giá thất bại',
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
        /* update data */

    /* Start: lock */
    $('.lock_discount').click(function() {
        // Display the form as a pop-up
        var discount_id = $(this).closest('tr').find('.discount_id').text();
        $.ajax({
            url: 'controller/Discount.php', // Replace with the actual PHP endpoint to fetch discount details
            type: 'POST',
            data: {
                'lock_discount': true,
                'discount_id': discount_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success){
                    toast({
                        title: 'Thành công',
                        message: 'Khóa mã giảm giá thành công',
                        type: 'success',
                        duration: 3000
                    });
                }
            },
        });
   });
    /* End: lock */
});
