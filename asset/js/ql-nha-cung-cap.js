document.getElementById('supplierModal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('supplierForm').reset();
});

function openModal(action) {
    const modalTitle = document.getElementById('supplierModalLabel');
    const modalSaveBtn = document.getElementById('modalSaveBtn');
    const inputs = document.querySelectorAll('.modal-body input, .modal-body select');

    inputs.forEach(input => input.disabled = false); //Reset

    if (action === 'add') {
        modalTitle.textContent = 'Thêm nhà cung cấp';
        modalSaveBtn.textContent = 'Thêm nhà cung cấp';
        document.getElementById('supplierForm').querySelector('.edit').style.display = 'none';
        modalSaveBtn.classList.remove('d-none');
    } else if (action === 'edit') {
        modalTitle.textContent = 'Chỉnh sửa nhà cung cấp';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        document.getElementById('supplierForm').querySelector('.edit').style.display = 'flex'; //.row
        modalSaveBtn.classList.remove('d-none');
    } else if (action === 'view') {
        modalTitle.textContent = 'Thông tin nhà cung cấp';
        modalSaveBtn.classList.add('d-none');
        inputs.forEach(input => input.disabled = true);
    }
}