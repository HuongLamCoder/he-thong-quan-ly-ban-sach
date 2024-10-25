// Reset
document.getElementById('couponModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('couponForm').reset();
});

function openModal(action) {
    const modalTitle = document.getElementById('couponModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    
    if (action === 'add') {
        modalTitle.textContent = 'Thêm mã giảm giá';
        modalSaveBtn.textContent = 'Thêm mã giảm giá';
    } else {
        modalTitle.textContent = 'Chỉnh sửa mã giảm giá';
        modalSaveBtn.textContent = 'Lưu thay đổi';
    }
}