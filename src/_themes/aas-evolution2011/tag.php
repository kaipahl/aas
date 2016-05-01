<?php
/**
 * Template Name: Tag Archive
 * @package WordPress
 * @subpackage dogfood_2006-1024
 */
?>

<?php get_header(); ?>

<body id="archive">
	<div id="page">
	
		<div id="container">
		
			<!-- #bbmark =========== Content =========== -->
			<div id="content">
	
				<!-- #bbmark ...... START Pager ...... -->
				<?php include(TEMPLATEPATH . '/navigator.php'); ?>
				
	
				<?php while (have_posts()) : the_post(); ?>
			
				<!-- #bbmark ........... START Posting ........... -->	
				<div class="posting">
					<!-- bbmark ...... START Headline ...... -->
					<div class="posting-head">
						<div class="meta clearfix">
							<span class="date"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_time("j.n.Y, G:i") ?></a> <?php comments_popup_link('kein Kommentar', '1 Kommentar', '% Kommentare'); ?> <?php edit_post_link('Edit'); ?></span><span class="category"><?php the_category(' '); ?></span>
						</div>
						<h2><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>
					</div>
					
					<div class="posting-content">	
						<?php the_excerpt(); ?>
						<div class="more"><a href="<?php echo get_permalink() ?>" title="Zum Eintrag '<?php the_title(); ?>'">Weiterlesen ...</a></div>
					</div>
				
				</div> <!-- .posting -->
				<?php endwhile; ?>
				<!-- ...... ENDE Postings ...... -->
				
				
				<!-- #bbmark ...... START Pager ...... -->
				<?php include(TEMPLATEPATH . '/pager.php'); ?>
				
			
			</div> <!-- #content -->
			
			<!-- ====== ENDE Contentspalte ====== -->
	
			<!-- #bbmark =========== START Spalte =========== -->
			<?php get_sidebar(); ?>
				
				
			<!-- #bbmark =========== START Spalte =========== -->
			<?php // get_sidebar('right'); ?>
		
		
			<br clear="all" />
		</div> <!-- #container -->
	</div> <!-- #page -->

	<?php get_footer(); ?>
	
</body>
</html>