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
                Field::make("separator", "section_heading"),
                Field::make('text', 'section_heading'),
                Field::make("select", "heading_tag", "Heading Tag")
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
                    'left' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right',
                )),
                Field::make("separator", "Columns"),
                Field::make( 'complex', 'columns' )
                 ->set_layout('tabbed-vertical')
                 ->set_max(6)
                 ->setup_labels( array(
                    'plural_name' => 'Columns',
                    'singular_name' => 'Column'
                 ))   
                ->add_fields( 'Column', array(
                    Field::make('text', 'column_class'),
                    Field::make( 'complex', 'column_content' )
                     ->setup_labels( array(
                        'plural_name' => 'Content',
                        'singular_name' => 'Content'
                     ))
                     ->add_fields( 'Content Block', array(
                        Field::make("select", "content_type")
                         ->add_options(array(
                            'text' => 'Text',
                            'image' => 'Image',
                            'accordion' => 'Accordion',
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
                    ))  
                ))
            )),
    )); 
}