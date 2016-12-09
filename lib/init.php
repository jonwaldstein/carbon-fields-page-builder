<?php


// confirn Carbon Fields is installed
add_action('carbon_register_fields', 'crb_register_custom_fields');
function crb_register_custom_fields() {
    include_once(dirname(__FILE__) . '/cf_fields.php');
}

add_action( 'admin_init', 'cf_page_builder_plugin' );
function cf_page_builder_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) && !is_plugin_active( 'carbon-fields/carbon-fields-plugin.php' )) {
        add_action( 'admin_notices', 'cf_page_builder_notice' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}


// add error messages
function cf_page_builder_notice(){
    ?><div class="error"><p>Sorry, but Carbon Fields Page Builder requires the Carbon Fields plugin to be installed and active.</p></div><?php
}