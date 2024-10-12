function openModal(action) {
    const modalTitle = document.getElementById('permissionModalLabel');
    const modalSaveBtn = document.getElementById('modalSaveBtn');
    const inputs = document.querySelectorAll('.modal-body input');

    inputs.forEach(input => input.disabled = false);    //Reset

    switch(action) {
        case 'add':
            modalTitle.textContent = 'Thêm nhóm quyền';
            modalSaveBtn.textContent = 'Thêm nhóm quyền';
            modalSaveBtn.classList.remove('d-none');
            break;
        case 'view':
            modalTitle.textContent = 'Chi tiết nhóm quyền';
            modalSaveBtn.classList.add('d-none');
            inputs.forEach(input => input.disabled = true);
            break;
        case 'edit':
            modalTitle.textContent = 'Cập nhật nhóm quyền';
            modalSaveBtn.textContent = 'Cập nhật nhóm quyền';
            modalSaveBtn.classList.remove('d-none');
            break;
    }
}

// Reset dữ liệu khi đóng modal
const permissionModal = document.getElementById('permissionModal');
permissionModal.addEventListener('hidden.bs.modal', function() {
    const form = document.getElementById('permissionForm');
    form.reset();
});