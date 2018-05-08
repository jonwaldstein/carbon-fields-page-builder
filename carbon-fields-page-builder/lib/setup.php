<?php
function crb_get_gmaps_api_key( $current_key ) {
	if ( function_exists( 'carbon_get_theme_option' ) ) {
		if (carbon_get_theme_option('add_google_maps_api_key') == 'yes'){
    		return carbon_get_theme_option('gmap_api_key');
    	}
	}
}
add_action( 'carbon_map_api_key', 'crb_get_gmaps_api_key' );

function carbon_resources() {
	if (carbon_get_theme_option('add_plugin_default_css') == 'yes'){
		wp_enqueue_style('cf-page-builder-css', plugins_url('/assets/styles/main.css', CF_PAGE_BUILDER_FOLDER), array());
	}
	if (carbon_get_theme_option('add_bootstrap_cdn') == 'yes'){
    	wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.4', true );
	}
	if (carbon_get_theme_option('add_fontawesome_cdn') == 'yes'){
		wp_enqueue_style('fontawesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	}
	if (carbon_get_theme_option('add_google_maps_api_key') == 'yes'){
   		wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key='.crb_get_gmaps_api_key( $current_key ).'&callback=initMap',array(),'1.0',true);
   	}
}
add_action('wp_enqueue_scripts', 'carbon_resources');
