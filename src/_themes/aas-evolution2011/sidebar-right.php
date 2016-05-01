<section id="side2">

	<div class="section-title">Shorties</div>
	
	<?php rewind_posts(); ?>
	<?php query_posts('category_name=shortie&posts_per_page=10'); ?>
	
	<?php while (have_posts()) : the_post(); ?> 
			
			
		<article class="shortie">
			
			<div class="header">
				<h2 class="title entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			</div>

			<div class="entry-content">
				<span class="date"><?php the_time("j.n.Y, G:i") ?> |&nbsp;&nbsp;</span>
				<?php the_content(); ?>
			</div>
			
			<ul class="entry-footer">
				<li class="entry-meta">
					<a href="<?php comments_link(); ?>" title="Zu den Kommentaren"><?php comments_number('kein Kommentar', '1 Kommentar', '% Kommentare'); ?></a>
				</li>
				<?php if ( is_user_logged_in() ) : ?> 
				<li class="entry-meta">
					<?php edit_post_link('Edit'); ?>
				</li>
				<?php endif; ?>
			</ul>

	
		</article> <!-- ...... /ARTICLE ...... -->
			
	<?php endwhile; ?>

</section> <!-- ENDE #side2 -->	