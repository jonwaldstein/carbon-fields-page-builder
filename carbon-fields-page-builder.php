<?php
namespace Zgm\PageBuilder;
/*
 * Plugin Name: 			Carbon Fields Page Builder
 * Plugin URI: 				https://bitbucket.org/Jpwaldstein/carbon-fields-page-builder
 * Description: 			A Page Builder add-on for Carbon Fields
 * Version: 				0.0.1
 * Author: 					Jon Waldstein
 * Author URI: 				http://www.jonwaldsteinweb.com
 * Bitbucket Plugin URI:	https://Jpwaldstein@bitbucketorg/Jpwaldstein/carbon-fields-page-builder.git
 */

define('CF_PAGE_BUILDER_PATH', plugin_dir_path(__FILE__));
define('CF_PAGE_BUILDER_FOLDER', __FILE__);

$cf_page_builder_includes = array(
  'lib/init.php',				// Initialize
  'lib/setup.php',			// Some Settings
  'lib/cf_fields.php',			// Carbon Fields
  'lib/cf_functions.php',		// Carbon Fields Functions
  'lib/cf_view.php',			// View Function
  //'lib/cf_fallback.php',		// Fallback functions
);

foreach($cf_page_builder_includes as $file){
  require_once $file;
}
unset($file, $filepath);