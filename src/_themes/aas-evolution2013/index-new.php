<?php
/*
Template Name: Index-New
*/
?>

<?php get_header(); ?>

<body class="page-index-new">

	<div class="wrapper">
		
		<?php get_sidebar(); ?>

		<div class="col-content" role="main"> 

			<div class="col-wrapper"> 
		
				<?php if (have_posts()) : ?>
				
					<!-- #bbmark ...... START Pager ...... -->
					<?php include(TEMPLATEPATH . '/navigator.php'); ?>
					
					<!-- #bbmark ........... START Loop ........... -->	
					<?php while (have_posts()) : the_post(); ?> 
			
						<div class="posting">
				
							<div class="posting-head"> <!-- bbmark ...... START Headline ...... -->
								<div class="meta clearfix">
									<span class="date"><a href="<?php echo the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_time("j.n.Y, G:i") ?></a> <a href="<?php comments_link(); ?>" title="Zu den Kommentaren"><?php comments_number('kein Kommentar', '1 Kommentar', '% Kommentare'); ?></a> <?php edit_post_link('Edit'); ?></span><span class="category"><?php the_category(' '); ?></span>
								</div>
								<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							</div>
				
							<div class="posting-content"> <!-- bbmark ...... START Post ...... -->
								<?php the_content(); ?>
							</div>
				
				
							<!-- bbmark ...... START Posting-Footer ...... -->
							<ul class="posting-footer clearfix">
								<li class="posting-meta">
									<a href="/about-allesaussersport" title="&Uuml;ber <?php the_author() ?>">Autor: <?php the_author() ?></a>
								</li>
								<li class="posting-meta">
									<a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">Permalink</a>
								</li>
								<li class="posting-meta">
									<a href="<?php comments_link(); ?>" title="Zu den Kommentaren"><?php comments_number('kein Kommentar', '1 Kommentar', '% Kommentare'); ?></a>
								</li>
							</ul>
							<ul class="posting-footer clearfix">
								<li class="legende">Tags:</li>
								<?php the_tags('<li class="tags">', '</li><li class="tags">', '</li>') ?>
							</ul>
				
							<!-- <?php trackback_rdf(); ?> -->
					
					
					
						</div> <!-- ...... ENDE .posting ...... -->
			
					<?php endwhile; ?> <!-- ...... ENDE Loop ...... -->
			
					
					<!-- #bbmark ...... START Pager ...... -->
					<?php include(TEMPLATEPATH . '/pager.php'); ?>

					
			
				<?php else : ?> <!-- ...... kein posts vorhanden ...... -->
					<h2 class="center">Not Found</h2>
					<p class="center"><?php _e("Sorry, aber hier ist ein Fehler aufgetreten"); ?></p>
					<?php include (TEMPLATEPATH . "/searchform.php"); ?>
				<?php endif; ?>
				<!-- ........... ENDE Eintrag ........... -->

			</div><!-- /.col-wrapper -->
						
		</div> <!-- /.col-content -->
	
	</div> <!-- .wrapper -->

	<?php get_footer(); ?>

</body>
</html>