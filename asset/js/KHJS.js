// JS trigger cái toast message
const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
  toastTrigger.addEventListener('click', () => {
    toastBootstrap.show()
  })
}

// JS quantity input -- ở trang giỏ hàng 
var minusButtons = document.querySelectorAll(".btn-subtract");
var addButtons = document.querySelectorAll(".btn-add");
var quantityInputs = document.querySelectorAll(".item-quantity");

minusButtons.forEach(function(minusButton, index) {
    minusButton.addEventListener("click", function() {
        var quantityInput = quantityInputs[index];
        if (quantityInput.value > 1) {
            quantityInput.value--;
        }
    });
});

addButtons.forEach(function(addButton, index) {
    addButton.addEventListener("click", function() {
        var quantityInput = quantityInputs[index];
        quantityInput.value++;
    });
});

// JS quantity input -- ở trang đổi trả
var minusButtonsRe = document.querySelectorAll(".re-btn-subtract");
var addButtonsRe = document.querySelectorAll(".re-btn-add");
var quantityInputsRe = document.querySelectorAll(".item-return-quantity");

minusButtonsRe.forEach(function(minusButton, index) {
    minusButton.addEventListener("click", function() {
        var quantityInput = quantityInputsRe[index];
        if (quantityInput.value > 0) {
            quantityInput.value--;
        }
    });
});

addButtonsRe.forEach(function(addButton, index) {
    addButton.addEventListener("click", function() {
        var quantityInput = quantityInputsRe[index];
        quantityInput.value++;
    });
});

// JS 2 nút quay lại 2 modal nhỏ ở trang thanh toán
function backToListAddress() {
  var listModal = new bootstrap.Modal(document.getElementById('modalListAddress')); // Modal danh sách địa chỉ
  listModal.show(); 
}

document.querySelectorAll('.backToListAddress').forEach(function(button) {
  button.addEventListener('click', function() {
    var currentModal = bootstrap.Modal.getInstance(button.closest('.modal'));
    currentModal.hide(); 
    backToListAddress(); 
  });
});
