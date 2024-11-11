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
        submit_btn.setAttribute('name', 'submit_btn_add');
        document.getElementById('accountForm').querySelector('.edit').style.display = 'none';
    });
   // open edit form
   $('.open_edit_form').click(function(e) {
        e.preventDefault();
        modalTitle.textContent = 'Chỉnh sửa tài khoản';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'submit_btn_update');
    });
});