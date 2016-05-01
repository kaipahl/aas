<?php get_header(); ?>

<body id="single">
	<div id="page">
	
		<!-- #bbmark =========== Kopfzeile =========== -->
		<div id="header">
			<h1><a href="/" accesskey="1" title="allesaussersport Sportblog"><span>allesaussersport – Blog eines TV-Sportmaniacs</span></a></h1>
		</div>

		<div id="container">
		
			<!-- #bbmark =========== Content =========== -->
			<div id="content">
					
				<!-- #bbmark ...... START Pager ...... -->
				<?php include(TEMPLATEPATH . '/navigator.php'); ?>

				<?php if (have_posts()) : ?>
		
				<?php while (have_posts()) : the_post(); ?>
		
				<!-- #bbmark ........... START Posting ........... -->	
					<div class="posting">
					
					<!-- bbmark ...... START Headline ...... -->
						<div class="posting-head">
							<div class="meta clearfix">
								<span class="date"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_time("j.n.Y, G:i") ?></a> <a href="#comments" title="Zu den Kommentaren"><?php comments_number('kein Kommentar', '1 Kommentar', '% Kommentare'); ?></a> <?php edit_post_link('Edit'); ?></span><span class="category"><?php the_category(' '); ?></span>
							</div>
							<h2><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>
						</div> <!-- .headline -->
				
						<!-- bbmark ...... START Post ...... -->
						<div class="posting-content">
							<?php the_content(); ?>
						</div>
					
					</div><!-- .posting -->
		
				<?php endwhile; ?>
		
				<!-- bbmark ...... START Pager ...... -->
				<div class="pager">
					<div class="prev"><?php posts_nav_link('','','&laquo; &Auml;ltere Eintr&auml;ge') ?></div>
					<div class="succ"><?php posts_nav_link('','Neuere Eintr&auml;ge &raquo;','') ?></div>
				</div>
		
			<?php else : ?>

			<h2 class="center">Not Found</h2>
			<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>

			<?php endif; ?>
	
		<!-- ........... ENDE Eintrag ........... -->	
	</div>
	<!-- ====== ENDE Contentspalte ====== -->

	<!-- #bbmark =========== START Spalte =========== -->
	<?php get_sidebar(); ?>
			
			
	<!-- #bbmark =========== START Spalte =========== -->
	<?php get_sidebar('right'); ?>
			
			
	<br clear="all" />
	</div> <!-- #containter -->
</div> <!-- #page -->

	<?php get_footer(); ?>
	
</body>
</html>