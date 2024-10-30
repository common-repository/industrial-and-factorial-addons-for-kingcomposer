<?php

/*
Plugin Name: Industrial and Factorial Addons for KingComposer
Plugin URI: https://codenpy.com/item/industrue
Description: You can build amazing professional industrial and factorial websites with tons of powerfull addons. 33+ addons with one plugin..
Author: themebon
Author URI: https://codenpy.com
Version: 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;


if(!function_exists('is_plugin_active')){
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}


// Admin Style CSS
function industrue_admin_enqeue() {
    
    wp_enqueue_style( 'industrue_admin_css', plugins_url( '/assets/admin/admin.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'industrue_admin_enqeue' );


if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
        
/*   add_action('init', 'industrue_industrueon_init');
    function industrue_industrueon_init() {
        if( function_exists( 'kc_add_industrueon' ) ) {
            kc_add_industrueon( plugins_url( '/assets/css/industrio-industrueon/style.css', __FILE__ ) );
        }
    }*/
    
    //Loading Scripts
    function industrue_addons_styles() {
        
        // CSS
        wp_enqueue_style('industrue-industrio-industrueon', plugins_url( '/assets/css/industrio-industrueon/style.css' , __FILE__ ) );
        wp_enqueue_style('industrue-hover-min', plugins_url( '/assets/css/hover-min.css' , __FILE__ ) );
        wp_enqueue_style('industrue-touchspin', plugins_url( '/assets/css/jquery.bootstrap-touchspin.css' , __FILE__ ) );
        wp_enqueue_style('industrue-magnifindustrue-popup', plugins_url( '/assets/css/magnifindustrue-popup.css' , __FILE__ ) );
        wp_enqueue_style('industrue-owl-carousel', plugins_url( '/assets/css/owl.carousel.css' , __FILE__ ) );
        wp_enqueue_style('industrue-owl-theme', plugins_url( '/assets/css/owl.theme.default.min.css' , __FILE__ ) );
        wp_enqueue_style('industrue-style', plugins_url( '/assets/css/style.css' , __FILE__ ) );
        wp_enqueue_style('industrue-custom', plugins_url( '/assets/css/custom.css' , __FILE__ ) );
        wp_enqueue_style('industrue-responsive', plugins_url( '/assets/css/responsive.css' , __FILE__ ) );
        
        // JS
        wp_enqueue_script('industrue-jquery-appear-js', plugins_url('/assets/js/jquery.appear.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('industrue-countdown-js', plugins_url('/assets/js/jquery.countdown.min.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('industrue-counterup-js', plugins_url('/assets/js/jquery.counterup.min.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('industrue-countTo-js', plugins_url('/assets/js/jquery.countTo.js', __FILE__), array('jquery'),'', true);
        wp_enqueue_script('industrue-easing-js', plugins_url('/assets/js/jquery.easing.min.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('industrue-magnifindustrue-popup-js', plugins_url('/assets/js/jquery.magnifindustrue-popup.min.js', __FILE__), array('jquery'),'', true);
        //wp_enqueue_script('industrue-owl-carousel-js', plugins_url('/assets/js/owl.carousel.min.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('industrue-waypoints-js', plugins_url('/assets/js/waypoints.min.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('industrue-wow-js', plugins_url('/assets/js/wow.min.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('industrue-isotope-js', plugins_url('/assets/js/isotope.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('industrue-custom-js', plugins_url('/assets/js/custom.js', __FILE__), array('jquery'), false, true);
        wp_enqueue_script('industrue-active-js', plugins_url('/assets/js/active.js', __FILE__), array('jquery'), false, true);
 
 
    }
    add_action( 'wp_enqueue_scripts', 'industrue_addons_styles' );
    

    // loading Addons
    require_once ( 'addons/index.php' );
    
} 


add_action( 'admin_init', 'industrue_required_plugin' );
function industrue_required_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
        add_action( 'admin_notindustruees', 'industrue_required_plugin_notindustruee' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}

function industrue_required_plugin_notindustruee(){
    ?><div class="error"><p>Error! you need to install or activate the <a href="https://wordpress.org/plugins/kingcomposer/">King Composer</a> plugin to run this plugin.</p></div><?php
}
?>