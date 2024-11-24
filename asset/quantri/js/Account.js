const accountModal = document.getElementById('accountModal');
accountModal.addEventListener('hidden.bs.modal', function() {
    document.getElementById('accountForm').reset();
    let textMessage = document.querySelectorAll('.text-message');
    textMessage.forEach(element => {
        element.textContent = '';
    });
    location.reload();
});

$(document).ready(function() {
    const modalTitle = document.getElementById('accountModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');
    // open add form
    $('.open_add_form').click(function() {
        modalTitle.textContent = 'Thêm tài khoản';
        modalSaveBtn.textContent = 'Thêm tài khoản';
        $("#password").prop('disabled', false);
        submit_btn.setAttribute('name', 'action');
        submit_btn.setAttribute('value', 'submit_btn_add');
        $.ajax({
            url: '../controller/quantri/AccountController.php',
            type: 'POST',
            data: {
                'action': 'open_add_form',
            },
            success: function(response) {
                console.log(response);
                const data = JSON.parse(response);
                const selectElement = $('#role-select');

                selectElement.empty();

                data.forEach(item => {
                    selectElement.append(new Option(item.tenNQ, item.idNQ));
                });
                document.getElementById('accountForm').querySelector('.edit').style.display = 'none';
            },
        });
    });
   // open edit form
   $('.open_edit_form').click(function(e) {
        e.preventDefault();
        var account_id = $(this).closest('tr').find('.account_id').text();
        modalTitle.textContent = 'Chỉnh sửa tài khoản';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        $("#password").prop('disabled', true);
        submit_btn.setAttribute('name', 'action');
        submit_btn.setAttribute('value', 'submit_btn_update');
        $.ajax({
            url: '../controller/quantri/AccountController.php',
            type: 'POST',
            data: {
                'action': 'edit_data',
                'account_id': account_id,
            },
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                const account = obj.account;
                const role = obj.role;
                $('#account_id').val(account.idTK);
                $('#username').val(account.tenTK);
                $('#usermail').val(account.email);
                $('#userphone').val(account.dienthoai);
                
                if(parseInt(account.trangthai)){
                    $('#status').prop('checked', true);
                    $('#switch-label').text('Đang hoạt động');
                } 
                else {
                    $('#status').prop('checked', false);
                    $('#switch-label').text('Bị khóa');
                }
                // phan quyen
                const selectElement = $('#role-select');

                selectElement.empty();

                role.forEach(item => {
                    selectElement.append(new Option(item.tenNQ, item.idNQ));
                });

                selectElement.val(account.idNQ);
                document.getElementById('accountForm').querySelector('.edit').style.display = 'flex';
            },
        });
    });
    
    $('#accountForm').submit(function(event) {
    
        event.preventDefault();
        
        var fullName = $('#username').val();
        var email = $('#usermail').val().trim();
        var phone = $('#userphone').val().trim();
        var password = $('#password').val().trim();
        var role = $('#role-select').val();

        $('.text-message').text('');
        let hasError = false;

        if (fullName === '') {
            $('.text-message.user-name-msg').text('Tên tài khoản không được để trống');
            hasError = true;
        }
    
        if (email === '') {
            $('.text-message.user-email-msg').text('Email không được để trống');
            hasError = true;
        } else {
            // Kiểm tra định dạng email
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                $('.text-message.user-email-msg').text('Email không hợp lệ');
                hasError = true;
            }
        }
    
        if (phone === '') {
            $('.text-message.user-phone-msg').text('Số điện thoại không được để trống');
            hasError = true;
        } else {
            // Kiểm tra định dạng số điện thoại (ví dụ: chỉ cho phép số)
            var phonePattern = /(84|0[3|5|7|8|9])+([0-9]{8})\b/g;
            if (phonePattern.test(phone) == false) {
                $('.text-message.user-phone-msg').text('Số điện thoại không hợp lệ');
                hasError = true;    
            }
        }
    
        if (password === '' && !($("#password").prop('disabled'))) {
            $('.text-message.user-password-msg').text('Mật khẩu không được để trống');
            hasError = true;
        }
    
        if (role === '0') {
            $('.text-message.user-select-msg').text('Vui lòng chọn nhóm quyền');
            hasError = true;
        }
    
        // Nếu không có lỗi, gửi dữ liệu
        if (hasError == false) {
            var formData = new FormData($('#accountForm')[0]);
            
            $.ajax({
                url: '../controller/quantri/AccountController.php', 
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if (obj.success) {
                        if (obj.btn === 'add') {
                            toast({
                                title: 'Thành công',
                                message: 'Thêm tài khoản thành công',
                                type: 'success',
                                duration: 3000
                            });
                        } else {
                            toast({
                                title: 'Thành công',
                                message: 'Cập nhật tài khoản thành công',
                                type: 'success',
                                duration: 3000
                            });
                        }
                    } 
                    else {
                            toast({
                                title: 'Lỗi',
                                message: 'Cập nhật tài khoản thất bại',
                                type: 'error',
                                duration: 3000
                            });
                        }
                },
            });
        }

    });

});