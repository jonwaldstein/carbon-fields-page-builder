<?php
function carbon_print_layout($layout) {//view fields
	?>
	<div class="section <?= $layout['full_width_section'] ? 'container-fluid' : 'container'; ?> <?= $layout['content_contained'] ? 'content-contained' : ''; ?> <?= $layout['section_class']; ?>" style="<?=bg_image($layout['section_background_image'])?>">
		<?php if ( $layout['_type'] === '_dynamic_section' ): ?>
				<?php if ( $layout['section_heading'] ): ?>
					<div class="row row-heading">
						<div class="col-sm-12 text-center">
							<h3><?= $layout['section_heading']; ?></h3>
						</div>
					</div>
				<?php endif; ?>
			<div class="row flexible-content">
				<?php $columns = $layout['columns']; ?>
				<?php if (!empty($columns)): ?>
					<?php foreach($columns as $column ): ?>
						<?php $max_columns = count($columns);
							$col_html = ''; 
							if($max_columns === 5) {
								$col_class = 15;
							} else {
								$col_class = (12/$max_columns);
							}
							?>
						<div class="<?= $max_columns === 5 ? 'col-sm-2 ' : ''; ?> col-sm-<?=$col_class;?> <?= $column['column_class']; ?>">
							<?= carbon_parse_shortcodes($column['column_content']); ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
<?php
}