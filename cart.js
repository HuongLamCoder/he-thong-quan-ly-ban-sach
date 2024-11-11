var minusButtons = document.querySelectorAll(".btn-subtract");
var addButtons = document.querySelectorAll(".btn-add");
var quantityInputs = document.querySelectorAll(".item-quantity");

// Lắng nghe sự kiện click của nút "-" (minus)
minusButtons.forEach(function(minusButton, index) {
    minusButton.addEventListener("click", function() {
        var quantityInput = quantityInputs[index];
        if (quantityInput.value > 1) {
            quantityInput.value--;  // Giảm số lượng
            updateQuantity(quantityInput);  // Cập nhật số lượng và gửi yêu cầu AJAX
        }
    });
});

// Lắng nghe sự kiện click của nút "+" (plus)
addButtons.forEach(function(addButton, index) {
    addButton.addEventListener("click", function() {
        var quantityInput = quantityInputs[index];
        quantityInput.value++;  // Tăng số lượng
        updateQuantity(quantityInput);  // Cập nhật số lượng và gửi yêu cầu AJAX
    });
});

// function validateInputQty(element) {
//     let value = element.value.trim();
    
//     if(isNaN(value) || value === '' || value < 1) {
//         alert("Vui lòng nhập vào số lượng hợp lệ");
//         setTimeout(function() {
//             element.value = "";
//             element.focus();
//         }, 0);
//         return false;
//     }
//     else {
//         element.value = parseInt(value);
//         updateQuantity(element);
//         return true;
//     }

// }

// Hàm cập nhật số lượng và gửi yêu cầu AJAX
function updateQuantity(inputQty) {
    var qtyValue = parseInt(inputQty.value);  // Lấy giá trị số lượng từ ô nhập
    var productIndex = inputQty.dataset.index;  // Lấy index của sản phẩm từ thuộc tính data-index

    // Gửi AJAX để cập nhật số lượng
    $.ajax({
        url: "controller/cart.php",  // Địa chỉ xử lý phía server
        type: "POST",  // Phương thức gửi dữ liệu
        data: {
            "pro_index": productIndex,  // Chỉ số sản phẩm
            "quantity": qtyValue,       // Số lượng sản phẩm
        },
        success: function(response) {
            console.log(response);  // In ra kết quả từ server
            var data = JSON.parse(response);  // Chuyển đổi dữ liệu từ server sang đối tượng JSON
            if (data.status == 'success') {
                // Cập nhật tổng số lượng và tổng tiền sau khi thành công
                $('.total-qty').text(data.totalQty);  // Cập nhật tổng số lượng
                $('.total-price').text(data.totalPrice);  // Cập nhật tổng giá tiền
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);  // Xử lý lỗi khi AJAX không thành công
        }
    });
}
