$(document).ready(function(){
    // Cái này để test toast messgae thôi nha mấy ní!!!
    $('#login-form').on('submit', function(event) {
        event.preventDefault();
        toast({
            title: 'Đăng nhập',
            message: 'Lore  ipsum dolor sit amet, consectetur adipisicing elit. Quos, quibusdam.',
            type: 'success',
            duration: 20000
        });
    });
});