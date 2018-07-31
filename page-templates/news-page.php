<?php
/**
 * Template Name: News Page
 * 
 * @package HWCOE_UFL
 *
 */
get_header(); ?>
<?php 
	if ( has_post_thumbnail() ):
		$custom_meta = get_post_meta( get_the_ID() );
		$custom_meta_image_height = ( isset( $custom_meta['custom_meta_image_height']) )? $custom_meta['custom_meta_image_height'][0] : '';
		$shortcode = sprintf( '[ufl-landing-page-hero headline="%s" image="%d" image_height="%s"]%s[/ufl-landing-page-hero]', 
			get_the_title(),
			get_post_thumbnail_id(),
            $custom_meta_image_height,
			''
		);
		echo do_shortcode( $shortcode );
	endif;
?>
<div id="main" class="container main-content">
<div class="row">
  <div class="col-sm-12">
    <?php hwcoe_ufl_breadcrumbs(); ?>
  </div>
</div>
<div class="row">
  <?php get_sidebar('page_sidebar'); ?>  

  <div class="<?php echo hwcoe_ufl_page_column_class(); ?>">
	<?php 
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'landing' );
		endwhile; // End of the loop. 
	?>
  </div>

   <?php get_sidebar('page_right'); ?> 

</div><!-- .row -->
</div><!-- #main -->

<?php get_footer(); ?>
