<?php

if ( ! function_exists( 'fourtact_woocommerce_cart_link' ) ) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function fourtact_woocommerce_cart_link() {
        ?>
        <div class="basket">
            <div class="price">
                <span><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
            </div>
            <div class="basket-icon">
                <img src="<? echo get_template_directory_uri() . '/assets/img/icons/basket-icon.svg'; ?>" alt="Корзина">
                <?php
                $item_count_text = sprintf(
                    _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'fourtact' ),
                    WC()->cart->get_cart_contents_count()
                );
                ?>
                <span class="count number-of-purchases"><?php echo esc_html( $item_count_text ); ?></span>
            </div>
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"></a>
        </div>
        <?php
    }
}


