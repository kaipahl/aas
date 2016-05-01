<?php
/**
 * The Template used to display all single posts
 *
 * @package WordPress
 * @subpackage dogfood2010
 * @since 3.0.0
 */
?>

<?php get_header(); ?>

<div id="page">

	<?php get_template_part( 'page', 'header' ); ?>
	
	<div id="content-wrapper" class="clearfix">
		
		<div id="content">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<section>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<h2>
						<?php
							printf( __( '<a href="%1$s" rel="bookmark"><span class="entry-date">%3$s, %2$s</span></a>', 'twentyten' ),
								get_permalink(),
								esc_attr( get_the_time() ),
								get_the_date()
							);
						?>
						</h2>
					</section>

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->


					<div class="entry-utility">
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
					
				</div><!-- #post-<?php the_ID(); ?> -->


				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>
		</div> <!-- /#content -->
		
		<?php get_sidebar(); ?>
		
	</div> <!-- /#content-wrapper -->
	
</div> <!-- /#page -->
	
<?php get_footer(); ?>
