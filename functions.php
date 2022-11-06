<?php

function load_styles_and_scripts(){
	// Cargar Styles
	wp_enqueue_style(
		'main-styles',
		get_template_directory_uri().'/style.css'

		);
}
// Remove scripts from head.
// Remove scripts from head.
function move_scripts_from_head_to_footer() {
  remove_action( 'wp_head', 'wp_print_scripts' );
  remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
  remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );

  add_action( 'wp_footer', 'wp_print_scripts', 5);
  add_action( 'wp_footer', 'wp_enqueue_scripts', 5);
  add_action( 'wp_footer', 'wp_print_head_scripts', 5);
}
add_action('wp_enqueue_scripts', 'move_scripts_from_head_to_footer');



add_action('wp_enqueue_scripts','load_styles_and_scripts');

/* START MENU BLOCK */

/* START witgets */
register_sidebar(array(
	'name' => 'Instagram',
	'before_widget' => '<div class="instagram">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
	));
// Register Custom Navigation Walker


register_nav_menus( array(

    'principal' => __( 'Menu Principal', 'mytheme' ),
    'top_menu' => 'Top Menu'

) );
add_theme_support('post-thumbnails'); 
function longitud_excerpt($length) {
    return 15;
}
add_filter( 'post_thumbnail_html', 'wpdd_modify_post_thumbnail_html', 10, 5 );
function wpdd_modify_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	return str_replace( '<img', '<img loading="lazy"', $html );
}
function set_post_views() {
  if (is_single()) {
      $post_ID = get_the_ID();
      $count = get_post_meta( $post_ID, 'post_views', true );

      if ( $count == '' ) {
          delete_post_meta( $post_ID, 'post_views' );
          add_post_meta( $post_ID, 'post_views', 1 );
      } else {
          update_post_meta( $post_ID, 'post_views', ++$count );
      }
  }
}
add_action( 'wp', 'set_post_views' );

// Función para obtener el número de visualizaciones de un post
function get_post_views($post_ID){
  $count = get_post_meta($post_ID, 'post_views', true);

  if ($count == ''){
      delete_post_meta($post_ID, 'post_views');
      add_post_meta($post_ID, 'post_views', 0);
      return 0;
  }
  return $count;
}
// Añadir columna al listado de post de wp-admin
function posts_column_views($defaults){
  $defaults['post_views'] = __('Vistas', 'your_textdomain');
  return $defaults;
}
add_filter('manage_posts_columns', 'posts_column_views');

function posts_custom_column_views($column_name, $id){
  if ($column_name === 'post_views'){
      echo get_post_views(get_the_ID());
  }
}
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);


add_filter('excerpt_length', 'longitud_excerpt');
function ivw_cambiar_excerpt_more($more){
return ; }
add_filter('excerpt_more', 'ivw_cambiar_excerpt_more' );
?>
