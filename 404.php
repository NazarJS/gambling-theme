<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package latte-theme
 */

get_header();
?>

    <main id="primary" class="site-main">


        <section class="error-404 not-found">
            <div class="container">
                <div class="not-found-page">
                    <div class="not-found-page__wrap">

                    <div class="not-found-page__col">
                        <i class="denied-icon"></i>
                    </div>
                    <div class="not-found-page__col">
                        <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'latte-theme' ); ?></h1>
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'latte-theme' ); ?></p>
                    </div>
                    </div>

                </div>


            </div>

        </section><!-- .error-404 -->


    </main><!-- #main -->

<?php
get_footer();
