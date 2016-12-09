<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Field\Complex_Field;
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
            Field::make('text', 'section_class')->set_width(30),
            Field::make('image', 'section_background_image')->set_value_type( 'url' )->set_width(30),
            Field::make('text', 'section_heading'),
            Field::make( 'complex', 'columns' )
             ->set_layout('tabbed-vertical')
             ->set_max(6)
             ->setup_labels( array(
                'plural_name' => 'Columns',
                'singular_name' => 'Column'
             ))   
            ->add_fields( 'Column', array(
                Field::make('text', 'column_class'),
                Field::make( 'rich_text', 'column_content' )->set_width(50)
            ))
		)),
));	