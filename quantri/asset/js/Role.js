// Reset
document.getElementById('permissionModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('permissionForm').reset();
    let textMessage = document.querySelectorAll('.text-message');
    textMessage.forEach(element => {
        element.textContent = '';
    });
    location.reload();
});

$(document).ready(function() {
    const modalTitle = document.getElementById('permissionModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');
    // open add form
    $('.open_add_form').click(function() {
        modalTitle.textContent = 'Thêm nhóm quyền';
        modalSaveBtn.textContent = 'Thêm nhóm quyền';
        submit_btn.setAttribute('name', 'submit_btn_add');
        document.getElementById('permissionForm').querySelector('.edit').style.display = 'none';
    });
    $('.open_view_form').click(function() {
        modalTitle.textContent = 'Chi tiết nhóm quyền';
        modalSaveBtn.style.display = 'none';
        //Disable all input field
        var inputs = document.querySelectorAll('#permissionForm input');
        inputs.forEach(input => {
            input.setAttribute('disabled', true);
        });
    });
   // open edit form
   $('.open_edit_form').click(function(e) {
        e.preventDefault();
        modalTitle.textContent = 'Chỉnh sửa nhóm quyền';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'submit_btn_update');
    });
});