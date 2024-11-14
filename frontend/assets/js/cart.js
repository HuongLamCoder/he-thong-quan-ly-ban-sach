/* Kiểm tra số lượng người dùng nhập có phải là một số hay không */
function validateInputQty(element) {
    let value = element.value.trim();

    if (isNaN(value) || value === '' || value < 1) {
        alert("Vui lòng nhập vào số lượng hợp lệ");
        setTimeout(function() {
            element.value = "";
            element.focus();
        }, 0);
        return false;
    } else {
        element.value = parseInt(value);
        updateQuantity(element);
        return true;
    }
}

function updateQuantity(element) {
    let inputQty = element.parentNode.querySelector('.input-qty');
    let qtyValue = parseInt(inputQty.value);
    let productIndex = element.dataset.index;

    // Tăng/giảm số lượng
    if (element.classList.contains('minus') && (qtyValue > inputQty.min)) {
        qtyValue--;
    } else if (element.classList.contains('plus') && (qtyValue < inputQty.max)) {
        qtyValue++;
    }

    // Cập nhật số lượng mới vào ô nhập
    inputQty.value = qtyValue;

    // Gửi AJAX để cập nhật số lượng trên server
    $.ajax({
        url: "controller/cart.php",
        type: "POST",
        data: {
            "pro_index": productIndex,
            "quantity": qtyValue,
        },
        success: function(response) {
            console.log(response);
            let data = JSON.parse(response);
            if (data.status == 'success') {
                // Cập nhật tổng số lượng và tổng tiền
                $('.total-qty').text(data.totalQty);
                $('.total-price').text(data.totalPrice);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        }
    });
}
