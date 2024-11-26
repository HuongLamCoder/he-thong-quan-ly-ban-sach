$(document).ready(function () {
    $('#payment-method-form').on('change', function () {
        if ($('#banking').is(':checked')) {
            $('#qr-code-container').show()
        } else {
            $('#qr-code-container').hide()
        }
    })

    if (!$('#banking').is(':checked')) {
        $('#qr-code-container').hide()
    }

    // Generate District Selectbox
    $('#province-selectbox').on('change', function() {
        
    });
});