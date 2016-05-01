<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 *
 * @package aas-evolution2013
 * @since aas-evolution2013 1.0
 */
?>

<?php get_header(); ?>

<body class="page-home">

	<div class="wrapper">

		<a href="#main-content" class="show-screenreader">Zum Inhalt springen</a>

		<?php get_sidebar(); ?>

		<div class="col-content" role="main"> 

			<?php if (have_posts()) : ?>

				<?php get_template_part('pager'); ?>

				<div class="col-wrapper"> 

					<a name="main-content" class="show-screenreader"></a>
					
					<!-- START Loop -->	
					<?php while (have_posts()) : the_post(); ?> 
			
						<article class="posting">
				
							<header class="posting-head">
								<div class="meta clearfix">
									<span class="date"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_time("j.n.Y, G:i") ?></a> <a href="<?php comments_link(); ?>" title="Zu den Kommentaren"><?php comments_number('kein Kommentar', '1 Kommentar', '% Kommentare'); ?></a> <?php edit_post_link('Edit'); ?></span><span class="category"><?php the_category(' '); ?></span>
								</div>
								<h1 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
							</header><!-- /.positing-head -->
				
							<div class="posting-content">
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink() ?>" class="btn-more">Weiterlesen</a>
							</div><!-- /.posting-content -->
				
				
							<ul class="posting-meta-items reset--list clearfix">
								<li class="posting-meta-item posting-meta-label first">Autor</li>
								<li class="posting-meta-item posting-meta-author">
									<a href="/about-allesaussersport" title="Über <?php the_author() ?>"><?php the_author() ?></a>
								</li>
								<?php if (get_the_tags()) { ?>
									<li class="posting-meta-item posting-meta-label">Tags</li>
									<?php the_tags('<li class="posting-meta-item posting-meta-tag">', '</li><li class="posting-meta-item posting-meta-tag">', '</li>') ?>
								<?php } ?>
							</ul><!-- /.posting-meta-items -->

				
							<!-- <?php trackback_rdf(); ?> -->
					
					
						</article><!-- /.posting -->
			
					<?php endwhile; ?> <!-- /Loop -->

				</div><!-- /.col-wrapper -->

				<?php get_template_part('pager'); ?>

			<?php else : ?><!-- ...... kein posts vorhanden ...... -->

				<div class="col-wrapper"> 
					<h2 class="center">Not Found</h2>
					<p class="center"><?php _e("Sorry, aber hier ist ein Fehler aufgetreten"); ?></p>
					<?php include (TEMPLATEPATH . "/searchform.php"); ?>
				</div><!-- /.col-wrapper -->

			<?php endif; ?>
			<!-- ........... ENDE Eintrag ........... -->
						
		</div><!-- /.col-content -->
	
	</div><!-- /.wrapper -->

	<?php get_footer(); ?>

</body>
</html>