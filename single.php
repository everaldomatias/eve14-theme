<?php
/**
 * The Template for displaying all single posts.
 *
 * @package eve14-theme
 * @since eve14-theme 1.0
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
            
<?php 
if ( in_category('graffiti') || in_category('atelie') || in_category('trabalhos') ) { ?>

<div class="list_carousel">

    <ul id="foo2">

        <?php
    $args = array(
            'post_type' => 'attachment',
            'numberposts' => -1,
            'post_status' => null,
            'post_parent' => $post->ID );
      
        $anexos = get_posts ( $args );

        if ( $anexos ) {
            foreach ( $anexos as $anexo ) { ?>

            <?php 
				$attachment_id = $anexo->ID;
				$image_attributes = wp_get_attachment_image_src( $attachment_id, 'galeria' );
				$attachment_page = get_attachment_link( $attachment_id ); 
				$description = $anexo->post_content;
				?>
        <li>
		<?php
        if ($description):
        echo '<div id="desc-slide">' . $description . '</div>';
		endif;
		?>
		<img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" alt="<?php echo apply_filters('the_title', $anexo->post_title); ?>">
        </li>
        <?php } } ?>
    </ul>
    <div class="clearfix"></div>
    <a class="prev" id="prev2" href="#"><span>ante</span></a>
    <a class="next" id="next2" href="#"><span>segui</span></a>
</div>
<div class="content-single">
<div class="title-single">
	<h2><?php the_title(); ?></h2>
</div><!-- .title-single -->


	<?php the_content(); ?>
</div><!-- .content-single -->

<?php } else { ?>
            
            <?php
			?>

				<?php eve14_theme_content_nav( 'nav-above' ); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php eve14_theme_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>
            
<?php } ?>
<?php endwhile; // end of the loop. ?>
			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_footer(); ?>