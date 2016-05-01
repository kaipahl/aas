<?php if (is_single()) { ?>
	
	<ul class="pager reset--list clearfix">
		<li class="pager-item prev">
			<?php previous_post_link('%link','Ältere Texte') ?>
		</li>

		<li class="pager-item next">
			<?php next_post_link('%link','Neuere Texte') ?>
		</li>
	</ul><!-- /.pager -->

<?php } else { ?>
	
	<ul class="pager reset--list clearfix">
		<li class="pager-item prev">
			<?php next_posts_link('Ältere Texte') ?>
		</li>

		<li class="pager-item next">
			<?php previous_posts_link('Neuere Texte') ?>
		</li>
	</ul><!-- /.pager -->

<?php } ?>
