<?php
$crb_relationship = $content_block['crb_relationship'];
 if(!empty($crb_relationship)):
	$args = array(
			'post__in' => $crb_relationship,
	); 
	$cf_query = new WP_Query( $args );

	while ( $cf_query->have_posts() ) : $cf_query->the_post(); ?>
		<article <?php post_class(); ?>>
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<p><?php the_excerpt(); ?></p>
		</article>
	<?php endwhile;
endif; ?>