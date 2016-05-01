<?php get_header(); ?>

<body id="single">
	<div id="page">

		<div id="container">
		<!-- #bbmark =========== Content =========== -->
			<div id="content">

				<?php if (have_posts()) : ?>
		
				
				<!-- #bbmark ...... START Pager ...... -->
				<?php include(TEMPLATEPATH . '/navigator.php'); ?>
		
		
				<?php while (have_posts()) : the_post(); ?>
		
				<!-- #bbmark ........... START Posting ........... -->	
					<div class="posting">
					
					<!-- bbmark ...... START Headline ...... -->
						<div class="posting-head">
							<div class="meta clearfix">
								<span class="date"><a href="<?php echo the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_time("j.n.Y, G:i") ?></a> <a href="<?php comments_link(); ?>" title="Zu den Kommentaren"><?php comments_number('kein Kommentar', '1 Kommentar', '% Kommentare'); ?></a> <?php edit_post_link('Edit'); ?></span><span class="category"><?php the_category(' '); ?></span>
							</div>
							<h2><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>
						</div> <!-- .headline -->
				
						<!-- bbmark ...... START Post ...... -->
						<div class="posting-content">
							<?php the_content(); ?>
						</div>
					
						<!--
							<?php trackback_rdf(); ?>
						-->
					</div><!-- .posting -->
					
					
					
					
					<!-- bbmark ...... START Posting-Footer ...... -->
					<ul class="posting-footer clearfix">
						<li class="legende">Tags:</li>
						<?php the_tags('<li class="tags">', '</li><li class="tags">', '</li>') ?>
					</ul>
					
					
					<?php comments_template(); // Get wp-comments.php template ?>
		
				<?php endwhile; ?>
		
					
				<!-- #bbmark ...... START Pager ...... -->
				<?php include(TEMPLATEPATH . '/pager.php'); ?>
				
		
			<?php else : ?>

				<h2 class="center">Nichts gefunden</h2>
				<p class="center"><?php _e("Sorry, aber hier ist ein Fehler aufgetreten"); ?></p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>

			<?php endif; ?>
	
			<!-- ........... ENDE Eintrag ........... -->	
		</div>
		<!-- ====== ENDE Contentspalte ====== -->
	
	
		<!-- #bbmark =========== START Spalte =========== -->
		<?php get_sidebar(); ?>	
			<!-- div id="side1" style="margin: 0 10px 0 10px; font-family: Arial; font-size: 12px">
				<p>Seitenleiste aus Performancegründen während des Spiels ausgeschaltet</p>
			</div -->
	
		
		<!-- #bbmark =========== START Spalte =========== -->
		<?php // get_sidebar('right'); ?>
			

			
		<br clear="all" />

		</div> <!-- #containter -->
	</div> <!-- #page -->	

	<?php get_footer(); ?>
	
</body>
</html>