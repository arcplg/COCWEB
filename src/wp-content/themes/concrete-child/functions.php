<?php
if ( !defined( 'ABSPATH' ) ) exit;

define ('URL_IMAGE', get_stylesheet_directory_uri().'/assets/images');

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
    	wp_enqueue_script( 'particles_js', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/js/particles.min.js','','',true );
    	wp_enqueue_script( 'main_js', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/js/main.js','','',true );        
        wp_enqueue_style( 'main_css',  get_stylesheet_directory_uri()  . '/assets/css/main.css', array()) ;        
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 40 );

require_once get_stylesheet_directory().'/inc/cs-funcs.php';
