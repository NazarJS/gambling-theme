<?php

function true_breadcrumbs(){

  global $post;
  $html = '';
  $breadcrumbs_setup = get_field('breadcrumbs_setup', 'options');
  $main = !empty($breadcrumbs_setup['main_breadcrumb']) ? $breadcrumbs_setup['main_breadcrumb'] : 'Home';
  $page_404 = !empty($breadcrumbs_setup['404_error']) ? $breadcrumbs_setup['404_error'] : 'Page Not Found';
  $author_text = !empty($breadcrumbs_setup['posts_from_author']) ? $breadcrumbs_setup['posts_from_author'] : 'Posts from';
  $breadcrumb_title = get_field('breadcrumb_title', $post->ID);

  if( !is_front_page() ) { // не главная

    echo get_template_part('ld+json/Breadcrumbs');

    $html = '<header class="breadcrumb">
             <div class="container">
             <nav>
              <ul>';

    $html .= '<li><a href="'. site_url() . '">'. $main .'</a></li>';


    if( is_single() ){ // записи

      $post_categories = get_the_category();

      // цепочка рубрик поста, по иерархии
      if( ! empty( $post_categories[0]->cat_ID ) ) {
        $cat = get_category_parents( $post_categories[0]->cat_ID, true, '*' ) ;
        $cat_array = explode('*', $cat);
        foreach ($cat_array as $link) {
          if(!empty($link)) {
            $html .= '<li>'. $link . '</li>';
          }
        }
      }

      $title = !empty($breadcrumb_title) ? $breadcrumb_title : get_the_title();

      $html .= '<li>' . $title . '</li>';

    } elseif ( is_page() ){ // страницы

      if ( $post->post_parent ) {

        $parent_id  = $post->post_parent; // присвоим в переменную
        $breadcrumbs = array();

        while ( $parent_id ) {
          $page = get_post( $parent_id );
          $titleParent = !empty(get_field('breadcrumb_title', $page->ID)) ? get_field('breadcrumb_title', $page->ID) : get_the_title( $page->ID );
          $breadcrumbs[] = '<li><a href="' . get_permalink( $page->ID ) . '">' . $titleParent . '</a></li>';
          $parent_id = $page->post_parent;
        }

        $html .= join( '', array_reverse( $breadcrumbs ) );

      }

      $title = !empty($breadcrumb_title) ? $breadcrumb_title : get_the_title();

      $html .= '<li>' . $title . '</li>';

    } elseif ( is_category() ) { //рубрика

      $html .= '<li>' . single_cat_title('', 0) . '</li>';

    } elseif( is_tag() ) { //тег

      $html .= '<li>' . single_tag_title('', 0) . '</li>';

    } elseif ( is_day() ) { // архивы (по дням)

      $html .= '<li><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
      $html .= '<li><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a></li>';
      $html .= '<li>' . get_the_time('d') . '</li>';

    } elseif ( is_month() ) { // архивы (по месяцам)

      $html .= '<li><a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
      $html .= '<li>' . get_the_time('F') . '</li>';

    } elseif ( is_year() ) { // архивы (по годам)

      $html .= '<li>' . get_the_time( 'Y' ) . '</li>';

    } elseif ( is_author() ) { // архивы по авторам

      global $author;
      $userdata = get_userdata( $author );
      $html .= '<li>' . $author_text . ' ' . $userdata->display_name . '</li>';

    } elseif ( is_404() ) { // если страницы не существует

      $html .= '<li>'. $page_404 .'</li>';

    }

    $html .= '</ul>
              </nav>
              </div>
              </header>';

  }

  echo $html;

}