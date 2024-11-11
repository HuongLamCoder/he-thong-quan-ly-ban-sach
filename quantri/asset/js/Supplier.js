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
        submit_btn.setAttribute('name', 'submit_btn_add');
        document.getElementById('supplierForm').querySelector('.edit').style.display = 'none';
    });
    $('.open_view_form').click(function() {
        modalTitle.textContent = 'Chi tiết nhà cung cấp';
        modalSaveBtn.style.display = 'none';
        document.getElementById('supplierForm').querySelector('.not-view').style.display = 'none';

        //Disable all input field
        var inputs = document.querySelectorAll('#supplierForm input, #supplierForm select');
        inputs.forEach(input => {
            input.setAttribute('disabled', true);
        });
    });
   // open edit form
   $('.open_edit_form').click(function(e) {
        e.preventDefault();
        modalTitle.textContent = 'Chỉnh sửa nhà cung cấp';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'submit_btn_update');
    });
});