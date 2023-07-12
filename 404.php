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

                            <div class="error_number">
                                404
                            </div>

                            <div class="error_txt">Sorry we couldn't find that page</div>

                            <a href="" class="ui-btn__register ui-btn">
                             Back to Main Page
                            </a>
                  
                    </div>

                </div>


            </div>

        </section><!-- .error-404 -->


    </main><!-- #main -->

<?php
get_footer();
