// Reset
document.getElementById('permissionModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('permissionForm').reset();
    let textMessage = document.querySelectorAll('.text-message');
    textMessage.forEach(element => {
        element.textContent = '';
    });
    location.reload();
});

function display_permission(permission,role_detail){
    var actions = ['xem','them','sua','xoa','in'];
    var row = '';
    var k;
    for(var i=0; i<permission.length; i++){
        row+=
        '<tr>'+
        '<input type="hidden" name = "idCN" value="'+permission[i].idCN+'"></input>'+
        '<td>'+permission[i].tenCN+'</td>';
        for(var j=0; j<actions.length; j++){
            if(permission[i][actions[j]] != 0){
                if(role_detail!=null){
                    if(role_detail.length!=0){
                        k=0;
                        while((k<role_detail.length) && (role_detail[k].idCN != permission[i].idCN)) k++;
                        if(k<role_detail.length)
                            if(role_detail[k][actions[j]]!=0){
                                row+=
                                '<td><input type="checkbox" name="action" class="form-check-input" checked></td>';
                                continue;
                            }
                    }
                }
                row+=
                '<td><input type="checkbox" name="action" class="form-check-input"></td>';
            }
            else row+='<td><input type="hidden" name="action">-</td>';
        }
        row+='</tr>';
    }
    document.getElementById('permission-action').innerHTML = row;
}

$(document).ready(function() {
    const modalTitle = document.getElementById('permissionModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');
    // open add form
    $('.open_add_form').click(function() {
        modalTitle.textContent = 'Thêm nhóm quyền';
        modalSaveBtn.textContent = 'Thêm nhóm quyền';
        submit_btn.setAttribute('name', 'submit_btn_add');
        $.ajax({
            url: 'controller/Role.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'open_add': true,
            },
            success: function(response){
                const chucnang = JSON.parse(response);
                display_permission(chucnang,null);
                document.getElementById('permissionForm').querySelector('.edit').style.display = 'none';
            },
        });
    });
    // open view form
    $('.open_view_form').click(function() {
        modalTitle.textContent = 'Chi tiết nhóm quyền';
        modalSaveBtn.style.display = 'none';
        var role_id = $(this).closest('tr').find('.role_id').text();
        $.ajax({
            url: 'controller/Role.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'view_data': true,
                'role_id': role_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var role_info = obj.role_info;
                var role_detail = obj.role_detail;
                var permission = obj.permission;

                // display ten nhom quyen
                $('#permissionGroupName').val(role_info.tenNQ);

                // display chuc nang
                display_permission(permission,role_detail);
                //Disable all input field
                var inputs = document.querySelectorAll('#permissionForm input');
                inputs.forEach(input => {
                    input.setAttribute('disabled', true);
                    });
            }
        });
    });
   // open edit form
   $('.open_edit_form').click(function(e) {
        e.preventDefault();
        modalTitle.textContent = 'Chỉnh sửa nhóm quyền';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'submit_btn_update');
        var role_id = $(this).closest('tr').find('.role_id').text();
        $.ajax({
            url: 'controller/Role.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'view_data': true,
                'role_id': role_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                var role_info = obj.role_info;
                var role_detail = obj.role_detail;
                var permission = obj.permission;

                // display ten nhom quyen
                $('#permissionGroupName').val(role_info.tenNQ);

                // display chuc nang
                display_permission(permission,role_detail);
            }
        });
    });
    // form submit
    $('#permissionForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var tenNQ = $('#permissionGroupName').val();
        if(tenNQ != ''){
            // Serialize form data
            var formData = new FormData( $('#permissionForm')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/Role.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success){
                        if(obj.btn == 'add') {
                            toast({
                                title: 'Thành công',
                                message: 'Thêm tác giả thành công',
                                type: 'success',
                                duration: 3000
                            });
                        } else {
                            toast({
                                title: 'Thành công',
                                message: 'Cập nhật tác giả thành công',
                                type: 'success',
                                duration: 3000
                            });
                        }
                    }
                    else {
                        if (obj.btn == 'add') {
                            $('.text-message.author-name-msg').text('Tác giả đã tồn tại');
                        } else {
                            toast({
                                title: 'Lỗi',
                                message: 'Cập nhật tác giả thất bại',
                                type: 'error',
                                duration: 3000
                            });
                        }
                    }
                },
            });
        }
        else {
            $('.text-message permission-name-msg').text('Tên nhóm quyền không được để trống');
        }
    });
});
