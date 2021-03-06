<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Field\Complex_Field;

add_action('carbon_register_fields', 'carbon_page_builder_fields_setup');
function carbon_page_builder_fields_setup() {

    Container::make( 'post_meta', 'Page Builder' )//PAGE BUILDER FIELDS
        ->show_on_post_type('page')
        ->add_fields( array(
        Field::make( 'complex', 'crb_layouts' )
            ->set_layout('tabbed-vertical')
            ->setup_labels(array(
                'plural_name' => 'Sections',
                'singular_name' => 'Section',
            ))
            ->add_fields( 'dynamic_section', array(
                Field::make("separator", "section_settings"),
                Field::make('checkbox', 'full_width_section')->set_width(20),
                Field::make('checkbox', 'content_contained')->set_width(20),
                Field::make('checkbox', 'vertical_align')->set_width(20),
                Field::make('checkbox', 'mobile_center_text')->set_width(20),
                Field::make('checkbox', 'mobile_reverse_columns')->set_width(20),
                Field::make('text', 'section_class')->set_width(50),
                Field::make('image', 'section_background_image')->set_value_type( 'url' )->set_width(50),
                Field::make("separator", "section_heading_seperator"),
                Field::make('text', 'section_heading'),
                Field::make("select", "section_heading_tag", "Heading Tag")
                ->set_width(50)
                ->add_options(array(
                    'h1' => 'h1',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                    'p' =>  'p',
                )),
                Field::make("select", "content_align", "Heading Alignment")
                ->set_width(50)
                ->add_options(array(
                    'text-left' => 'Left',
                    'text-center' => 'Center',
                    'text-right' => 'Right',
                )),
                Field::make("separator", 'columns_seperator',"Columns"),
                Field::make( 'complex', 'columns' )
                 ->set_layout('tabbed-vertical')
                 ->set_max(6)
                 ->setup_labels( array(
                    'plural_name' => 'Columns',
                    'singular_name' => 'Column'
                 ))   
                ->add_fields( 'Column', array(
                    Field::make('text', 'column_class'),
                    Field::make('checkbox', 'column_class_override')->set_option_value('yes'),
                    Field::make( 'complex', 'column_content' )
                     ->setup_labels( array(
                        'plural_name' => 'Content',
                        'singular_name' => 'Content'
                     ))
                     ->add_fields( 'Content Block', array(
                        Field::make("select", "content_type")
                            ->add_options(array(
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'heading' => 'Heading',
                                'image' => 'Image',
                                'button' => 'Button',
                                'space' => 'Space',
                                'accordion' => 'Accordion',
                                'form' => 'Gravity Form',
                                'map' => 'Google Map',
                                'query' => 'Post Query',
                                'timeline' => 'Timeline'
                            )),
                        Field::make( 'rich_text', 'content_text' )
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'text', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make( 'image', 'content_image' )->set_value_type( 'url' )
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'image', 
                                    'compare' => '=', 
                                ),
                            )),
                          Field::make( 'select', 'content_image_size', "Image Size" )
                           ->add_options(array(
                                'thumnnail' => 'Thumbnail',
                                'medium' => 'Medium',
                                'large' => 'Large',
                                'full' => 'Full'
                            ))
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'image', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make("gravity_form", "crb_gravity_form", "Select a Form")
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'form', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make("checkbox", "crb_gravity_form_title", "Title")->set_width(50)
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'form', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make("checkbox", "crb_gravity_form_description", "Description")->set_width(50)
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'form', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make('map', 'crb_company_location', 'Location')
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'map', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make('select', 'content_button_color',"Button Color")
                            ->add_options(array(
                                'custom' => 'Custom',
                            ))
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'button', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make("color", "content_button_background", "Button Background Color")
                         ->set_conditional_logic(array(
                                array(
                                    'field' => 'content_type',
                                    'value' => 'button', 
                                    'compare' => '=', 
                                ),
                                'relation' => 'AND',
                                 array(
                                    'field' => 'content_button_color',
                                    'value' => 'custom', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make('text', 'content_button_text',"Button Text")
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'button', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make('text', 'content_button_link',"Button Link")
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'button', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make('select', 'content_button_size',"Button Size")
                            ->add_options(array(
                                'btn-sm' => 'Small',
                                'btn-md' => 'Medium',
                                'btn-lg' => 'Large',
                            ))
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'button', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make('text', 'content_space')
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'space', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make('textarea', 'content_textarea_text', "Textarea Content")
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'textarea', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make('select', 'content_heading_tag', "Heading Tag")
                            ->add_options(array(
                                'h1' => 'h1',
                                'h2' => 'h2',
                                'h3' => 'h3',
                                'h4' => 'h4',
                                'h5' => 'h5',
                                'h6' => 'h6',
                                'p' =>  'p',
                                'span' => 'span',
                                'div' => 'div'
                            ))
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'heading', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make('text', 'content_heading_text', "Heading Text")
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'heading', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make('relationship', 'crb_relationship')
                        ->set_post_type('post')
                        ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'query', 
                                    'compare' => '=', 
                                ),
                            )),
                        Field::make( 'complex', 'timeline' )
                            ->setup_labels( array(
                                'plural_name' => 'Timeline',
                                'singular_name' => 'Event'
                            ))
                            ->add_fields(array(
                                Field::make('text', 'title'),
                                Field::make('rich_text', 'content'),
                            )) 
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'timeline', 
                                    'compare' => '=', 
                                ),
                            )),
                         Field::make( 'complex', 'accordion' )
                            ->setup_labels( array(
                                'plural_name' => 'Accorions',
                                'singular_name' => 'Accorion'
                            ))
                            ->add_fields(array(
                                Field::make('text', 'title'),
                                Field::make('textarea', 'content'),
                            )) 
                            ->set_conditional_logic(array(
                                'relation' => 'OR',
                                 array(
                                    'field' => 'content_type',
                                    'value' => 'accordion', 
                                    'compare' => '=', 
                                ),
                            )),
                    ))//Content Block Complex--End  
                ))//Column Complex--End
            )),//Dynamic Section Complex--End
    ));//Page Builder Fields Array--End
    Container::make('theme_options', 'CF Page Builder')//Map Settings
        ->add_fields( array(
            Field::make('checkbox', 'enable_output_from_plugin'),
            Field::make('checkbox', 'add_plugin_default_css'),
            Field::make('checkbox', 'add_bootstrap_cdn'),
            Field::make('checkbox', 'add_google_maps_api_key'),
            Field::make('text', 'gmap_api_key', 'Maps Api Key'),
            Field::make('image', 'gmap_custom_marker', 'Maps Custom Marker')->set_value_type( 'url' ),
        ));

}//Fields Function--End