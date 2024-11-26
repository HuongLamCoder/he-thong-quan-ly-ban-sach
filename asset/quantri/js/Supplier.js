// Reset
document.getElementById('supplierModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('supplierForm').reset();
    let textMessage = document.querySelectorAll('.text-message');
    textMessage.forEach(element => {
        element.textContent = '';
    });
    location.reload();
});

$(document).ready(function() {
    const modalTitle = document.getElementById('supplierModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');
    // open add form
    $('.open_add_form').click(function() {
        modalTitle.textContent = 'Thêm nhà cung cấp';
        modalSaveBtn.textContent = 'Thêm nhà cung cấp';
        submit_btn.setAttribute('name', 'action');
        submit_btn.setAttribute('value', 'submit_btn_add');
        $.ajax({
            url: '../controller/AddressController.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'action': 'show_city'
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    const cities = obj.cities;
                    $.each(cities, function(index, city) {
                        $('#supplier-city').append(
                            $('<option></option>').val(city.idTinh).text(city.tenTinh)
                        );
                    });
                }
                else toast({
                    title: 'Lỗi',
                    message: obj.msg,
                    type: 'error',
                    duration: 3000
                });
            },
        });
        document.getElementById('supplierForm').querySelector('.edit').style.display = 'none';
    });

    $('#supplier-city').change(function(){
        var tinh = $('#supplier-city').val();
        if(tinh == -1) $('.text-message supplier-province-msg').text('Vui lòng chọn tỉnh');
        else {
            $('#supplier-district').empty();
            $('#supplier-district').append($('<option></option>').val(-1).text('Chọn quận/huyện'));
            $('#supplier-ward').empty();
            $('#supplier-ward').append($('<option></option>').val(-1).text('Chọn phường/xã'));
            $.ajax({
                url: '../controller/AddressController.php', // Replace with the actual PHP endpoint to fetch user details
                type: 'POST',
                data: {
                    'action': 'show_district',
                    'province_id': tinh
                },
                success: function(response){
                    const obj = JSON.parse(response);
                    if(obj.success){
                        const districts = obj.districts;
                        $.each(districts, function(index, district) {
                            $('#supplier-district').append(
                                $('<option></option>').val(district.idQuan).text(district.tenQuan)
                            );
                        });
                    }
                    else toast({
                        title: 'Lỗi',
                        message: obj.msg,
                        type: 'error',
                        duration: 3000
                    });
                    
                },
            });
        }

    })

    $('#supplier-district').change(function(){
        var quan = $('#supplier-district').val();
        if(quan == -1) $('.text-message supplier-district-msg').text('Vui lòng chọn tỉnh');
        else{
            $('#supplier-ward').empty();
            $('#supplier-ward').append($('<option></option>').val(-1).text('Chọn phường/xã'));
            $.ajax({
                url: '../controller/AddressController.php', // Replace with the actual PHP endpoint to fetch user details
                type: 'POST',
                data: {
                    'action': 'show_ward',
                    'district_id': quan
                },
                success: function(response){
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success){
                        const wards = obj.wards;
                        $.each(wards, function(index, ward) {
                            $('#supplier-ward').append(
                                $('<option></option>').val(ward.idXa).text(ward.tenXa)
                            );
                        });
                    }
                    else toast({
                        title: 'Lỗi',
                        message: obj.msg,
                        type: 'error',
                        duration: 3000
                    });
                },
            });
        }
    })
    $('#supplierForm').submit(function(event) {
        event.preventDefault();
    
        var ten = $('#supplierForm input[name="supplier_name"]').val();
        var email = $('#supplierForm input[name="supplier_email"]').val();
        var dienthoai = $('#supplierForm input[name="supplier_phone"]').val();
        var diachi = $('#supplierForm input[name="supplier_address"]').val();
    
        var isValid = formValidateSupplier(ten, email, dienthoai, diachi);
        if (isValid) {
            var formData = new FormData($('#supplierForm')[0]);
    
            $.ajax({
                url: '../controller/quantri/SupplierController.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    // if(obj.success) alert("true");
                    // else alert('false');
                    if (obj.success) {
                        if(obj.btn == 'add')
                            toast({
                                title: 'Thành công',
                                message: 'Thêm nhà cung cấp thành công',
                                type: 'success',
                                duration: 3000
                            });
                        else
                        toast({
                            title: 'Thành công',
                            message: 'Cập nhật nhà cung cấp thành công',
                            type: 'success',
                            duration: 3000
                        });
                    } else {
                        toast({
                            title: 'Lỗi',
                            message: 'Nhà cung cấp đã tồn tại',
                            type: 'error',
                            duration: 3000
                        });
                    }
                },
                
            });
        }
    });
   
    function formValidateSupplier(ten, email, dienthoai, diachi, city, district, ward) {
        // Clear previous messages
        $('.text-message').text('');
    
        let isValid = true;
        let phoneRegex = /^0[0-9]{9}$/;
        let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;
    
        // Validate name
        if (ten === '') {
            $('.supplier-name-msg').text('Vui lòng nhập họ tên');
            isValid = false;
        } else if (ten.length < 3) {
            $('.supplier-name-msg').text('Vui lòng nhập họ tên nhiều hơn 3 ký tự.');
            isValid = false;
        }
    
        // Validate email
        if (email === '') {
            $('.supplier-email-msg').text('Vui lòng nhập email.');
            isValid = false;
        } else if (!emailRegex.test(email)) {
            $('.supplier-email-msg').text('Email không hợp lệ.');
            isValid = false;
        }
    
        // Validate phone number
        if (dienthoai === '') {
            $('.supplier-phone-msg').text('Vui lòng nhập số điện thoại.');
            isValid = false;
        } else if (!phoneRegex.test(dienthoai)) {
            $('.supplier-phone-msg').text('Sai định dạng số điện thoại.');
            isValid = false;
        }
    
        // Validate address số cách rồi thêm 1 chuỗi chữ(chưa làm)
        if (diachi === '') {
            $('.supplier-address-msg').text('Vui lòng nhập địa chỉ.');
            isValid = false;
        }
    
        return isValid;
    }

    $('.open_view_form').click(function() {
        modalTitle.textContent = 'Chi tiết nhà cung cấp';
        modalSaveBtn.style.display = 'none';
        document.getElementById('supplierForm').querySelector('.not-view').style.display = 'none';
        var supplier_id = $(this).closest('tr').find('.supplier_id').text(); 
        $.ajax({
            url: 'controller/Supplier.php',
            type: 'POST',
            data: {
                'view_data_supplier': true,
                'supplier_id': supplier_id,
            },
            success: function(response) {
                const obj = JSON.parse(response);
                
                $('#supplierForm input[name="supplier_name"]').val(obj.tenNCC);
                $('#supplierForm input[name="supplier_email"]').val(obj.email);
                $('#supplierForm input[name="supplier_phone"]').val(obj.dienthoai);
                $('#supplierForm input[name="supplier_address"]').val(obj.diachi);               
                // Handle status
               // Handle status
               if(parseInt(obj.trangthai)){
                    $('#status').prop('checked', true);
                    $('#switch-label').text('Đang hoạt động');
                }
                else {
                    $('#status').prop('checked', false);
                    $('#switch-label').text('Bị khóa');
                }
            document.getElementById('supplierForm').querySelector('.view').style.display = 'flex';
            
            },
        });
        
        //Disable all input field
        var inputs = document.querySelectorAll('#supplierForm input, #supplierForm select');
        inputs.forEach(input => {
            input.setAttribute('disabled', true);
        });
    });
   //open edit form
   $('.open_edit_form').click(function(e) {
        e.preventDefault();
        modalTitle.textContent = 'Chỉnh sửa nhà cung cấp';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'action');
        submit_btn.setAttribute('value', 'submit_btn_update');
        var supplier_id = $(this).closest('tr').find('.supplier_id').text(); 
        $.ajax({
            url: '../controller/quantri/SupplierController.php',
            type: 'POST',
            data: {
                'action':'open_edit_form',
                'supplier_id': supplier_id,
            },
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    const supplier = obj.supplier;
                    const diachi = supplier.diachi;
                    $('#supplierForm input[name="supplier_id"]').val(obj.supplier.idNCC);
                    $('#supplierForm input[name="supplier_name"]').val(obj.supplier.tenNCC);
                    $('#supplierForm input[name="supplier_email"]').val(obj.supplier.email);
                    $('#supplierForm input[name="supplier_phone"]').val(obj.supplier.dienthoai);
                    $('#supplierForm input[name="supplier_address"]').val(diachi.sonha);

            $.each(obj.city, function(index, value) {
                $('#supplier-city').append(
                    $('<option></option>').val(value.idTinh).text(value.tenTinh)
                );
            });

            $.each(obj.district, function(index, value) {
                $('#supplier-district').append(
                    $('<option></option>').val(value.idQuan).text(value.tenQuan)
                );
            });

            $.each(obj.ward, function(index, value) {
                $('#supplier-ward').append(
                    $('<option></option>').val(value.idXa).text(value.tenXa)
                );
            });

            $('#supplier-city').val(parseInt(diachi.city.idTinh));
            $('#supplier-district').val(diachi.district.idQuan);
            $('#supplier-ward').val(diachi.ward.idXa);
            if (parseInt(supplier.trangthai)) {
                $('#status').prop('checked', true);
                $('#switch-label').text('Đang hoạt động');
            } else {
                $('#status').prop('checked', false);
                $('#switch-label').text('Bị khóa');
            }
            document.getElementById('supplierForm').querySelector('.edit').style.display = 'flex';
                }
                else toast({
                    title: 'Lỗi',
                    message: obj.msg,
                    type: 'error',
                    duration: 3000
                });            
        },
        });
        
        
});
        
    
});