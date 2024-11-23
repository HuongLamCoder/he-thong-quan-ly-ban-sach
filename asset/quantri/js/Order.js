// Reset
const modal = document.getElementById('orderModal');

document.getElementById('orderModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('orderForm').reset();
    // Chỉ reload khi mở edit-modal
    if (!modal.classList.contains('view-modal')) {
        location.reload();
    }
});

$(document).ready(function() {
    const modalTitle = document.getElementById('orderModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');

    $('.open_view_form').click(function(e) {
        e.preventDefault();

        modal.classList.add('view-modal');
        modalTitle.textContent = 'Xem chi tiết đơn hàng';
        var order_id = $(this).closest('tr').find('.order_id').text();
        $.ajax({
            url: '../controller/quantri/OrderController.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'action': 'edit_data',
                'order_id': order_id
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                const order = obj.order;
                const details = obj.details;
                const nhanvien = obj.nhanvien;
                const khachhang = obj.khachhang;
                const products = obj.products;

                // hien thi thong tin cua don hang
                $('#idDH').html(order.idDH);
                $('#khachhang').html(khachhang.tenTK);
                $('#dienthoai').html(khachhang.dienthoai);
                console.log(order.diachi);
                $('#diachi').val(order.diachi);
                order.phiship = order.phiship.toLocaleString(
                    undefined, // leave undefined to use the visitor's browser 
                               // locale or a string like 'en-US' to override it.
                    { maximumFractionDigits: 2 }
                  ).replace(/,/g, '.');
                  order.phiship +="đ";
                $('#phiship').html(order.phiship)
                $('#ngaytao').html(order.ngaytao);
                $('#ngaycapnhat').html(order.ngaycapnhat);
                order.tongtien = order.tongtien.toLocaleString(
                    undefined, // leave undefined to use the visitor's browser 
                               // locale or a string like 'en-US' to override it.
                    { maximumFractionDigits: 2 }
                  ).replace(/,/g, '.');
                  order.tongtien +="đ";
                $('#tongtien').html(order.tongtien);
                $('#trangthai').html(order.trangthai.tenTT);
                $('#nhanvien').html(nhanvien.idTK+"-"+nhanvien.tenTK);

                // hien thi chi tiet don hang
                let n = products.length;
                let tr;
                let td;
                let gialucdatFormat;
                let thanhtien;
                for(let i=0; i<n; i++){
                    tr = $('<tr></tr>');

                    td = $('<td></td>');
                    td.text(products[i].idSach); 
                    tr.append(td);

                    td = $('<td></td>');
                    td.text(products[i].tuasach); 
                    tr.append(td);

                    td = $('<td></td>');
                    td.text(details[i].soluong); 
                    tr.append(td);

                    gialucdatFormat = details[i].gialucdat.toLocaleString(
                        undefined, // leave undefined to use the visitor's browser 
                                   // locale or a string like 'en-US' to override it.
                        { maximumFractionDigits: 2 }
                      ).replace(/,/g, '.');
                    gialucdatFormat +="đ";
                    td = $('<td></td>');
                    td.text(gialucdatFormat); 
                    tr.append(td);
                    
                    thanhtien = details[i].soluong * details[i].gialucdat;
                    thanhtien = thanhtien.toLocaleString(
                        undefined, // leave undefined to use the visitor's browser 
                                   // locale or a string like 'en-US' to override it.
                        { maximumFractionDigits: 2 }
                      ).replace(/,/g, '.');
                      thanhtien +="đ";
                      td = $('<td></td>');
                      td.text(thanhtien); 
                      tr.append(td);
                      $('#orderForm tbody').append(tr);
                }

                $('#orderForm tbody').html()
            },
        
        });

        $('#orderForm').find('.not-edit').show();
        document.getElementById('orderForm').querySelectorAll('.edit').forEach(e => {
            e.style.setProperty('display', 'none', 'important');
        })
    });

    $('.open_edit_form').click(function(e) {
        e.preventDefault();
        
        modal.classList.remove('view-modal');
        modalTitle.textContent = 'Chỉnh sửa đơn hàng';
        submit_btn.setAttribute('name', 'action');
        submit_btn.setAttribute('value', 'submit_btn_update');

        var order_id = $(this).closest('tr').find('.order_id').text();
        $.ajax({
            url: '../controller/quantri/OrderController.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'action': 'edit_data',
                'order_id': order_id
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                const order = obj.order;
                const details = obj.details;
                const nhanvien = obj.nhanvien;
                const khachhang = obj.khachhang;
                const products = obj.products;

                // hien thi thong tin cua don hang
                $('#idDH').html(order.idDH);
                $('#khachhang').html(khachhang.tenTK);
                $('#dienthoai').html(khachhang.dienthoai);
                console.log(order.diachi);
                $('#diachi').val(order.diachi);
                order.phiship = order.phiship.toLocaleString(
                    undefined, // leave undefined to use the visitor's browser 
                               // locale or a string like 'en-US' to override it.
                    { maximumFractionDigits: 2 }
                  ).replace(/,/g, '.');
                  order.phiship +="đ";
                $('#phiship').html(order.phiship)
                $('#ngaytao').html(order.ngaytao);
                $('#ngaycapnhat').html(order.ngaycapnhat);
                order.tongtien = order.tongtien.toLocaleString(
                    undefined, // leave undefined to use the visitor's browser 
                               // locale or a string like 'en-US' to override it.
                    { maximumFractionDigits: 2 }
                  ).replace(/,/g, '.');
                  order.tongtien +="đ";
                $('#tongtien').html(order.tongtien);
                //trang thai
                let n = orderstatus.length;
                for(let i=0; i<n; i++){
                    
                }
                $('#nhanvien').html(nhanvien.idTK+"-"+nhanvien.tenTK);

                // hien thi chi tiet don hang
                n = products.length;
                let tr;
                let td;
                let gialucdatFormat;
                let thanhtien;
                for(let i=0; i<n; i++){
                    tr = $('<tr></tr>');

                    td = $('<td></td>');
                    td.text(products[i].idSach); 
                    tr.append(td);

                    td = $('<td></td>');
                    td.text(products[i].tuasach); 
                    tr.append(td);

                    td = $('<td></td>');
                    td.text(details[i].soluong); 
                    tr.append(td);

                    gialucdatFormat = details[i].gialucdat.toLocaleString(
                        undefined, // leave undefined to use the visitor's browser 
                                   // locale or a string like 'en-US' to override it.
                        { maximumFractionDigits: 2 }
                      ).replace(/,/g, '.');
                    gialucdatFormat +="đ";
                    td = $('<td></td>');
                    td.text(gialucdatFormat); 
                    tr.append(td);
                    
                    thanhtien = details[i].soluong * details[i].gialucdat;
                    thanhtien = thanhtien.toLocaleString(
                        undefined, // leave undefined to use the visitor's browser 
                                   // locale or a string like 'en-US' to override it.
                        { maximumFractionDigits: 2 }
                      ).replace(/,/g, '.');
                      thanhtien +="đ";
                      td = $('<td></td>');
                      td.text(thanhtien); 
                      tr.append(td);
                      $('#orderForm tbody').append(tr);
                }

                $('#orderForm tbody').html()
            },
        
        });

        $('#orderForm').find('.edit').show();
        document.getElementById('orderForm').querySelectorAll('.not-edit').forEach(e => {
            e.style.setProperty('display', 'none', 'important');
        })
    });
});