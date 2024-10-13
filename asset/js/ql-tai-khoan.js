const accountModal = document.getElementById('accountModal');
accountModal.addEventListener('hidden.bs.modal', function() {
    document.getElementById('accountForm').reset();
});

function openModal(action) {
    const modalTitle = document.getElementById('accountModalLabel');
    const modalSaveBtn = document.getElementById('modalSaveBtn');

    if (action === 'add') {
        modalTitle.textContent = 'Thêm tài khoản';
        modalSaveBtn.textContent = 'Thêm tài khoản';
        document.getElementById('accountForm').querySelector('.add').style.display = 'block';
        document.getElementById('accountForm').querySelector('.edit').style.display = 'none';
    } else if (action === 'edit') {
        modalTitle.textContent = 'Chỉnh sửa tài khoản';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        document.getElementById('accountForm').querySelector('.add').style.display = 'none';
        document.getElementById('accountForm').querySelector('.edit').style.display = 'flex';   //.row
    }
}