<?php
/**
 * Sidebar template file.
 *
 * Sidebar with Logo, Comments, Archive, Search, Tag Cloud
 *
 * @package aas-evolution2013
 * @since aas-evolution2013 1.0
 */
?>

<div class="col-sidebar sidebar-left" role="banner">

	<section class="box box-logo first">
		<a href="/" title="Homepage des Sportblogs allesaussersport" class="logo-link"><img src="/_img/logo-aas2013.png" alt="Logo" class="logo-image" /></a>
	</section>

	<nav class="nav-elsewhere">
		<h3 class="box-title js-accordeon-title show-for-small">Navigation</h3>
		<ul class="nav-items reset--list">
			<li class="nav-item"><a href="/fulltext" title="Alternative Homepage">Homepage Fulltext</a></li><li class="nav-item"><a href="/impressum/" title="Impressum">Impressum</a></li>
			<li class="nav-item"><a href="/about-allesaussersport" title="Über die Website">Über <em>aas</em></a></li>
			<li class="nav-item"><a href="https://twitter.com/aasport" title="News via Twitter-Account von allesaussersport">Twitter @aasport</a></li>
			<li class="nav-item"><a href="https://alpha.app.net/aasport" title="News via App.net-Account von allesaussersport">App.net @aasport</a></li>
			<li class="nav-item"><a href="https://www.facebook.com/pages/allesaussersport/182601149731" title="Facebook-Account">Facebook</a></li>
			<li class="nav-item"><a href="https://plus.google.com/b/108439196600039005324/" title="Google Plus-Account" rel="publisher">Google+</a></li>
		</ul>
	</nav>
			
	
<!-- 
	<section class="box box-comments">
		<h3 class="box-title">Letzte Kommentare</h3>
		<ul class="comments-list box-content reset~~list">
			<?php // dog_comments2013(); ?>
		</ul>
	</section>
 -->


	<!-- ... Suche ........... -->
	<section class="box box-archives box-search" id="box-search" role="search">
		<h3 class="box-title">Suche im Archiv</h3>
		<ul class="box-content reset--list">
			<li>
				<!-- Google CSE Search Box Begins  -->
				<form action="http://www.allesaussersport.de/suchergebnisse/" id="searchbox_007334066523813962139:i09xlzgtdiw">
					<input type="hidden" name="cx" value="007334066523813962139:i09xlzgtdiw" />
					<input type="hidden" name="cof" value="FORID:11" />
					<input type="hidden" name="filter" value="0" />
					<input type="hidden" name="safe" value="off" />
					<div class="form-line">
						<input type="text" name="q" id="q" class="form-text" />
						<input type="submit" name="sa" id="sa" value="Suchen" class="form-btn btn btn-small" />
					</div>
				</form>
				<script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=searchbox_007334066523813962139%3Ai09xlzgtdiw"></script>
				<!-- Google CSE Search Box Ends -->
			</li>
		</ul>
	</section>


	<!-- ... Tags ........... -->
	<section class="box box-archives hide-for-small">
		<h3 class="box-title">Tag-Cloud</h3>
		<ul class="box-content reset--list">
			<li><a href="/tags/" title="Tag Cloud von allesaussersport">Liste aller verwendeten Tags</a></li>
		</ul>
	</section>

			
			
	<!-- ... Kategorien ........... -->
	<?php if (is_page() || is_category() ) { ?>	
		<section class="box box-archives hide-for-small">
			<h3 class="box-title">Archiv | Themen</h3>
			<ul class="box-content reset--list">
				<?php wp_list_cats('all=Alle&sort_column=name&list=1&optioncount=1&children=1&file=category.php'); ?>
			</ul>
		</section>
	<?php } else { ?>
		<?php
			/**
			 * @todo Archiv-Seite anfertigen
			 */
		?>
	<?php } ?>



	<?php if (is_archive() ) { ?>	
		<!-- #bbmark ........... START Kalender ........... -->
		<section class="box box-archives hide-for-small">
			<h3 class="box-title">Archiv | Kalender</h3>
			<div align="left" class="box-content calendar">
				<?php get_calendar(2); ?>
			</div>
		</section>
	<?php } ?>

	<?php if (is_page() || is_archive() ) { ?>	
		<!-- #bbmark ........... START Monat ........... -->
		<section class="box box-archives hide-for-small">
			<h3 class="box-title">Archiv | Monat</h3>
			<ul class="box-content reset--list">
				<?php wp_get_archives('type=monthly&format=html&show_post_count=true'); ?>
			</ul>
		</section>
	<?php } else { ?>
		<?php
			/**
			 * @todo Archiv-Seite anfertigen
			 */
		?>
	<?php } ?>

	<?php /* =========== Meta-Box =========== */ ?>
	<!-- #bbmark ........... START Die Site ........... -->	
	<section class="box box-archives box-feeds hide-for-small">
		<h3 class="box-title">Feeds</h3>
		<ul class="box-content feed-items">
			<li class="feed-item">Full-Text-Feeds im <a href="/feed/" title="Full-Text-Feed" rel="alternate">RSS2.0-</a>, <a href="/feed/rdf/" title="Full-Text-Feed" rel="alternate">RDF-</a> und <a href="/feed/atom/" title="Full-Text-Feed" rel="alternate">Atom-Format</a></li>
			<li class="feed-item">Gekürzter Feed im <a href="/feed/rss/" title="Gekürzter Feed" rel="alternate">RSS0.92-Format</a></li>
			<li class="feed-item">Kommentare als <a href="/comments/feed/" title="Full-Text-Feed der Kommentare" rel="alternate">RSS2.0-Feed</a></li>
		</ul>
	</section>


</div><!-- /.col-sidebar -->	

