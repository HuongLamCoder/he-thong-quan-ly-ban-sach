const email = document.querySelector("#forgotPassword_email");

const errorMessageEmail = document.querySelector(".errorMessage_forgotPassword_email");

const validateEmail = () => {
    let emailIsValid = false;
    const regexEmail =
      /^(([A-Za-z0-9]+((\.|\-|\_|\+)?[A-Za-z0-9]?)*[A-Za-z0-9]+)|[A-Za-z0-9]+)@(([A-Za-z0-9]+)+((\.|\-|\_)?([A-Za-z0-9]+)+)*)+\.([A-Za-z]{2,})+$/;
  
    if(email.value.trim() === "") {
      errorMessageEmail.innerText = "Vui lòng nhập email của bạn";
      emailIsValid = false;
    } else if(!regexEmail.test(email.value.trim())) {
      errorMessageEmail.innerText = "Vui lòng nhập đúng định dạng của email (Ví dụ: abc@example.com)";
      emailIsValid = false;
    } else {
      errorMessageEmail.innerText = "";
      emailIsValid = true;
    }
  
    return emailIsValid;
}

let isProcessing = false;

$(document).ready(function () {
    $("#forgot_password_form").submit(function (e) {
      e.preventDefault();

      if (isProcessing) return;
    isProcessing = true;

      if (validateEmail()) {
        var formData = new FormData($('#forgot_password_form')[0]);
        console.log(formData);
        $.ajax({  
          url: "../controller/quantri/ForgotPasswordController.php",
          type: "POST",
          data: formData,
          processData: false, 
          contentType: false,
          success: function(response) {
            console.log(response);
            const obj = JSON.parse(response);
            window.location.href='index.php?page=show_OTPInputForm';
          },
          error: function() {
            alert("Có lỗi xảy ra.");
          },
          complete: function() {
              isProcessing = false;
          }
        });
      } else {
        isProcessing = false;
      } 
    });
});