<?php
// AJAX загрузка постов
function load_posts () {
  $args = unserialize( stripslashes( $_POST['query'] ) );
  $args['paged'] = $_POST['page'] + 1; // следующая страница

  query_posts( $args );
  if ( have_posts() ) {
    while ( have_posts() ) { the_post();
      get_template_part( '/template-parts/content', 'load');
    }
    die();
  }
}
add_action('wp_ajax_loadmore', 'load_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_posts');