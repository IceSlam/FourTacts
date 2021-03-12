<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package 4_Такта
 */

get_header( 'compact' );
?>

	<main id="primary" class="site-main">

    <section id="err404">
      <div class="error-box">
        <h2 class="number-error">Ошибка 404</h2>
        <i class="far fa-frown fa-3x"></i>
        <p class="text">Кажется что-то пошло не так. Страница, котороую вы запрашиваете, не существует.<br>Возможно она устарела или был введен неверный адрес.</p>
        <a href="" onclick="history.back();return false;">Вернуться назад</a>
      </div>
    </section>

	</main><!-- #main -->

<?php
get_footer();
