<?php
/**
 * The template used to display all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
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

			<?php the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>				

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

				
		</div> <!-- /#content -->
		
		<?php get_sidebar(); ?>
		
	</div> <!-- /#content-wrapper -->

	
	
</div> <!-- /#page -->

<?php get_footer(); ?>
