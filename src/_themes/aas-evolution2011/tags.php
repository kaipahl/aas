<?php
/*
Template Name: Tag Archive
*/
?>

<?php get_header(); ?>

<body id="single">
	<div id="page">
		
		<div id="container">
		<!-- #bbmark =========== Content =========== -->
			<div id="content">
				<div class="pager">&nbsp;</div>
				<!-- #bbmark ........... START Posting ........... -->	
				<div class="posting">	
					
					<!-- bbmark ...... START Headline ...... -->
					<div class="posting-head">
						<h2><a href="<?php echo get_permalink() ?>">Tag Cloud</a></h2>
					</div> <!-- .headline -->
					<!-- bbmark ...... START Post ...... -->
					<div class="posting-content">
						<p>Dies ist eine sogenannte "<em>Tag-Cloud</em>". Seit 2005 wird jeder Blogeintrag hier auf <em>allesaussersport</em> mit <strong>Stichwörtern</strong> versehen, den sogenannten "<em>Tags</em>" (engl.: "Markierung"). </p>
						<p>Auf dieser Seite sehen sie eine alphabetisch angeordnete Liste aller verwendeten Tags. Die Farbe und Schriftgröße deutet an, wie häufig das Tag verwendet wurde. Wie man am großen und dunklen "<em>Fußball</em>" sieht, gehört es zu den häufiger benützten Tags auf <em>allesaussersport</em>.</p>
						<p>Jeder Tag ist verlinkt und springt nach Klick auf einer Seite mit einer Liste aller Einträge zum Tag (pro Seite: zehn Stück, plus Vor- &amp; Zurückblättern).</p>
					</div>
					<div class="posting-content" id="tag-list">
						<?php wp_tag_cloud('smallest=9&largest=48&unit=px&number=0'); ?>
					
				</div><!-- .posting -->
			</div>
		</div>
	<!-- ====== ENDE Contentspalte ====== -->

	<!-- #bbmark =========== START Spalte =========== -->
	<?php get_sidebar(); ?>
			

	<!-- #bbmark =========== START Spalte=========== -->
	<?php get_sidebar('right'); ?>
			
	<br clear="all" />
	</div> <!-- #containter -->
</div> <!-- #page -->

	<?php get_footer(); ?>
	
</body>
</html>