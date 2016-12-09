<?php

/*
 * Plugin Name: 			Carbon Fields Page Builder
 * Plugin URI: 				https://bitbucket.org/Jpwaldstein/carbon-fields-page-builder
 * Description: 			A Page Builder add-on for Carbon Fields
 * Version: 				0.0.1
 * Author: 					Jon Waldstein
 * Author URI: 				http://www.jonwaldsteinweb.com
 * Bitbucket Plugin URI:	https://Jpwaldstein@bitbucketorg/Jpwaldstein/carbon-fields-page-builder.git
 */


define("CARBON_FIELDS_PAGE_BUILDER_URL", plugin_dir_url( __FILE__ ));

$cf_page_builder_includes = array(
  'lib/init.php',				// initialize
  'lib/cf_fields.php',			// Carbon Fields
  'lib/cf_functions.php',		// Carbon Fields Functions
  'lib/cf_view.php',			// View Function
);

foreach($cf_page_builder_includes as $file){
  require_once $file;
}
unset($file, $filepath);