<?php $timeline = $content_block['timeline']; ?>
<?php if (!empty($timeline)): ?>
<section id="cd-timeline" class="cd-container">
	<?php foreach($timeline as $time): ?>
		<div class="cd-timeline-block wow fadeIn">
			<div class="cd-timeline-img cd-picture flex-center">
				<i class="fa fa-clock-o fa-2x" aria-hidden="true"></i>
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content wow fadeIn">
				<h2><?= $time['title']; ?></h2>
				<p><?= $time['content']; ?></p>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->
	<?php endforeach; ?>
</section> <!-- cd-timeline -->
<?php endif; ?>