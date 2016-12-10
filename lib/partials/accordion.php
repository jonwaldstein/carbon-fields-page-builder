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
					        <?= $accordion['title']; ?>	<span class="alignright"><span class="plus"><i class="fa fa-plus"></i></span><span class="minus"><i class="fa fa-minus"></i></span></span>			        
				      	</h4>
				    </div>
			    </a>
			    <div id="collapse-<?= $accordion_id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						<?= $accordion['content']; ?>		        
					</div>
			    </div>
			</div><!--panel-->
		<?php endforeach; ?>
	</div><!--panel-group-->
<?php endif; ?>