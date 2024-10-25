$(document).ready(function(){
    $('#login-form').on('submit', function(event) {
        event.preventDefault();
        toast({
            title: 'Đăng nhập',
            message: 'Đang xử lý...',
            type: 'info',
            duration: 3000
        });
    });
});