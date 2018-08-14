<?php
/**
 * Template Name: Newsletter Single Page
 * Template Post Type: post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HWCOE_UFL
 */
get_header(); ?>

<div id="main" class="container main-content">
<div class="row">
  <div class="col-sm-12">
	<header class="entry-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php 
			if(get_field('nl_pg_issue')){ //if the field is not empty
				echo '<h3>Issue: ' . get_field('nl_pg_issue') . '</h3>'; //display it
			} 
		?>
	</header>
	<!-- .entry-header --> 
  </div>
</div>
<div class="row">
	<div class="col-sm-9 newsletter_details">
	  <div class="row">
		<div class="col-md-12">
			<?php 
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile; // End of the loop.
			?>
		</div>
	  </div>
	  <div class="row">
		<div class="col-md-12">
			<!--Featured Stories-->
			<?php if( have_rows( 'nl_featured_stories' ) ): ?>
				<h2>Featured Stories</h2>
				<?php while( have_rows( 'nl_featured_stories' ) ): the_row(); ?>
					<?php
						$image    = get_sub_field( 'nl_pg_image' );
						$alt      = $image['alt'];
//						$img_src  = $image['sizes']['large'];
					?>
					<div class="nl-featured-story">
						<img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" class="nl-featured-st-img">
						<?php if ( get_sub_field( 'nl_pg_title') ): ?>
							<h3><a href="<?php esc_url( the_sub_field( 'nl_pg_title_url' ) ); ?>"><?php esc_attr( the_sub_field( 'nl_pg_title' ) ); ?></a></h3>
						<?php endif ?>
					</div>
				<?php endwhile // the_row ?>
			<?php endif // have_rows ?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-12">
			<!--Faculty Stories-->
			<?php if( have_rows( 'nl_pg_faculty' ) ): ?>
				<h2>Faculty</h2>
				<?php while( have_rows( 'nl_pg_faculty' ) ): the_row(); ?>
					<?php
						$image    = get_sub_field( 'nl_pg_fac_image' );
						$alt      = $image['alt'];
//						$img_src  = $image['sizes']['large'];
					?>
					<div class="nl-faculty-story">
						<img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
						<h3><?php esc_attr( the_sub_field( 'nl_pg_fac_title' ) ); ?></h3>
						<p><?php esc_attr( the_sub_field( 'nl_pg_fac_excerpt' ) ); ?>
						<a href="<?php esc_url( the_sub_field( 'nl_pg_fac_story_link' ) ); ?>">... Read more >></a></p>
					</div>
				<?php endwhile // the_row ?>
			<?php endif // have_rows ?>
			 
			<!--Event Stories-->
			<?php if( have_rows( 'nl_pg_events' ) ): ?>
				<h2>Events</h2>
				<?php while( have_rows( 'nl_pg_events' ) ): the_row(); ?>
					<?php
						$image    = get_sub_field( 'nl_pg_events_image' );
						$alt      = $image['alt'];
//						$img_src  = $image['sizes']['large'];
					?>
					<div class="nl-events-story">
						<img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
						<h3><?php esc_attr( the_sub_field( 'nl_pg_events_title' ) ); ?></h3>
						<p><?php esc_attr( the_sub_field( 'nl_pg_events_excerpt' ) ); ?>
						<a href="<?php esc_url( the_sub_field( 'nl_pg_events_story_link' ) ); ?>">... Read more >></a></p>
					</div>
				<?php endwhile // the_row ?>
			<?php endif // have_rows ?>

			<!--Student Stories-->
			<?php if( have_rows( 'nl_pg_students' ) ): ?>
				<h2>Students</h2>
				<?php while( have_rows( 'nl_pg_students' ) ): the_row(); ?>
					<?php
						$image    = get_sub_field( 'nl_pg_stud_image' );
						$alt      = $image['alt'];
//						$img_src  = $image['sizes']['large'];
					?>
					<div class="nl-students-story">
						<img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>">
						<h3><?php esc_attr( the_sub_field( 'nl_pg_stud_title' ) ); ?></h3>
						<p><?php esc_attr( the_sub_field( 'nl_pg_stud_excerpt' ) ); ?>
						<a href="<?php esc_url( the_sub_field( 'nl_pg_stud_story_link' ) ); ?>">... Read more >></a></p>
					</div>
				<?php endwhile // the_row ?>
			<?php endif // have_rows ?>
		 </div>
	  </div>
  </div>
  <div class="col-md-3">
	<?php get_sidebar('post_sidebar'); ?>
  </div>
</div>
</div>

<?php get_footer(); ?>
