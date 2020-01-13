<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Removes the parent themes stylesheet and scripts from inc/enqueue.php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

function theme_enqueue_styles() {
	// Get the theme data
	$the_theme = wp_get_theme();
  wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
  wp_enqueue_script( 'jquery');
  wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Enqueue js plugins
function counter_on_scroll() {
	wp_enqueue_script('counter-on-scroll-script', get_stylesheet_directory_uri() . '/js/counter-on-scroll.js', array( 'jquery' ), true);
}
add_action( 'wp_enqueue_scripts', 'counter_on_scroll' );

// function fullpagejs_scripts() {
//     wp_enqueue_script('fullpage-js', get_stylesheet_directory_uri() . '/js/fullpage.min.js', array('jquery'), true);
//     wp_enqueue_script('fullpage-initialize', get_stylesheet_directory_uri() . '/js/fullpage.initialize.js', array('jquery', 'fullpage-js'), true);
// }
// add_action('wp_enqueue_scripts', 'fullpagejs_scripts');

// Enqueue Google Fonts
function add_google_fonts() {
	wp_enqueue_style( 'add_google_fonts', 'https://fonts.googleapis.com/css?family=Ubuntu+Condensed|Ubuntu:300,400,500,700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

// Text Domain for theme
function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// Add Categories for Pages
function add_categories_to_pages() {
		register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );

// Register Menus
function secondary_menu() {
  register_nav_menu('secondary_menu', __( 'Secondary Menu' ) );
}
add_action( 'init', 'secondary_menu' );

// Tweak GF Contact Form confirmation display
// function contact_show_confirmation_and_form( $form ) {
//   $shortcode = '[gravityform id="' . $form['id'] . '" title="false" description="false"]';
//
//   if ( array_key_exists( 'confirmations' , $form ) ) {
//     foreach ( $form[ 'confirmations' ] as $key => $confirmation ) {
//       $form[ 'confirmations' ][ $key ][ 'message' ] = $shortcode . '<div class="confirmation-message">' . $form['confirmations'][ $key ]['message'] . '</div>';
//     }
//   }
//
//   if ( array_key_exists( 'confirmation' , $form ) ) {
//     $form[ 'confirmation' ][ 'message' ] = $shortcode . '<div class="confirmation-message">' . $form['confirmations'][ $key ]['message'] . '</div>';
//   }
//
//   return $form;
// }
// add_filter( 'gform_pre_submission_filter_2' , "contact_show_confirmation_and_form" , 10 , 1 );
