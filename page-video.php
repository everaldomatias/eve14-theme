<?php
/** Template Name: Video */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
            
            <?php while ( have_posts() ) : the_post(); ?>

					<div id="video"><?php the_content(); ?></div>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>