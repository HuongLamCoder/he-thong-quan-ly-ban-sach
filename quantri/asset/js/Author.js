// Reset
document.getElementById('authorModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('authorForm').reset();
});

function openModal(action) {
    const modalTitle = document.getElementById('authorModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    
    if (action === 'add') {
        modalTitle.textContent = 'Thêm tác giả';
        modalSaveBtn.textContent = 'Thêm tác giả';
        document.getElementById('authorForm').querySelector('.edit').style.display = 'none';
    } else {
        modalTitle.textContent = 'Chỉnh sửa tác giả';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        document.getElementById('authorForm').querySelector('.edit').style.display = 'flex';
    }
}