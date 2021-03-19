<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 4_Такта
 */

?>
  <?php
    wp_reset_query();
    $thePageId = get_the_ID();
  ?>

  <?php
    if ($thePageId == 68) { ?>
    <? get_header(); ?>
      <main>
        <section id="slider-banner">
          <div class="container">
            <div class="slider-box" uk-slider="autoplay: true;autoplay-interval: 10000">
              <div class="uk-position-relative uk-visible-toggle uk-light slider" tabindex="-1">
                <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-1@m">
                    <?php while ( have_rows('home_slides') ) : the_row(); ?>
                      <li class="uk-cover-container special-offer" style="background: url(<? the_sub_field('img'); ?>);background-position: center;background-repeat: no-repeat;-webkit-background-size: cover;background-size: cover;">
                        <h2><? the_sub_field('title'); ?></h2>
                        <a href="<? the_sub_field('promo'); ?>"></a>
                      </li>
                    <?php endwhile; ?>
                </ul>
              </div>
              <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin">
              </ul>
            </div>
          </div>
        </section>

        <section id="advantages">
          <div class="container">
            <div class="advantages-items">
                <?php while ( have_rows('home_advantages') ) : the_row(); ?>
                  <div class="advantages-item">
                    <div class="icon">
                      <img src="<? the_sub_field('icon'); ?>" alt="">
                    </div>
                    <div class="text">
                      <h3><? the_sub_field('title'); ?></h3>
                      <p><? the_sub_field('description'); ?></p>
                    </div>
                  </div>
                <?php endwhile; ?>
            </div>
          </div>
        </section>

        <section id="new-goods">
          <div class="container">
            <div class="title-block">
              <h2>Новые поступления</h2>
            </div>
            <div class="goods-slider">
              <div class="uk-position-relative uk-visible-toggle uk-light slider" tabindex="-1" uk-slider>

                <ul class="uk-slider-items uk-child-width-1-3@s uk-child-width-1-5@m">
                    <?
                    global $product;
                    $args = array(
                        'post_type'      => 'product',
                        'post_status'    => 'publish',
                        'posts_per_page' => - 1,
                    );

                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post(); ?>
                          <li>
                            <div class="goods-card">
                              <div class="img-card uk-cover-container">
                                <? $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($product->get_id()), 'large'); ?>
                                <img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title(); ?>" uk-cover>
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
                                <a href="<?php the_permalink(); ?>" class="more">подробнее</a>
                              </div>
                            </div>
                          </li>
                        <?  }
                    } else {
                        echo '<p class="text-center">Товаров не найдено</p>';
                    }

                    wp_reset_postdata();
                    ?>

                </ul>

                <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous
                   uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next
                   uk-slider-item="next"></a>
              </div>
            </div>

          </div>
        </section>

        <section id="map-and-form">
          <div class="container">
            <div class="map-and-form-box">
              <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1191.5488047109272!2d83.6949679!3d53.3236056!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x42dda3c5f6ed706b%3A0x14bd02e7ff94b7b1!2z0YPQuy4g0JLQu9Cw0YHQuNGF0LjQvdGB0LrQsNGPLCA1OdCzLCDQkdCw0YDQvdCw0YPQuywg0JDQu9GC0LDQudGB0LrQuNC5INC60YDQsNC5LCA2NTYwMzE!5e0!3m2!1sru!2sru!4v1612257707595!5m2!1sru!2sru"
                        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>

              <div class="form">
                <h3>Оставить заявку</h3>
                  <? echo do_shortcode( '[contact-form-7 id="113" title="Запрос прайс листа"]' ); ?>
              </div>

            </div>
          </div>
        </section>

      </main>
    <? } else { ?>
        <? get_header('compact'); ?>
        <main>
          <section id="information-section">
            <div class="container">
              <div class="breadcrump-and-information" style="width: auto;">
                <div class="breadcrump">
                  <ul class="uk-breadcrumb">
                    <li><a class="uk-active" href="<? echo get_home_url(); ?>">Главная</a></li>
                    <li><a href="#"><? the_title(); ?></a></li>
                  </ul>
                </div>
                <div class="information-block">
                  <h2><? the_title(); ?></h2>

                  <div class="text-information">

                    <? the_content(); ?>

                  </div>
                </div>
              </div>
            </div>
          </section>
        </main>
    <? } ?>
<?
get_footer();
