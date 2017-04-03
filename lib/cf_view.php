<?php
function carbon_print_layout($layout) {//view fields
	$section_full_width_section = $layout['full_width_section'] ? 'container-fluid' : 'container';
	$section_content_contained = $layout['content_contained'] ? 'content-contained' : null;
	$section_mobile_center_text = $layout['mobile_center_text'] ? 'mobile-center-text' : null;
	$section_class = $layout['section_class'] ? $layout['section_class'] : null;

	$row_vertical_align = $layout['vertical_align'] ? 'flex-vertical-align' : null;
	$row_mobile_reverse_columns = $layout['mobile_reverse_columns'] ? 'mobile-reverse-columns' : null;

	$content_align = $layout['content_align'] ? $layout['content_align'] : null;
	?>
	<?php if ( $layout['_type'] === '_dynamic_section' ): ?>
		<div class="section <?= sprintf('%s %s %s %s',$section_full_width_section,$section_content_contained,$section_mobile_center_text,$section_class); ?> " style="<?=cfpb_bg_image($layout['section_background_image'])?>">
				<?php if ( $layout['section_heading'] ): ?>
					<div class="row row-heading">
						<div class="col-sm-12 <?= sprintf('%s',$content_align); ?>">
							<?= sprintf('<%s>%s</%s>',
								!empty($layout['section_heading_tag']) ? $layout['section_heading_tag'] : null,
								!empty($layout['section_heading']) ? $layout['section_heading'] : null,
								!empty($layout['section_heading_tag']) ? $layout['section_heading_tag'] : null
							)?>
						</div>
					</div>
				<?php endif; ?>
			<div class="row flexible-content <?= sprintf('%s %s',$row_vertical_align,$row_mobile_reverse_columns); ?>">
				<?php $columns = $layout['columns']; ?>
				<?php if (!empty($columns)): ?>
					<?php foreach($columns as $column ): ?>
						<?php $max_columns = count($columns);
							if($max_columns === 5) {
								$col_number = 15;
							} else {
								$col_number = (12/$max_columns);
							}
							$column_five_columns = $max_columns === 5 ? 'col-sm-2 ' : null;
							$column_col_number_field = $col_number ? 'col-sm-'.$col_number : null;
							$column_class_override = array_key_exists('column_class_override', $column) ? $column['column_class_override'] : null;
							$column_col_number = $column_class_override != 'yes' ? $column_col_number_field : null;
							$column_col_class = $column['column_class'] ? $column['column_class'] : null;
							?>
						<div class="<?= sprintf('%s %s %s',$column_five_columns,$column_col_number,$column_col_class); ?>">
							<?php $content = $column['column_content']; ?>
							<?php if (!empty($content)): ?>
								<?php foreach($content as $content_block ): ?>
									<?php if ($content_block['content_type'] === 'text'): ?>
										<?= cfbp_carbon_parse_shortcodes($content_block['content_text']); ?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'textarea'): ?>
										<?= sprintf('<p>%s</p>',
										!empty($content_block['content_textarea_text']) ? $content_block['content_textarea_text'] : null
										);?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'heading'): ?>
										<?= sprintf('<%s class="%s %s">%s</%s>',
										!empty($content_block['content_heading_tag']) ? $content_block['content_heading_tag'] : null,
										!empty($content_block['content_heading_color']) ? $content_block['content_heading_color'] : null,
										!empty($content_block['content_heading_font']) ? $content_block['content_heading_font'] : null,
										!empty($content_block['content_heading_text']) ? $content_block['content_heading_text'] : null,
										!empty($content_block['content_heading_tag']) ? $content_block['content_heading_tag'] : null
										);?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'image'): ?>
										<?php $content_image_size = $content_block['content_image_size'] ? $content_block['content_image_size'] : 'full'; ?>
										<?= wp_get_attachment_image( $content_block['content_image'], $content_image_size, "", array( "class" => "img-responsive" ) ); ?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'button'): ?>
									<?= sprintf('<a class="btn %s %s" href="%s" style="%s">%s</a>',
										!empty($content_block['content_button_size']) ? $content_block['content_button_size'] : 'btn-lg',
										!empty($content_block['content_button_color']) ? $content_block['content_button_color'] : 'btn-black',
										!empty($content_block['content_button_link']) ? $content_block['content_button_link'] : null,
										!empty($content_block['crb_btn_background']) ? 'background-clor:'.$content_block['crb_btn_background'].';' : null,
										!empty($content_block['content_button_text']) ? $content_block['content_button_text'] : 'button'
									);?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'accordion'): ?>
										<?php include('partials/accordion.php'); ?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'form'): ?>
										<?php $id = $content_block['crb_gravity_form']; echo do_shortcode('[gravityform title="'.cfpb_gform_options($content_block['crb_gravity_form_title']).'" description="'.cfpb_gform_options($content_block['crb_gravity_form_description']).'" id='.$id.']');?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'map'): ?>
										<?php include('partials/map.php'); ?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'query'): ?>
										<?php include('partials/post_query.php'); ?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'timeline'): ?>
										<?php include('partials/timeline.php'); ?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'space'): ?>
										<div style="height:<?= $content_block['content_space'] ? $content_block['content_space'] : null; ?>"></div>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
<?php
}