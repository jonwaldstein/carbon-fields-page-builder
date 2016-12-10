<?php
function carbon_resources() {
	wp_enqueue_style('cf-page-builder', plugins_url('/assets/styles/accordion.css', CF_PAGE_BUILDER_FOLDER), array());
	wp_enqueue_style('fontawesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '3.3.4', true );
}
add_action('wp_enqueue_scripts', 'carbon_resources');