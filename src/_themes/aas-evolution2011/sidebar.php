<?php
/**
 * @package WordPress
 * @subpackage dogfood_2006-1024
 */
?>
	<div id="side1">
		<ul>
			<li id="logo">
				<a href="/" title="Homepage"><img src="/_img/sidebar-logo-aas2010-240.png" alt="Logo" width="240" height="240" /></a>
			</li>
			<li id="elsewhere">
				<a href="/fulltext" title="Alternative Homepage">Homepage 2</a> | <a href="https://twitter.com/#!/aasport" title="News via Twitter-Account von allesaussersport">@aasport</a> | <a href="https://www.facebook.com/pages/allesaussersport/182601149731" title="Facebook-Account">Facebook</a> | <a href="https://plus.google.com/b/108439196600039005324/" title="Google Plus-Account">Google+</a>
			</li>
			
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			
			
		
			<!-- #bbmark ........... START Kommentare ........... -->
			<li class="box box-comments">
				<h2>Letzte Kommentare</h2>
				<ul>
					<?php dog_comments2b(); ?>
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
		<h2>Feeds</h2>
		<ul>
			<li>Full-Text-Feeds im <a href="/feed/" title="Full-Text-Feed" rel="alternate">RSS2.0-</a>, <a href="/feed/rdf/" title="Full-Text-Feed" rel="alternate">RDF-</a> und <a href="/feed/atom/" title="Full-Text-Feed" rel="alternate">Atom-Format</a></li>
			<li>Gekürzter Feed im <a href="/feed/rss/" title="Gekürzter Feed" rel="alternate">RSS0.92-Format</a></li>
			<li>Kommentare als <a href="/comments/feed/" title="Full-Text-Feed der Kommentare" rel="alternate">RSS2.0-Feed</a></li>
		</ul>
	</li>

			<?php endif; ?>
		</ul>
	</div> <!-- ENDE #side1 -->	

