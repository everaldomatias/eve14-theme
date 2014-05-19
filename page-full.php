<?php
/** Template Name: Full */

get_header('full'); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

    <ul id="cbp-bislideshow" class="cbp-bislideshow">
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
<div id="cbp-bicontrols" class="cbp-bicontrols">
					<span class="cbp-biprev"></span>
					<span class="cbp-bipause"></span>
					<span class="cbp-binext"></span>
				</div>


			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<!-- imagesLoaded jQuery plugin by @desandro : https://github.com/desandro/imagesloaded -->
		<script src="<?php url_tema('js/jquery.imagesloaded.min.js')?>"></script>
		<script src="<?php url_tema('js/cbpBGSlideshow.min.js')?>"></script>
		<script>
			$(function() {
				cbpBGSlideshow.init();
			});
		</script>

<?php get_footer(); ?>