<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 4_Такта
 */

?>

<footer class="main-footer">
  <div class="container">
    <div class="logo-and-breadcrumb">


      <div class="logo-box">
        <a href="<? home_url(); ?>"><img src="<? the_field('theme_logo', 'option'); ?>" alt="<? bloginfo('name'); ?>" class="logo" style="width: 200px;height: auto;"></a>
        <h1 class="logo-text" style="margin: 0 2rem;">
          <? the_field('theme_description', 'option'); ?>
        </h1>
      </div>
        <?
        wp_nav_menu( array(
            'theme_location'  => 'mainMenu',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_class' => 'breadcrumb',
            'container_id'    => '4tact-menu',
            'menu_class'      => 'breadcrumb-list',
            'menu_id'         => '4tactMenuList',
        ) );
        ?>
    </div>

    <div class="copyright-and-info">
      <div class="copyright">
        © «4 такта» 2020. Все права защищены. Использование информации возможно<br>
        только с письменного согласования владельцев интернет-ресурса
      </div>

      <div class="info">
        <div class="address-and-time">
          <ul class="address-and-time-list">
            <li>
              <img src="<? echo get_template_directory_uri() . '/assets/img/icons/map.svg'; ?>" alt="">
              <a target="_blank" href="<? the_field('theme_address_link', 'option'); ?>">
                <? the_field('theme_address', 'option'); ?>
              </a>

            </li>
            <li>
              <img src="<? echo get_template_directory_uri() . '/assets/img/icons/Mask.svg'; ?>" alt="">
              <? the_field('theme_time', 'option'); ?>
            </li>
          </ul>
        </div>
        <div class="phone-number-and-mail">
          <div class="phone-number">
            <a href="tel:<? the_field('theme_phone', 'option'); ?>"><? the_field('theme_phone', 'option'); ?></a>
          </div>
          <div class="mail">
            <img src="<? echo get_template_directory_uri() . '/assets/img/icons/email.svg'; ?>" alt="">
            <a href="mailto:artem-kazakov@mail.ru">artem-kazakov@mail.ru</a>
          </div>
        </div>
      </div>

    </div>

    <div class="social-and-developer">
      <div class="social">
        <ul class="social-list">
            <?
            $tg = get_field('theme_telegram', 'option');
            if ($tg) { ?>
              <li>
                <a target="_blank" href="https://t.me/<? the_field('theme_telegram', 'option'); ?>">
                  <i class="fab fa-telegram-plane"></i>
                </a>
              </li>
            <? }
            ?>
            <?
            $wa = get_field('theme_whatsapp', 'option');
            if ($wa) { ?>
              <li>
                <a target="_blank" href="https://wa.me/<? the_field('theme_whatsapp', 'option'); ?>">
                  <i class="fab fa-whatsapp"></i>
                </a>
              </li>
            <? }
            ?>
            <?
            $vk = get_field('theme_vk', 'option');
            if ($vk) { ?>
              <li>
                <a target="_blank" href="<? the_field('theme_vk', 'option'); ?>">
                  <i class="fab fa-vk"></i>
                </a>
              </li>
            <? }
            ?>
        </ul>
      </div>

      <div class="developer">
        <a href="">Разработка сайта Альянс+<img src="<? echo get_template_directory_uri() . '/assets/img/icons/logo-developer.svg'; ?>" alt="Альянс+"></a>
      </div>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
