<?php
$accordions = $content_block['accordion'];
if (!empty($accordions )): ?>
	<?php $accordion_id = uniqid() ?>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?php foreach($accordions as $accordion): ?>
		<?php $accordion_id++ ?>
			<div class="panel carbon-panel">
				<a class="text-decoration-none text-decoration-none-hover" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?= $accordion_id; ?>" aria-expanded="false" aria-controls="collapseOne">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">				        
					        <?= $accordion['title']; ?>				        
				      	</h4>
				      	<span class="alignright">
				      		<i class="fa fa-plus plus"></i><i class="fa fa-minus minus"></i>
				      	</span>
				    </div>
			    </a>
			    <div id="collapse-<?= $accordion_id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						<?= !empty(($accordion['content'])) ? wpautop( do_shortcode( $accordion['content'] ) ) : null ?>
					</div>
			    </div>
			</div><!--panel-->
		<?php endforeach; ?>
	</div><!--panel-group-->
<?php endif; ?>