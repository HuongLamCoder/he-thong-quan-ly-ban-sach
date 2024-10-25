$(document).ready(function(){
    // Cái này để test toast messgae thôi nha mấy ní!!!
    $('#login-form').on('submit', function(event) {
        event.preventDefault();
        toast({
            title: 'Đăng nhập', // Tiêu đề toast message
            message: 'Lore  ipsum dolor sit amet, consectetur adipisicing elit. Quos, quibusdam.',  // Nội dung toast message
            type: 'success',    // Kiểu toast message: success (xanh lá), error (đỏ), warning (vàng), info (xanh dương)
            duration: 20000   // Thời gian hiển thị toast message (đơn vị: milisecond; 1000ms = 1s)
        });
    });
});