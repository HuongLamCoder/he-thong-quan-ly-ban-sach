// Reset
document.getElementById('discountModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('discountForm').reset();
    let textMessage = document.querySelectorAll('.text-message');
    textMessage.forEach(element => {
        element.textContent = '';
    });
    location.reload();
});

$(document).ready(function() {
    const modalTitle = document.getElementById('discountModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');
    // open add form
    $('.open_add_form').click(function() {
        modalTitle.textContent = 'Thêm mã giảm giá';
        modalSaveBtn.textContent = 'Thêm mã giảm giá';
        submit_btn.setAttribute('name', 'submit_btn_add');
        document.getElementById('discountForm').querySelector('.edit').style.display = 'none';
    });
   // open edit form
   $('.open_edit_form').click(function(e) {
        e.preventDefault();
        modalTitle.textContent = 'Chỉnh sửa mã giảm giá';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'submit_btn_update');
    });
});