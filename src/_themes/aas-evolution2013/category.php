<?php get_header(); ?>

<body class="page-categories">

	<div class="wrapper">

		<a href="#main-content" class="show-screenreader">Zum Inhalt springen</a>

		<?php get_sidebar(); ?>

		<div class="col-content" role="main"> 

			<?php get_template_part('pager'); ?>

			<div class="col-wrapper"> 


				<a name="main-content" class="show-screenreader"></a>

				<?php while (have_posts()) : the_post(); ?>
			
					<article class="posting">
						
						<header class="posting-head">
							<div class="meta clearfix">
								<span class="date"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_time("j.n.Y, G:i") ?></a> <?php comments_popup_link('kein Kommentar', '1 Kommentar', '% Kommentare'); ?> <?php edit_post_link('Edit'); ?></span><span class="category"><?php the_category(' '); ?></span>
							</div>
							<h1 class="post-title"><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h1>
						</header><!-- /.posting-head -->
						
						<div class="posting-content">	
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink() ?>" class="btn-more">Weiterlesen</a>
						</div><!-- /.posting-content -->
						
					</article><!-- /.posting -->
				
				<?php endwhile; ?>

			</div><!-- /.col-wrapper -->

			<?php get_template_part('pager'); ?>
						
		</div><!-- /.col-content -->
	
	</div><!-- .wrapper -->

	<?php get_footer(); ?>
	
</body>
</html>