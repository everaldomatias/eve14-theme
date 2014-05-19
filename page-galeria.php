<?php

/** Template Name: Galeria */

get_header( 'galeria' ); ?>

</div><!-- main -->

		<div id="primary" class="content-area">

			<div id="content" class="site-content" role="main">
                
                <?php
                    $atual = $post->post_name;
                    $id_cat = get_category_by_slug( $atual ); 
                    $id_cat = $id_cat->term_id;
                ?>

				<?php
                $query = new WP_Query('cat='.$id_cat.'');
                while ($query->have_posts()) : $query->the_post(); ?>
                
                <div class="cada-post">
             
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'grid' ); ?></a>
                    
                </div><!-- .cada-post -->
        
                <?php endwhile; ?>
                
                <?php 
				if ( is_page('trabalhos') ) { ?>
                <div class="cada-post">
	                <a class="a-cada-post" href="<?php echo home_url('contato'); ?>">Entre em contato e solicite or&ccedil;amento para o seu trabalho.</a>
                </div>
				<?php } else { ?>
				<?php
				}
				?>

			</div><!-- #content .site-content -->

		</div><!-- #primary .content-area -->

<div id="main">


<?php get_footer(); ?>