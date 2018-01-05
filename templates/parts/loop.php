<?php
do_action( 'e14_loop_before' );

while ( have_posts() ) : the_post();

	get_template_part( 'templates/parts/content', get_post_type() );

endwhile;

do_action( 'e14_loop_after' );