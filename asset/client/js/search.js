$(document).ready(function() {
    $('#price-increase').click(function(event) {
            // AJAX request to handle form submission
        $.ajax({
            url: 'controller/search.php', // URL to handle form submission
            type: 'POST',
            data:
            {'price': true,
              'increase': true
            },
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                console.log(obj);
                if(obj.success) alert("Đã lưu thông tin");
                else $('.alert').html('<span style="color: red;">Email hoặc số điện thoại đã tồn tại</span>');
            },
        });
    });
    
});