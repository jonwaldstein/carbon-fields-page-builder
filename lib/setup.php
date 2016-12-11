<?php
add_action( 'carbon_map_api_key', 'crb_get_gmaps_api_key' );
function crb_get_gmaps_api_key( $current_key ) {
    return carbon_get_theme_option('gmap_api_key');
}
function carbon_resources() {
	wp_enqueue_style('cf-page-builder-accordion', plugins_url('/assets/styles/accordion.css', CF_PAGE_BUILDER_FOLDER), array());
	wp_enqueue_style('cf-page-builder-utility', plugins_url('/assets/styles/utility.css', CF_PAGE_BUILDER_FOLDER), array());
	wp_enqueue_style('cf-page-builder-map', plugins_url('/assets/styles/map.css', CF_PAGE_BUILDER_FOLDER), array());
	wp_enqueue_style('fontawesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.4', true );
   	wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key='.crb_get_gmaps_api_key( $current_key ).'&callback=initMap',array(),'1.0',true);
}
add_action('wp_enqueue_scripts', 'carbon_resources');
