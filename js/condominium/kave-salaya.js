$(function() {
    let promo_field = $('#promo_code');
    promo_field.on('change', function() {
        //console.log($(this).val());
        $('input[name="ref"]').val($(this).val());
    });
});