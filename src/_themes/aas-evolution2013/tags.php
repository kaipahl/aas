<?php
/*
Template Name: Tag Archive
*/
?>

<?php get_header(); ?>

<body class="page-single">

	<div class="wrapper">

		<a href="#main-content" class="show-screenreader">Zum Inhalt springen</a>

		<?php get_sidebar(); ?>

		<div class="col-content" role="main"> 

			<div class="col-wrapper"> 

				<div class="pager">&nbsp;</div>

				<a name="main-content" class="show-screenreader"></a>

				<div class="posting">	
					
					<header class="posting-head">
						<h1 class="post-title"><a href="<?php echo get_permalink() ?>">Tag Cloud</a></h1>
					</header><!-- .headline -->

					<div class="posting-content">
						<p>Dies ist eine sogenannte "<em>Tag-Cloud</em>". Seit 2005 wird jeder Blogeintrag hier auf <em>allesaussersport</em> mit <strong>Stichwörtern</strong> versehen, den sogenannten "<em>Tags</em>" (engl.: "Markierung"). </p>
						<p>Auf dieser Seite sehen sie eine alphabetisch angeordnete Liste aller verwendeten Tags. Die Farbe und Schriftgröße deutet an, wie häufig das Tag verwendet wurde. Wie man am großen und dunklen "<em>Fußball</em>" sieht, gehört es zu den häufiger benützten Tags auf <em>allesaussersport</em>.</p>
						<p>Jeder Tag ist verlinkt und springt nach Klick auf einer Seite mit einer Liste aller Einträge zum Tag (pro Seite: zehn Stück, plus Vor- &amp; Zurückblättern).</p>
					</div><!-- /.posting-content -->

					<div class="posting-content" id="tag-list">
						<?php wp_tag_cloud('smallest=9&largest=48&unit=px&number=0'); ?>
					</div><!-- /.posting-content -->
					
				</div><!-- .posting -->

			</div><!-- /.col-wrapper -->
						
		</div><!-- /.col-content -->
	
	</div><!-- .wrapper -->

	<?php get_footer(); ?>
	
</body>
</html>