// Reset
document.getElementById('categoryModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('categoryForm').reset();
});

function openModal(action) {
    const modalTitle = document.getElementById('categoryModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    
    if (action === 'add') {
        modalTitle.textContent = 'Thêm danh mục';
        modalSaveBtn.textContent = 'Thêm danh mục';
        document.getElementById('categoryForm').querySelector('.edit').style.display = 'none';
    } else {
        modalTitle.textContent = 'Chỉnh sửa danh mục';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        document.getElementById('categoryForm').querySelector('.edit').style.display = 'flex';
    }
}