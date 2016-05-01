<?php get_header(); ?>

<body class="page-page">

	<div class="wrapper">

		<a href="#main-content" class="show-screenreader">Zum Inhalt springen</a>
		
		<?php get_sidebar(); ?>

		<div class="col-content" role="main"> 

			<?php if (have_posts()) : ?>

				<div class="pager">&nbsp;</div>

				<div class="col-wrapper"> 

					<a name="main-content" class="show-screenreader"></a>

					<?php while (have_posts()) : the_post(); ?>
			
						<article class="posting">
						
							<header class="posting-head">
								<div class="meta clearfix">
									<span class="date"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_time("j.n.Y, G:i") ?></a> <a href="#comments" title="Zu den Kommentaren"><?php comments_number('kein Kommentar', '1 Kommentar', '% Kommentare'); ?></a> <?php edit_post_link('Edit'); ?></span><span class="category"><?php the_category(' '); ?></span>
								</div>
								<h1 class="post-title"><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h1>
							</header><!-- /.posting-head -->
					
							<div class="posting-content">
								<?php the_content(); ?>
							</div>
						
						</article><!-- .posting -->
			
					<?php endwhile; ?>

				</div><!-- /.col-wrapper -->
			
			<?php else : ?>

				<div class="col-wrapper"> 
					<h2 class="center">Not Found</h2>
					<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
					<?php include (TEMPLATEPATH . "/searchform.php"); ?>
				</div><!-- /.col-wrapper -->

			<?php endif; ?><!-- / if have_posts() -->
						
		</div><!-- /.col-content -->
	
	</div><!-- .wrapper -->

	<?php get_footer(); ?>
	
</body>
</html>