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
    let submit_btn = document.getElementById('submit_btn');
    
    $('.open_add_form').click(function (e) {
        e.preventDefault();
        modalTitle.textContent = 'Thêm phiếu nhập sách';
        submit_btn.setAttribute('name', 'action');
        submit_btn.setAttribute('value', 'submit_btn_add');
        $('#grnForm').find('.edit').hide();
        $('#grnModal').find('.view').hide();
        $('#grnModal').find('.not-view:not(.edit)').show();
    });

    function checkCreateModal(){
        var idNCC = $('#supplier-id').val();
        var chietkhau = $('#grn-discount').val();
        var error = true;
        if(idNCC == -1){
            $('.grn-supplier-name-msg').html('Vui lòng chọn nhà cung cấp');
            error = false;
        }

        if(chietkhau === '') {
            $('.grn-discount-msg').html('Chiết khấu không được để trống');
            error = false;
        }
        else if (isNaN(chietkhau) || parseFloat(chietkhau) < 0 || parseFloat(chietkhau) >= 100){
            $('.grn-discount-msg').html('Chiết khấu phải là một số > 0 và <100');
            error = false;
        }   
        return error;
    }

    $('#saveCreateModalBtn').click(function (e) {
        e.preventDefault();
        // kiem tra hop le
        if(checkCreateModal()){
            // get thong tin
            var idNCC = $('#supplier-id').val();
            var tenNCC = $('#supplier-id option:selected').text();
            var chietkhau = $('#grn-discount').val();
            //fill thong tin
            $('#idNCC').val(idNCC);
            $('#tenNCC').html(tenNCC);
            var current = new Date().toISOString().split('T')[0];
            $('#ngaytao').html(current);
            $('#ngaycapnhat').html(current);
            $('#chietkhau').html(chietkhau+"%");
            $('#grnForm input[name="chietkhau"]').val(chietkhau);
            let grnModal = new bootstrap.Modal(document.getElementById('grnModal'));
            grnModal.show();
        }
    });

    $('.open_edit_form').click(function (e) {
        e.preventDefault();

        modalTitle.textContent = 'Chỉnh sửa phiếu nhập sách';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'action');
        submit_btn.setAttribute('value', 'submit_btn_update');

        $('#add-row-btn').removeClass('not-view');
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
        var grn_id = $(this).closest('tr').find('.grn_id').text();
        $.ajax({
            url: '../controller/quantri/GRNController.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'action': 'edit_data',
                'grn_id': grn_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                
            },
        });
    });

    $('#add-row-btn').on('click', function () {
        let newRow = $('.grn-row-template').clone().removeClass('grn-row-template');
        let newRowNumber = $('#grnForm table tbody tr:not(.grn-row-template)').length + 1;
        newRow.find('td:first').text(newRowNumber);
        var idNCC = $('#idNCC').val();
        $.ajax({
            url: '../controller/quantri/GRNController.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'action': 'openAddForm',
                'supplier_id': idNCC,
            },
            success: function(response){
                console.log(response);
                const books = JSON.parse(response);
                var selectElement = newRow.find('select[name="grn_product[]"]'); 
                selectElement.empty();
                var option = $('<option></option>')
                        .attr('value', -1)  
                        .text("---Chọn---"); 
                selectElement.append(option);
                $.each(books, function(index, book) {
                    var option = $('<option></option>')
                        .attr('value', book.idSach)
                        .attr('data-giabia', book.giabia)
                        .attr('data-id', book.idSach)
                        .text(book.idSach + ' - ' + book.tuasach);
                    selectElement.append(option);
                });
            },
        });
        $('#grnForm table tbody').append(newRow);
        updateRowCount();   //Bỏ dòng này nếu không có row-count
    });

    /* Start: search product */
$(document).on('change', '#grnForm select[name="grn_product[]"]', function(){
    var selectedOption = $(this).find('option:selected');
    var tr = $(this).closest('tr');
    var giabia = selectedOption.data('giabia');
    // gia nhap
    var chietkhau = $('#grnForm input[name="chietkhau"]').val();
    console.log(chietkhau);
    var gianhap = ((100-chietkhau)/100)*giabia;
    tr.find('input[name="gianhap[]"]').val(gianhap);
    
    // thanh tien
    var soluong = tr.find('input[name="grn_quantity[]"]').val();
    if(soluong == '') soluong = 0;
    var thanhtien = soluong * gianhap;
    tr.find('input[name="thanhtien[]"]').val(thanhtien);

    thanhtien = thanhtien.toLocaleString(
        undefined, // leave undefined to use the visitor's browser 
                   // locale or a string like 'en-US' to override it.
        { maximumFractionDigits: 2 }
      ).replace(/,/g, '.');
    thanhtien +="đ";
    tr.find('.thanhtien').html(thanhtien);
    // gia bia
    giabia = giabia.toLocaleString(
        undefined, // leave undefined to use the visitor's browser 
                   // locale or a string like 'en-US' to override it.
        { maximumFractionDigits: 2 }
      ).replace(/,/g, '.');
    giabia +="đ";
    tr.find('.giabia').html(giabia);
    // gia nhap
    gianhap = gianhap.toLocaleString(
        undefined, // leave undefined to use the visitor's browser 
                   // locale or a string like 'en-US' to override it.
        { maximumFractionDigits: 2 }
      ).replace(/,/g, '.');
    gianhap +="đ";
    tr.find('.gianhap').html(gianhap);
});
/* End: search product */

// update tong tien
function calculateTotal() {
    var tongtien = 0;
    $('#grnForm table tbody tr:not(.grn-row-template)').each(function() {
        var gianhap= $(this).find('input[name="gianhap[]"]').val(); 
        var soluong= $(this).find('input[name="grn_quantity[]"]').val(); 
        var thanhtien = gianhap * soluong;
        console.log(soluong);
        console.log(thanhtien)
        tongtien+=thanhtien;
        $(this).find('input[name="thanhtien[]"]').val(thanhtien);
        thanhtien = thanhtien.toLocaleString(
            undefined, // leave undefined to use the visitor's browser 
                       // locale or a string like 'en-US' to override it.
            { maximumFractionDigits: 2 }
          ).replace(/,/g, '.');
        thanhtien +="đ";
        $(this).find('.thanhtien').html(thanhtien);
        console.log(tongtien);
    });
    $('#grnForm input[name="tongtien"]').val(tongtien);
    tongtien = tongtien.toLocaleString(undefined, { maximumFractionDigits: 2 }).replace(/,/g, '.');
    tongtien +="đ";
    $('#tongtien').html(tongtien);
    
}

$(document).on('input', '.grn-quantity', function() {
    calculateTotal();
});

    $(document).on('click', '.delete-row', function () {
        $(this).closest('tr').remove();
        updateRowNumber();
        updateRowCount();//Bỏ dòng này nếu không có row-count
        calculateTotal();   
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

    function formValidateInventory(sanpham, soluong) {
        // Kiểm tra hợp lệ
         if(sanpham.length == 0){
             return 'Vui lòng nhập sản phẩm.';
         }
     
         for(var i = 0; i<sanpham.length; i++)
             if(sanpham[i].value == "-1"){
                 return "Vui lòng nhập sản phẩm.\nLỗi: dòng "+(i+1);
             }
     
         for(var i = 0; i<soluong.length; i++)
             if(soluong[i].value <= 0){
                 return "Vui lòng nhập số lượng lớn hơn 0.\nLỗi: dòng "+(i+1);
             }
             else if(soluong[i].value == ""){
                 return "Vui lòng nhập số lượng.\nLỗi: dòng "+(i+1);
             }
         
         return '';
     }

     $(document).on('submit', '#grnForm', function (event) {
        event.preventDefault();
         // validate form
    var list = $('#grnForm table tbody tr:not(.grn-row-template)')
    var sanpham = list.find('input[name="grn_quantity[]"]');
    var soluong = list.find('select[name="grn_product[]"]');
    var msg = formValidateInventory(sanpham, soluong)
    if(msg == ''){
        // Serialize form data
        var formData = new FormData( $('#grnForm')[0]);
        // AJAX request to handle form submission
        $.ajax({
            url: '../controller/quantri/GRNController.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success)
                    toast({
                    title: 'Thành công',
                    message: 'Thêm phiếu nhập thành công',
                    type: 'success',
                    duration: 3000
                    });
                else
                toast({
                    title: 'Lỗi',
                    message: obj.message,
                    type: 'error',
                    duration: 3000
                    });
            },
        });
    }
    else toast({
        title: 'Lỗi',
        message: msg,
        type: 'error',
        duration: 3000
        });
});

    });