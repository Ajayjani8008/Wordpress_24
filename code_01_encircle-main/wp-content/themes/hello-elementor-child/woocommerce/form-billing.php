<div id="checkout-container">
    <div id="billing-toggle" class="toggle-section">Toggle Billing Information</div>
    <div id="billing-fields" class="checkout-section">
        <?php do_action( 'woocommerce_checkout_billing' ); ?>
    </div>

    <div id="payment-toggle" class="toggle-section">Toggle Payment Information</div>
    <div id="payment-fields" class="checkout-section">
        <?php do_action( 'woocommerce_checkout_payment' ); ?>
    </div>

    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
</div>
