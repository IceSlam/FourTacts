<?php
/**
 * 4 Такта functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 4_Такта
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'fourtact_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fourtact_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on 4 Такта, use a find and replace
		 * to change 'fourtact' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fourtact', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'mainMenu' => esc_html__( 'Главное меню', 'fourtact' ),
                'productsMenu' => esc_html__( 'Меню товаров' , 'fourtact' )
            )
        );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'fourtact_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'fourtact_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fourtact_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fourtact_content_width', 640 );
}
add_action( 'after_setup_theme', 'fourtact_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Enqueue scripts and styles.
 */
function fourtact_scripts() {
	wp_enqueue_style( 'fourtact-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( '4tacts-bundle', get_template_directory_uri() . '/assets/css/app.bundle.min.css' );
	wp_style_add_data( 'fourtact-style', 'rtl', 'replace' );

	wp_enqueue_script( 'fourtact-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'uikit', '//cdn.jsdelivr.net/npm/uikit@3.6.15/dist/js/uikit.min.js', array(), 3.6, true );
    wp_enqueue_script( 'uikit', '//cdn.jsdelivr.net/npm/uikit@3.6.15/dist/js/uikit-icons.min.js', array(), 3.6, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fourtact_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/*
=================================================================================
-------------- Логотип в админбаре (Custom adminbar logo) -----------------------
=================================================================================
*/

function fourtact_custom_logo() {
    echo '
	<style type="text/css">
	#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
	display:inline-block;
	background-image: url(' . get_bloginfo('stylesheet_directory') . '/assets/img/icons/logo.svg) !important;
	background-position: 0 0;
	width:20px !important;
	height: 20px !important;
	color:rgba(0, 0, 0, 0);
	-webkit-background-size: contain;
	background-size: contain;
	background-repeat: no-repeat;
    background-position: center;
	}
	#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
	background-position: center;
	}
	</style>
';
}
add_action('wp_before_admin_bar_render', 'fourtact_custom_logo');

function remove_footer_admin () {
    echo '<p>Тема ';
    echo wp_get_theme();
    echo ' разработана <a href="https://iceslam.ru" target="_blank">IceSlam</a> в компании <a href="https://alianscompany.ru" target="_blank">Альянс+</a>. Работает на WordPress</p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/*
=================================================================================
--------------------- Форматирование вывода аннотации ---------------------------
-------------------------- Formatting the excerpt -------------------------------
=================================================================================
*/

add_filter('excerpt_more', function($more) {
    return '...';
});

/*
=================================================================================
------------------ Изменение логотипа при входе в админку -----------------------
--------------------------- Admin login page logo -------------------------------
=================================================================================
*/

function my_login_logo(){
    echo '
   <style type="text/css">
        #login h1 a { background: url('. get_template_directory_uri().'/assets/img/icons/logo.svg) no-repeat 0 0 !important; -webkit-background-size: contain !important;background-size: contain !important;height: 128px;width: auto;background-position: center !important; }
    </style>';
}
add_action('login_head', 'my_login_logo');


/*
=================================================================================
------------------ Удаление разделов из меню админки ----------------------------
-------------------- Removing links from admin menu -----------------------------
=================================================================================
*/

add_action('admin_menu', 'remove_admin_menu');
function remove_admin_menu() {
//    remove_menu_page('edit.php');
//    remove_menu_page('tools.php');
//    remove_menu_page('edit-comments.php');
//   remove_menu_page('themes.php');
//    remove_menu_page('plugins.php');
//    remove_menu_page('users.php');
//    remove_menu_page( 'options-general.php');
//    remove_menu_page( 'duplicator' );
//    remove_menu_page( 'wc-admin' );
//    remove_menu_page( 'edit.php?post_type=acf-field-group' );
}

/*
=================================================================================
----------------------- Удаление Frontend-админбара -----------------------------
----------------------- Removing Frontend-adminbar ------------------------------
=================================================================================
*/

//add_filter('show_admin_bar', '__return_false');
