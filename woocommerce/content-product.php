<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || false === wc_get_loop_product_visibility( $product->get_id() ) || ! $product->is_visible() ) {
    return;
}

$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($product->get_id()), 'large');
$product = wc_get_product($product->get_id());
?>

<div class="goods-card category">
  <div class="img-card uk-cover-container">
    <img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title(); ?>" uk-cover/>
    <a class="uk-transform-center uk-position-absolute marker" href="<?php the_permalink(); ?>" uk-marker></a>
  </div>
  <div class="name-card">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </div>
  <div class="price-card">
    <p><span><? echo number_format($product->get_price(), 0, ',', ' ') ?></span> руб.</p>
  </div>
  <div class="btn-block">
      <?
      global $product;
      if ( $product->is_in_stock() ) : ?>
          <?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
        <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
            <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
          <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt add"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
            <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
        </form>
          <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
      <?php endif; ?>
  </div>
</div>
