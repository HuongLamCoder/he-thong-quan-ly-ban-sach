$(document).ready(function () {
    const modal = document.getElementById('grnModal');

    document.getElementById('grnModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('grnForm').reset();
        if (!modal.classList.contains('view-modal')) {
            location.reload();
        }
    });

    const modalTitle = document.getElementById('grnModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');
    
    $('.open_add_form').click(function (e) {
        e.preventDefault();

        modalTitle.textContent = 'Thêm phiếu nhập sách';
        submit_btn.setAttribute('name', 'submit_btn_add');

        $('#grnForm').find('.edit').hide();
        $('#grnModal').find('.view').hide();
        $('#grnModal').find('.not-view:not(.edit)').show();
    });

    $('.open_edit_form').click(function (e) {
        e.preventDefault();

        modalTitle.textContent = 'Chỉnh sửa phiếu nhập sách';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'submit_btn_update');

        $('#grnForm').find('.not-edit').hide();
        $('#grnModal').find('.view').hide();
        $('#grnModal').find('.not-view').show();
        $('#grnForm').find('.edit').show();
    });

    $('.open_view_form').click(function (e) {
        e.preventDefault();

        modal.classList.add('view-modal');
        $('#grnModal').find('.view').show();
        modalTitle.textContent = 'Chi tiết phiếu nhập sách';
        $('#grnModal').find('.not-view').hide();
    });

    $('#add-row-btn').on('click', function () {
        let newRow = $('.grn-row-template').clone().removeClass('grn-row-template');
        let newRowNumber = $('#grnForm table tbody tr:not(.grn-row-template)').length + 1;
        newRow.find('td:first').text(newRowNumber);
        $('#grnForm table tbody').append(newRow);
        updateRowCount();   //Bỏ dòng này nếu không có row-count
    });

    $(document).on('click', '.delete-row', function () {
        $(this).closest('tr').remove();
        updateRowNumber();
        updateRowCount();   //Bỏ dòng này nếu không có row-count
    });

    function updateRowNumber() {
        $('#grnForm table tbody tr:not(.grn-row-template)').each((index, row) => {
            $(row).find('td:first').text(index + 1);
        });
    }

    //Bỏ hàm này nếu không có row-count
    function updateRowCount() {
        let rowCount = $('#grnForm table tbody tr:not(.grn-row-template)').length;
        $('.row-count span').text(rowCount);
    }
});