<?php
/**
 * @package WordPress
 * @subpackage dogfood_2006-1024
 */
?>
	<div id="side1">
		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			
			
					
			
		
			<!-- #bbmark ........... START Kommentare ........... -->
			<li class="box box-comments">
				<h2>Letzte Kommentare</h2>
				<ul>
					<?php dog_comments(10); ?>
				</ul>
			</li>
			
			<!-- #bbmark ........... START Suche ........... -->
			<li class="box box-archives" id="box-search">
				<h2>Archiv | Volltextsuche</h2>
				<ul>
					<li>
						<?php get_search_form(); ?>
					</li>
				</ul>
			</li>
	

			<!-- #bbmark ........... START Tags ........... -->
			<li class="box box-archives">
				<h2>Tag-Cloud</h2>
				<ul>
					<li><a href="/tags/" title="Tag Cloud von allesaussersport">Liste aller verwendeten Tags</a></li>
				</ul>
			</li>
	
					
					
	<?php if (is_home() || is_category() ) { ?>	
		<!-- #bbmark ........... START Kategorien ........... -->
		<li class="box box-archives">
			<h2>Archiv | Themen</h2>
			<ul>
				<?php wp_list_cats('all=Alle&sort_column=name&list=1&optioncount=1&children=1&file=category.php'); ?>
			</ul>
		</li>
	<?php } ?>
	
	<?php if (is_archive() ) { ?>	
		<!-- #bbmark ........... START Kalender ........... -->
		<li class="box box-archives">
			<h2>Archiv | Kalender</h2>
			<div align="left" class="calendar">
				<?php get_calendar(2); ?>
			</div>
		</li>
	<?php } ?>
	
	<?php if (is_home() || is_archive() ) { ?>	
		<!-- #bbmark ........... START Monat ........... -->
		<li class="box box-archives">
			<h2>Archiv | Monat</h2>
			<ul>
				<?php wp_get_archives('type=monthly&format=html&show_post_count=true'); ?>
			</ul>
		</li>
	<?php } ?>	

	<?php /* =========== Meta-Box =========== */ ?>
	<!-- #bbmark ........... START Die Site ........... -->	
	<li class="box box-archives">
		<h2>&nbsp;</h2>
		<ul><li><a href="http://www.technorati.com/profile/dogfood/949863/58361bd2b2045a976991eb1bb0a98801">Technorati Profile</a></li></ul>
		<ul id="badges">
			<li><a href="http://www.allesaussersport.de/index.rdf" title="RSS 1.0-Feed"><img src="/_images/_button_rss10.gif" alt="RSS 1.0 Badge" width="80" height="15" /></a><a href="http://www.allesaussersport.de/index.xml" title="RSS 2.0-Feed"><img src="/_images/_button_rss20.gif" alt="RSS 2.0 Badge" width="80" height="15" /></a><a href="http://www.wordpress.org" title="Das verwendete CMS: WordPress 2.06"><img src="/_images/_button_wp.gif" alt="Wordpress Badge" width="80" height="15" /></a><a href="http://www.barebones.com/products/bbedit/index.shtml" title="Der verwendete Editor: BBedit"><img src="/_images/_button_bbedit.gif" alt="Barebones BBEdit Badge" width="80" height="15" /></a></li>
		</ul>
	</li>

	<?php /* =========== Meta-Box =========== */ ?>
	<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
		<?php wp_list_bookmarks(); ?>

		<li class="box box-archives">
			<h2>Meta</h2>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
				<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
				<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
				<?php wp_meta(); ?>
			</ul>
		</li>
	<?php } ?>

			<?php endif; ?>
		</ul>
	</div> <!-- ENDE #side1 -->	

