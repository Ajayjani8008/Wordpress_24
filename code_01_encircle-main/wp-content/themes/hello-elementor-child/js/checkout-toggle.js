jQuery(document).ready(function($) {
    $('#billing-toggle').click(function() {
        $('#billing-fields').toggle();
    });

    $('#payment-toggle').click(function() {
        $('#payment-fields').toggle();
    });
});
