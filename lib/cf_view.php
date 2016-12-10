<?php
function carbon_print_layout($layout) {//view fields
	?>
	<div class="section <?= $layout['full_width_section'] ? 'container-fluid' : 'container'; ?> <?= $layout['content_contained'] ? 'content-contained' : null; ?>  <?= $layout['mobile_center_text'] ? 'mobile-center-text' : null; ?> <?= $layout['mobile_reverse_columns'] ? 'mobile-reverse-columns' : null; ?> <?= $layout['section_class']; ?>" style="<?=bg_image($layout['section_background_image'])?>">
		<?php if ( $layout['_type'] === '_dynamic_section' ): ?>
				<?php if ( $layout['section_heading'] ): ?>
					<div class="row row-heading">
						<div class="col-sm-12 <?=heading_alignment($layout['content_align']);?>">
							<?='<'.$layout['heading_tag'].'>';?><?= $layout['section_heading']; ?><?='</'.$layout['heading_tag'].'>';?>
						</div>
					</div>
				<?php endif; ?>
			<div class="row flexible-content">
				<?php $columns = $layout['columns']; ?>
				<?php if (!empty($columns)): ?>
					<?php foreach($columns as $column ): ?>
						<?php $max_columns = count($columns);
							if($max_columns === 5) {
								$col_class = 15;
							} else {
								$col_class = (12/$max_columns);
							}
							?>
						<div class="<?= $max_columns === 5 ? 'col-sm-2 ' : ''; ?> col-sm-<?=$col_class;?> <?= $column['column_class']; ?>">
							<?php $content = $column['column_content']; ?>
							<?php if (!empty($content)): ?>
								<?php foreach($content as $content_block ): ?>
									<?php if ($content_block['content_type'] === 'text'): ?>
										<?= carbon_parse_shortcodes($content_block['content_text']); ?>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'image'): ?>
										<img src="<?= $content_block['content_image']; ?>" alt=""/>
									<?php endif; ?>
									<?php if ($content_block['content_type'] === 'accordion'): ?>
										<?php include('partials/accordion.php'); ?>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
<?php
}